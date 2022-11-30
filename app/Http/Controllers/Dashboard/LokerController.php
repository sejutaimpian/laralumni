<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LokerRequest;
use App\Models\LokerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function edit($id)
    {
        $data = [
            'title'     => 'Edit Lowongan Pekerjaan',
            'profile'   => $this->profile,

            'loker'     => LokerModel::find($id)
        ];

        return view('dashboard/loker-edit', $data);
    }
    public function update(LokerRequest $request, $id)
    {
        // Validasi inputan sudah dilakukan pada parameter request

        // Mengelola foto
        $loker = LokerModel::find($id);
        if ($request->file('logo_perusahaan')) {
            $request->file('logo_perusahaan')->store("Logo-Perusahaan");
            $namaFoto = $request->file('logo_perusahaan')->hashName();
            if ($loker->logo_perusahaan != 'default.png') {
                Storage::delete("Logo-Perusahaan/$loker->logo_perusahaan");
            }
        } else {
            $namaFoto = $loker->logo_perusahaan;
        }

        // Save ke database
        LokerModel::where('id', $id)->update([
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
        return redirect('dashboard/loker')->with('pesan', 'Data berhasil diupdate');
    }
}
