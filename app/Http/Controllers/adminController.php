<?php

namespace App\Http\Controllers;
use App\Models\giaovien;
use App\Models\hocsinhModel;
use App\Models\diemdanh;
use App\Models\BuoiHoc;
use App\Models\Enrollment;
use App\Models\lichhoc;
use App\Models\lop;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('welcome');
    }

    // Phương thức hiển thị danh sách học sinh
    public function hocsinh(Request $request)
    {
        $password = '123456';
        $hashedPassword = Hash::make($password);

        if (Hash::check($password, $hashedPassword)) {
            echo 'Password is valid!';
        } else {
            echo 'Password is invalid!';
        }
        Paginator::useBootstrap();

        // Lấy giá trị từ input tìm kiếm
        $search = $request->query('search');

        // Kiểm tra nếu có giá trị tìm kiếm, thì tìm kiếm theo tên sinh viên
        if ($search) {
            $students = hocsinhModel::where('first_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            // Nếu không có giá trị tìm kiếm, lấy tất cả sinh viên và phân trang
            $students = hocsinhModel::paginate(10);
        }

        return view('admin.hocsinh', compact('students'));
    }


    // Phương thức hiển thị form tạo mới học sinh
    public function create_hocsinh()
    {
        return view('admin.create_hocsinh');
    }

    // Phương thức lưu thông tin học sinh mới vào database
    public function store_hocsinh(Request $request)
    {
        // Validate input
        $request->validate([
            'user_id' => 'required|integer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:10',
            'education_level' => 'required|string|max:255',
            'training_type' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'img' => 'nullable|image|max:2048', // Thêm validation cho file ảnh (image)
        ]);

        $student_id = $request->input('student_id');
        $exists = hocsinhModel::where('student_id', $student_id)->exists();

        // Nếu student_id đã tồn tại, tạo student_id mới
        if ($exists) {
            $student_id = $this->generateStudentId();
        }

        // Xử lý upload file
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName(); // Lấy tên file gốc
            //$fileName = time() . '_' . $fileName;  Thêm timestamp vào tên file để tránh trùng lặp
            $file->move(public_path('assets/book'), $fileName); // Lưu file vào thư mục public/assets/book

            $data = $request->all();
            $data['student_id'] = $student_id;
            $data['img'] = $fileName; // Lưu tên file vào cơ sở dữ liệu
        } else {
            // Nếu không có file được chọn, sử dụng giá trị mặc định hoặc bỏ qua
            $data = $request->except('img');
            $data['student_id'] = $student_id;
        }

        hocsinhModel::create($data);

        return redirect('/admin/hocsinh')->with('success', 'Thêm học sinh thành công.');
    }

    public function getStudentAttendance($classId)
    {
        $class = lop::findOrFail($classId);
        $students = $class->students()->with('attendances')->get();
        return view('attendance.student-attendance-info', compact('students'));
    }
private function generateStudentId()
{
    $student_id = mt_rand(100000, 999999); // Sinh một student_id ngẫu nhiên
    // Kiểm tra xem student_id đã tồn tại chưa
    while (hocsinhModel::where('student_id', $student_id)->exists()) {
        $student_id = mt_rand(100000, 999999); // Nếu tồn tại, sinh student_id mới
    }
    return $student_id;
}

    // Phương thức hiển thị form chỉnh sửa thông tin học sinh
    public function edit_hocsinh($id)
    {
        $student = hocsinhModel::findOrFail($id);
        return view('admin.edit_hocsinh', compact('student'));
    }

    // Phương thức cập nhật thông tin học sinh trong database
    public function update_hocsinh(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|max:10',
            'education_level' => 'required|string|max:255',
            'training_type' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'img' => 'nullable|image|max:2048', // Thêm validation cho file ảnh (image)
        ]);

        $student = hocsinhModel::find($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->education_level = $request->education_level;
        $student->training_type = $request->training_type;
        $student->major = $request->major;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;

        // Xử lý upload file nếu có file mới được chọn
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Thêm timestamp vào tên file để tránh trùng lặp
            $file->move(public_path('assets/book'), $fileName); // Lưu file vào thư mục public/assets/book

            $student->img = $fileName; // Lưu tên file mới vào cơ sở dữ liệu
        }

        $student->save();

        return redirect('/admin/hocsinh')->with('success', 'Cập nhật thông tin học sinh thành công!');
    }



    // Phương thức xóa học sinh khỏi database
    public function destroy_hocsinh($id)
    {
        $student = hocsinhModel::findOrFail($id);
        $student->delete();

        return redirect('/admin/hocsinh')->with('success', 'Xóa học sinh thành công.');
    }
    // app/Http/Controllers/StudentController.php
    public function showAttendanceDetails($student_id)
{
    $student = HocsinhModel::findOrFail($student_id);
    $attendanceDetails = [];

    // Tìm tất cả các bản ghi đăng ký của học sinh
    $enrollments = Enrollment::where('student_id', $student_id)->get();

    foreach ($enrollments as $enrollment) {
        $class_id = $enrollment->class_id; // Lấy ID của lớp từ thông tin đăng ký
        $class = Lop::findOrFail($class_id); // Tìm thông tin lớp dựa trên class_id

        // Tìm thông tin buổi học của lớp này
        $sessions = BuoiHoc::where('class_id', $class_id)->get();

        // Tính toán thông tin điểm danh cho từng buổi học của lớp
        $totalSessions = $sessions->count();
        $presentCount = 0;
        foreach ($sessions as $session) {
            $attendanceRecord = Diemdanh::where('student_id', $student_id)
                                        ->where('session_id', $session->session_id)
                                        ->first();
            if ($attendanceRecord && $attendanceRecord->status === 'present') {
                $presentCount++;
            }
        }
        $absentCount = $totalSessions - $presentCount;

        // Lưu thông tin điểm danh cho lớp này
        $attendanceDetails[$class->class_name] = [
            'total' => $totalSessions,
            'present' => $presentCount,
            'absent' => $absentCount,
        ];

    }

    return view('admin.attendance', compact('student', 'attendanceDetails'));
}



