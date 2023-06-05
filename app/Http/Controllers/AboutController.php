<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all();
        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'number' => 'required',
        ]);

        $info = new About;
        $info->name = $request->name;
        $info->email = $request->email;
        $info->address = $request->address;
        $info->number = $request->number;
        $info->save(); // Model use korla amra insert bebohar korbo na

        // Model insert section //
        // About::insert([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'address' => $request->address,
        //     'number' => $request->number,
        //]);
        return redirect()->back()->with('success', 'successfully inserted!');
        // dd($info);
    }

    public function edit($id)
    {
        // $about = DB::table('abouts')->where('id', $id)->first(); // SQL use the Database
        // $about=About::where('id',$id)->first(); // Model use the Database
        $about = About::find($id); // Model use the Database
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {

        $about = About::find($id); // get the record
        $about->name = $request->name;
        $about->email = $request->email;
        $about->address = $request->address;
        $about->number = $request->number;
        $about->save();

        // Update method
        // $about->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'address' => $request->address,
        //     'number' => $request->number,
        // ]);

        return redirect()->back()->with('success', 'successfully inserted!');
    }

    public function destroy($id)
    {
        // DB::table('abouts')->where('id', $id)->delete(); // SQL 

        // $data = About::find($id); // Model
        // $data->delete();

        About::destroy($id); // Model

        return redirect()->back();
    }
}
