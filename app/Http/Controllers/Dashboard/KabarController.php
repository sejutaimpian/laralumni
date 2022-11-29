<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\KabarRequest;
use App\Models\KabarModel;
use Illuminate\Http\Request;

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
}