// Teacher

    public function giaovien(Request $request)
     {
         Paginator::useBootstrap();
 
         // Lấy giá trị từ input tìm kiếm
         $search = $request->query('search');
 
         // Kiểm tra nếu có giá trị tìm kiếm, thì tìm kiếm theo tên giáo viên
         if ($search) {
             $teachers = giaovien::where('first_name', 'LIKE', "%{$search}%")
                 ->orWhere('last_name', 'LIKE', "%{$search}%")
                 ->paginate(10);
         } else {
             // Nếu không có giá trị tìm kiếm, lấy tất cả giáo viên và phân trang
             $teachers = giaovien::paginate(10);
         }
 
         return view('admin.giaovien', compact('teachers'));
     }
     public function create_giaovien()
        {
            return view('admin.create_giaovien');
        }
        public function edit_giaovien($id)
        {
            $teacher = giaovien::findOrFail($id);
            return view('admin.edit_giaovien', compact('teacher'));
        }
        public function destroy_giaovien($id)
        {
            $teacher = giaovien::findOrFail($id);
            $teacher->delete();
            return redirect('/admin/giaovien')->with('success', 'Xóa giáo viên thành công.');
        }
        public function update_giaovien(Request $request, $id)
        {
            // Validate input
            $request->validate([
                //'user_id' => 'required|integer',
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'date_of_birth' => 'required|date',
                'gender' => 'required|in:male,female,other',
                'education_level' => 'required|string|max:50',
                'address' => 'required|string|max:100',
                'phone_number' => 'required|string|max:15',
                'img' => 'nullable|image|max:2048',
            ]);

            $teacher = giaovien::find($id);
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->gender = $request->gender;
        $teacher->education_level = $request->education_level;
        $teacher->address = $request->address;
        $teacher->phone_number = $request->phone_number;

         // Xử lý upload file nếu có file mới được chọn
         if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Thêm timestamp vào tên file để tránh trùng lặp
            $file->move(public_path('assets/teacher_images'), $fileName); // Lưu file vào thư mục public/assets/book

            $teacher->img = $fileName; // Lưu tên file mới vào cơ sở dữ liệu

            
        }
        

        $teacher->save();
        

        return redirect('/admin/giaovien')->with('success', 'Cập nhật thông tin giáo viên thành công!');
       
          
        }
        public function store_giaovien(Request $request)
        {
            // Validate input
            $request->validate([
                'user_id' => 'required|integer',
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'date_of_birth' => 'required|date',
                'gender' => 'required|in:male,female,other',
                'education_level' => 'required|string|max:50',
                'address' => 'required|string|max:100',
                'phone_number' => 'required|string|max:15',
            
                'img' => 'nullable|image|max:2048', // Thêm validation cho file ảnh (image)
            ]);
        

            $teacher_id = $request->input('teacher_id');
                $exists = giaovien::where('teacher_id', $teacher_id)->exists();


            // Nếu student_id đã tồn tại, tạo student_id mới
            if ($exists) {
                $teacher_id = $this->generateTeacherId();
            }



            // Xử lý upload file
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $fileName = $file->getClientOriginalName(); // Lấy tên file gốc
                //$fileName = time() . '_' . $fileName;  Thêm timestamp vào tên file để tránh trùng lặp
                $file->move(public_path('assets/teacher_images'), $fileName); // Lưu file vào thư mục public/assets/book

                $data = $request->all();
                $data['teacher_id'] = $teacher_id;
                $data['img'] = $fileName; // Lưu tên file vào cơ sở dữ liệu
            } else {
                // Nếu không có file được chọn, sử dụng giá trị mặc định hoặc bỏ qua
                $data = $request->except('img');
                $data['teacher_id'] = $teacher_id;
            }

            giaovien::create($data);

            return redirect('/admin/giaovien')->with('success', 'Thêm giáo viên thành công.');

        }
    private function generateTeacherId()
    {
        $teacher_id = mt_rand(100000, 999999); // Sinh một student_id ngẫu nhiên
        // Kiểm tra xem student_id đã tồn tại chưa
        while (giaovien::where('teacher_id', $teacher_id)->exists()) {
            $teacher_id = mt_rand(100000, 999999); // Nếu tồn tại, sinh student_id mới
        }
        return $teacher_id;
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
