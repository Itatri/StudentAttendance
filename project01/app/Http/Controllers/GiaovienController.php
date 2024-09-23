<?php

namespace App\Http\Controllers;

use App\Models\giaovien;
use Illuminate\Http\Request;

class GiaovienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //
        // Retrieve all students
        $data = giaovien::all();
        // Retrieve a specific student with ID 1
        $id = giaovien::findOrFail(1);
        // Pass both $data and $id to the view
        return view("user.teacher.index", ["data" => $data, "item" => $id]);
        
    }
    public function index_giaovien()
    {
        $user = auth()->user();
        $profile = null;
        $profile = giaovien::where('user_id', $user->user_id)->first();
        if (!$profile) {
            return redirect()->back()->with('error', 'Không tìm thấy hồ sơ giao vien.');
        }
        
        return view('user.teacher.index', compact('profile'));
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
    public function show(giaovien $giaovien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(giaovien $giaovien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, giaovien $giaovien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(giaovien $giaovien)
    {
        //
    }
}
