<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TambahAlumniRequest;
use App\Models\AlumniModel;
use App\Models\JurusanModel;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class AlumniController extends Controller
{
    public function index()
    {
        $data = [
            'title'         => 'Alumni',
            'profile'       => $this->profile,

            'alumni'        => AlumniModel::getJoinJurusan(),
            'jurusan'       => JurusanModel::all()
        ];

        return view('dashboard/alumni', $data);
    }
    public function tambahalumni(TambahAlumniRequest $request)
    {
        // Validasi inputan sudah dilakukan pada parameter request

        // Upload foto
        $request->file('foto')->store("Foto-Alumni-$request->tahun_masuk");

        // Save ke database
        AlumniModel::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'ortu_wali' => $request->ortu_wali,
            'id_jurusan' => $request->id_jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'status' => $request->status,
            'tahun_keluar' => $request->tahun_keluar,
            'foto' => $request->file('foto')->hashName()
        ]);
        return redirect()->back()->with('pesan', 'Data berhasil ditambahkan');
    }
    public function detail($nis)
    {
        $data = [
            'title'         => 'Detail Alumni',
            'profile'       => $this->profile,

            'alumni'        => AlumniModel::getJoinJurusan($nis)
        ];

        return view('dashboard/alumni-detail', $data);
    }
    public function edit($nis)
    {
        $data = [
            'title'         => 'Edit Alumni',
            'profile'       => $this->profile,

            'alumni'        => AlumniModel::getJoinJurusan($nis),
            'jurusan'       => JurusanModel::all()
        ];

        return view('dashboard/alumni-edit', $data);
    }
}
