<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\KenanganModel;
use Illuminate\Http\Request;

class KenanganController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kenangan Siswa',
            'profile' => $this->profile,

            'kenangan' => KenanganModel::orderBy('created_at', 'desc')->get()
        ];
        return view('dashboard/kenangan', $data);
    }
}
