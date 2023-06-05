<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // Deposite money function //
    public function deposite()
    {
        return view('deposite');
    }

    public function resend()
    {
        // return view('deposite');
    }

    // Change password function // 
    public function password()
    {
        return view('password_change');
    }
    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|max:16|string|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            // $user->password = Hash::make($request->password); // Hasing password from input field
            // $user->save();

            $data = array(
                'password' => Hash::make($request->password),
            );
            DB::table('users')->where('id', Auth::id())->update($data);
            Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->back()->with('error', 'Current Password Not Matched!');
        }
    }
}
