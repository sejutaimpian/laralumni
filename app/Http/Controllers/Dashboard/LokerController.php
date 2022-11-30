<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LokerRequest;
use App\Models\LokerModel;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Lowongan Pekerjaan',
            'profile' => $this->profile,

            'loker' => LokerModel::orderBy('deadline', 'desc')->get()
        ];
        return view('dashboard/loker', $data);
    }
    public function tambah(LokerRequest $request)
    {
        // Validasi inputan sudah dilakukan pada parameter request

        // Mengelola foto
        $namaFoto = 'default.png';
        if ($request->file('logo_perusahaan')) {
            $request->file('logo_perusahaan')->store("Logo-Perusahaan");
            $namaFoto = $request->file('logo_perusahaan')->hashName();
        }

        // Save ke database
        LokerModel::create([
            'logo_perusahaan' => $namaFoto,
            'pekerjaan' => $request->pekerjaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'penempatan' => $request->penempatan,
            'gaji' => $request->gaji,
            'pendidikan' => $request->pendidikan,
            'usia' => $request->usia,
            'kualifikasi' => $request->kualifikasi,
            'sumber' => $request->sumber,
            'deadline' => $request->deadline
        ]);
        return redirect()->back()->with('pesan', 'Data berhasil ditambahkan');
    }
}
