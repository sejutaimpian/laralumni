<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidasiRequest;
use App\Models\AkunModel;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'profile' => $this->profile
        ];

        return view('home/login', $data);
    }
    public function validasi(LoginValidasiRequest $request)
    {
        // Validasi inputan sudah dilakukan pada parameter request

        $akun = AkunModel::where('email', $request->email)->first();
        // Jika akun terdaftar
        if ($akun) {
            // Jika akun aktif
            if ($akun['is_active'] == 1) {
                // Cek password
                if (Hash::check($request->password, $akun['password'])) {
                    // Cek role
                    if ($akun['role'] == 'admin') {
                        $this->setAdminSession($akun);
                        return redirect('/admin');
                    } else if ($akun['role'] == 'user') {
                        $this->setUserSession($akun);
                        return redirect('/user');
                    } else {
                        return redirect('/');
                    }
                } else {
                    return redirect('/login')->with('pesan', 'Maaf! email atau password salah!');
                }
            } else {
                return redirect('/login')->with('pesan', 'Maaf! akun anda belum aktif!');
            }
        } else {
            return redirect('/login')->with('pesan', 'Maaf! email atau password salah!');
        }
    }
    public function setAdminSession($akun)
    {
        $data = [
            'nama' => $akun['nama'],
            'email' => $akun['email'],
            'role' => $akun['role']
        ];

        session($data);
        return true;
    }
    public function setUserSession($akun)
    {
        $data = [
            'id' => $akun['id'],
            'nama' => $akun['nama'],
            'email' => $akun['email'],
            'role' => $akun['role']
        ];

        session($data);
        return true;
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('');
    }
}
