<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\KenanganRequest;
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
    public function tambah(KenanganRequest $request)
    {
        // Validasi inputan sudah dilakukan pada parameter request

        // Save ke database
        KenanganModel::create([
            'nama_kenangan' => $request->nama_kenangan,
            'pengelola' => $request->pengelola,
            'link' => $request->link
        ]);
        return redirect()->back()->with('pesan', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $data = [
            'title'     => 'Edit Kenangan',
            'profile'   => $this->profile,

            'kenangan'     => KenanganModel::find($id)
        ];

        return view('dashboard/kenangan-edit', $data);
    }
    public function update(KenanganRequest $request, $id)
    {
        // Validasi inputan sudah dilakukan pada parameter request

        // Save ke database
        KenanganModel::where('id', $id)->update([
            'nama_kenangan' => $request->nama_kenangan,
            'pengelola' => $request->pengelola,
            'link' => $request->link
        ]);
        return redirect('dashboard/kenangan')->with('pesan', 'Data berhasil diupdate');
    }
    public function delete($id)
    {
        if (KenanganModel::destroy($id)) {
            return redirect()->to('/dashboard/kenangan')->with('pesan', 'Data berhasil dihapus');
        } else {
            return redirect()->to('/dashboard/kenangan')->with('peringatan', 'Data gagal dihapus');
        }
    }
}
