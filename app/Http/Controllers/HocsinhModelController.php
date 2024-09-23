<?php

namespace App\Http\Controllers;

use App\Models\giaovien;
use App\Models\hocsinhModel;
use Illuminate\Http\Request;

class HocsinhModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = auth()->user();
        // $profile = null;

        // if ($user->isAdmin()) {
        //     // Nếu là admin, có thể thực hiện một loạt các hành động khác
        // } elseif ($user->role === 'student') {
        //     $profile = hocsinhModel::where('user_id', $user->user_id)->first();
        // } elseif ($user->role === 'teacher') {
        //     $profile = giaovien::where('user_id', $user->user_id)->first();
        // }
        // return view('user.student.index', compact('profile'));
    }
    public function index_hocsinh()
    {
        // Xử lý logic để hiển thị trang chủ cho học sinh
        $user = auth()->user();
        $profile = null;
        $profile = hocsinhModel::where('user_id', $user->user_id)->first();
        if (!$profile) {
            return redirect()->back()->with('error', 'Không tìm thấy hồ sơ học sinh.');
        }
        return view('user.student.index', compact('profile'));
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
    public function show(hocsinhModel $hocsinhModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hocsinhModel $hocsinhModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hocsinhModel $hocsinhModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hocsinhModel $hocsinhModel)
    {
        //
    }
}
