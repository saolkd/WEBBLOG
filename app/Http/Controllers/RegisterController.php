<?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;

// class RegisterController extends Controller
// {
//     public function index()
//     {
//         return view('auth.register');
//     }

//     public function registerPost(Request $request)
//     {
//         $request->validate([
//             'name' => 'required',
//             'email' => 'required',
//             'password' => 'required',
//         ]);
        
//         $user = new User();
//         $user->name = $request->name;
//         $user->email = $request->email;
//         $user->password = Hash::make($request->password);
//         $user->save();

//         return redirect('admin/login')->with(['sukses_proses' => 'Registrasi Berhasil!']);
//     }
// }
