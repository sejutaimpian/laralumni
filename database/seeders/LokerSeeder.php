<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loker')->insert([
            [
                'logo_perusahaan' => 'logo_kemendan.png',
                'pekerjaan' => 'Staff Administrasi Kependudukan dan Pencatatan Sipil',
                'nama_perusahaan' => 'Kementerian Dalam Negeri Republik Indonesia',
                'penempatan' => 'Jakarta Utara',
                'gaji' => 'IDR. 3-5jt',
                'pendidikan' => 'Min SMA atau sederajat',
                'usia' => 'Min 18 tahun',
                'kualifikasi' => 'Piawai menggunakan komputer',
                'sumber' => 'https://www.kemendagri.go.id/',
                'deadline' => '2022-10-31',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'logo_perusahaan' => 'logo_kemendag.png',
                'pekerjaan' => 'Staff Hubungan Masyarakat',
                'nama_perusahaan' => 'Kementerian Perdagangan Republik Indonesia',
                'penempatan' => 'Jakarta Selatan',
                'gaji' => 'IDR. 4-6jt',
                'pendidikan' => 'Min SMA atau sederajat',
                'usia' => 'Min 20 tahun',
                'kualifikasi' => 'Mempunyai jiwa sosial tinggi',
                'sumber' => 'https://www.kemendag.go.id/id',
                'deadline' => '2022-11-20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'logo_perusahaan' => 'logo_kemendikbud.png',
                'pekerjaan' => 'Staff Bahasa dan Sastra Indonesia',
                'nama_perusahaan' => 'Staff Bahasa dan Sastra Indonesia',
                'penempatan' => 'Jakarta Barat',
                'gaji' => 'IDR. 5-7jt',
                'pendidikan' => 'Min SMA atau sederajat',
                'usia' => 'Min 19 tahun',
                'kualifikasi' => 'Mampu berbahasa Indonesia yang baik dan benar',
                'sumber' => 'https://www.kemendikbud.go.id',
                'deadline' => '2022-12-15',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
