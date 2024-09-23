<?php

namespace App\Http\Controllers;
use App\Models\BuoiHoc;
use App\Models\DiemDanh;
use App\Models\lichhoc;
use App\Models\lop;
use App\Models\Enrollment;
use App\Models\HocSinhModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class lichhocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentDate = Carbon::today();

        // Determine the start and end dates of the current week (Monday to Sunday)
        $startOfWeek = $currentDate->startOfWeek(); // Monday of the current week
        $endOfWeek = $currentDate->endOfWeek(); // Sunday of the current week
    
        // Retrieve the schedule for the current week
        $schedule = DB::table('sessions')
                    ->whereBetween('session_date', [$startOfWeek, $endOfWeek])
                    ->get();
        
        return view("user.student.schedule", ["schedule" => $schedule]);
    }
    public function lichhoc_hocsinh()
    {
        $user_id = auth()->user()->user_id; // Lấy user_id của người dùng đã đăng nhập
        $student_id = HocsinhModel::where('user_id', $user_id)->value('student_id');
        $currentDate = Carbon::today();
    
        $sessions = BuoiHoc::whereHas('lop.enrollments', function($query) use ($student_id) {
            $query->where('student_id', $student_id);
        })->get();
    
        // Nhóm các buổi học theo ngày
        $groupedSessions = $sessions->groupBy(function ($item) {
            return Carbon::parse($item->session_date)->format('Y-m-d');
        });
        return view('user.student.schedule', compact('groupedSessions'));
    }
    

    // Phương thức hiển thị chi tiết buổi học của sinh viên
    public function showSessionDetails($session_id)
    {
        $session = BuoiHoc::with(['attendanceRecords.student'])->findOrFail($session_id);

        return view('user.student.session-details', compact('session'));
    }

    public function chitiet_lichhoc($session_id)
    {
        // Xử lý logic để hiển thị chi tiết lịch học cho học sinh
        $session = BuoiHoc::with(['lop.course', 'attendanceRecords.student'])->findOrFail($session_id);
        return view('user.student.session-details', compact('session'));
    }

    // Phương thức dành cho giáo viên
    public function lichday_giaovien()
    {
        $dates = BuoiHoc::selectRaw('DATE(session_date) as date')
                        ->groupBy('date')
                        ->orderBy('date')
                        ->get();

        return view('user.teacher.lichday', compact('dates'));
    }

    /**
     * Display the details of the teacher's schedule for a specific date.
     */
    public function chitiet_lichday($date)
    {
        $sessions = BuoiHoc::whereDate('session_date', $date)->get();
        // Lặp qua các session và kiểm tra xem session_id có tồn tại hay không
        // foreach ($sessions as $session) {
        //     $session->session_id = $session->id; // Gán session_id từ id của session
        // }
        return view('user.teacher.chitiet', compact('sessions', 'date'));
    }


    /**
     * Display the attendance of students for a specific session on a specific date.
     */
    public function diemdanhhocsinh($date, $session_id)
{
    $session = BuoiHoc::with(['lop.enrollments.student', 'attendanceRecords'])->find($session_id);
    if (!$session) {
        return redirect()->back()->with('error', 'Session not found.');
    }

    $students = $session->lop->enrollments;
    $attendanceRecords = $session->attendanceRecords;

    // Tạo một mảng kết hợp student_id với trạng thái điểm danh (nếu có)
    $attendanceStatus = $attendanceRecords->pluck('status', 'student_id');

    return view('user.teacher.diemdanh', compact('students', 'attendanceStatus', 'date', 'session_id'));
}

public function saveAttendance(Request $request, $session_id)
{
    // Lấy dữ liệu điểm danh từ request
    $attendanceData = $request->input('attendance');

    foreach ($attendanceData as $student_id => $status) {
        // Kiểm tra xem bảng điểm danh cho học sinh và buổi học đã tồn tại chưa
        $attendanceRecord = DiemDanh::where('session_id', $session_id)
                                     ->where('student_id', $student_id)
                                     ->first();

        if ($attendanceRecord) {
            // Nếu đã tồn tại, cập nhật trạng thái điểm danh
            $attendanceRecord->status = $status;
            $attendanceRecord->save();
        } else {
            // Nếu chưa tồn tại, tạo bảng điểm danh mới
            DiemDanh::create([
                'session_id' => $session_id,
                'student_id' => $student_id,
                'status' => $status
            ]);
        }
    }

    // Redirect với tham số date
    return redirect()->route('teacher.schedule.date', ['date' => $request->input('date')])
                     ->with('success', 'Điểm danh đã được lưu thành công.');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function admin()
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
