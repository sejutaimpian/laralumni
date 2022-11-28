<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlumniRequest;
use App\Models\AlumniModel;
use App\Models\JurusanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function tambahalumni(AlumniRequest $request)
    {
        // Validasi inputan sudah dilakukan pada parameter request

        // Mengelola foto
        $namaFoto = 'default.png';
        if ($request->file('foto')) {
            $request->file('foto')->store("Foto-Alumni");
            $namaFoto = $request->file('foto')->hashName();
        }

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
            'foto' => $namaFoto
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
    public function update(AlumniRequest $request, $nis)
    {
        // Validasi inputan sudah dilakukan pada parameter request

        // Mengelola foto
        $alumni = AlumniModel::find($nis);
        if ($request->file('foto')) {
            $request->file('foto')->store("Foto-Alumni");
            $namaFoto = $request->file('foto')->hashName();
            if ($alumni->foto != 'default.png') {
                Storage::delete("Foto-Alumni/$namaFoto");
            }
        } else {
            $namaFoto = $alumni->foto;
        }

        // Save ke database
        AlumniModel::where('nis', $nis)->update([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'ortu_wali' => $request->ortu_wali,
            'id_jurusan' => $request->id_jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'status' => $request->status,
            'tahun_keluar' => $request->tahun_keluar,
            'foto' => $namaFoto
        ]);
        return redirect('dashboard/alumni')->with('pesan', 'Data berhasil diupdate');
    }
    public function delete($nis)
    {
        $alumni = AlumniModel::select('foto')->where('nis', $nis)->first();
        if ($alumni->foto != 'default.png') {
            Storage::delete("Foto-Alumni/$alumni->foto");
        }
        if (AlumniModel::destroy($nis)) {
            return redirect()->to('/dashboard/alumni')->with('pesan', 'Data berhasil dihapus');
        } else {
            return redirect()->to('/dashboard/alumni')->with('peringatan', 'Data gagal dihapus');
        }
    }
}
