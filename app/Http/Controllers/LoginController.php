<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\User;
use Validator;

class LoginController extends Controller
{
    public function showForm()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return view('admin.dashboard.index');
        }
        return view('admin.login.index');
    }
    public function loginProses(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
            'level' => 'admin',
        ];
        // dd($data);
        Auth::attempt($data);

        if (Auth::check() && Auth::user()->level == 'admin') { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect('dashboard');
        } else {
            // Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect('admin');
        }
    }
    public function logoutProses()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect('/');
    }
}
