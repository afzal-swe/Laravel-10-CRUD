<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = DB::table('students')->orderBy('id', 'DESC')->get(); // orderBy is serial number
        $data = DB::table('students')->join('classes', 'students.class_id', 'class')->get(); // orderBy is serial number
        return view('admin.student.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('classes')->get(); // need to classes table for class name
        return view('admin.student.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'name' => 'required',
            'roll' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $data = array(
            'class_id' => $request->class_id,
            'name' => $request->name,
            'roll' => $request->roll,
            'phone' => $request->phone,
            'email' => $request->email,
        );
        DB::table('students')->insert($data); // sql insert data
        return redirect()->back()->with('success', 'successfully inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = DB::table('students')->where('id', $id)->first();
        return view('admin.student.view', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('classes')->get();
        $students = DB::table('students')->where('id', $id)->first();
        return view('admin.student.edit', compact('data', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',
            'name' => 'required',
            'roll' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        $data = array(
            'class_id' => $request->class_id,
            'name' => $request->name,
            'roll' => $request->roll,
            'phone' => $request->phone,
            'email' => $request->email,
        );
        DB::table('students')->where('id', $id)->update($data);  // Sql data update
        return redirect()->route('students.index')->with('success', 'successfully Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('students')->where('id', $id)->delete(); // Delete Data With table
        return redirect()->back()->with('success', 'successfully Deleted!');
    }
}
