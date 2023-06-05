<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $class = DB::table('classes')->get(); // Sql show this table data
        return view('admin.class.index', compact('class'));
    }

    public function create()
    {
        return view('admin.class.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'class_name' => 'required|unique:classes',
        ]);

        $data = array(
            'class' => $request->class,
            'class_name' => $request->class_name,
        );
        DB::table('classes')->insert($data); // sql insert data
        return redirect()->back()->with('success', 'successfully inserted!');
    }
    public function delete($id)
    {
        DB::table('classes')->where('id', $id)->delete(); // Delete Data With table
        return redirect()->back()->with('success', 'successfully Deleted!');
    }
    public function edit($id)
    {
        $data = DB::table('classes')->where('id', $id)->first();
        return view('admin.class.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class' => 'required',
            'class_name' => 'required|unique:classes',
        ]);
        $data = array(
            'class' => $request->class,
            'class_name' => $request->class_name,
        );
        DB::table('classes')->where('id', $id)->update($data);  // Sql data update
        return redirect()->back()->with('success', 'successfully Update!');
    }
}
