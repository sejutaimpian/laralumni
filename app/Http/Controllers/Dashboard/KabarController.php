<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\KabarRequest;
use App\Models\KabarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KabarController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kabar Alumni',
            'profile' => $this->profile,

            'kabar' => KabarModel::getJoinKabarAkun()
        ];
        return view('dashboard/kabaralumni', $data);
    }
    public function tambah(KabarRequest $request)
    {
        // Validasi inputan sudah dilakukan pada parameter request

        // Mengelola foto
        $namaFoto = 'default.png';
        if ($request->file('foto')) {
            $request->file('foto')->store("Foto-Kabar");
            $namaFoto = $request->file('foto')->hashName();
        }

        // Save ke database
        KabarModel::create([
            'idakun' => $request->idakun,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $namaFoto,
        ]);
        return redirect('dashboard/kabaralumni')->with('pesan', 'Kabar berhasil ditambahkan');
    }
    public function edit($id)
    {
        $data = [
            'title'         => 'Edit Penghargaan',
            'profile'       => $this->profile,

            'kabar' => KabarModel::getJoinKabarAkun($id)
        ];

        return view('dashboard/kabaralumni-edit', $data);
    }
    public function update(KabarRequest $request, $id)
    {
        // Validasi inputan sudah dilakukan pada parameter request

        // Mengelola foto
        $kabar = KabarModel::find($id);
        if ($request->file('foto')) {
            $request->file('foto')->store("Foto-Kabar");
            $namaFoto = $request->file('foto')->hashName();
            if ($kabar->foto != 'default.png') {
                Storage::delete("Foto-Kabar/$kabar->foto");
            }
        } else {
            $namaFoto = $kabar->foto;
        }

        // Save ke database
        KabarModel::where('id', $id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $namaFoto,
        ]);

        return redirect('dashboard/kabaralumni')->with('pesan', 'Kabar Alumni berhasil diupdate');
    }
}
