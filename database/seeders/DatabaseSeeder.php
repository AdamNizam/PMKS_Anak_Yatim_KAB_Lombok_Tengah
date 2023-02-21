<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Userlog;
use App\Models\Survior;
use App\Models\Verifikator;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\KelasPendidikan;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Role::create([
            'role' => 'Superadmin'
        ]);
        Role::create([
            'role' => 'Pimpinan'
        ]);
        Role::create([
            'role' => 'Verifikator'
        ]);
        Role::create([
            'role' => 'Pendata'
        ]);

        // userlog
        Userlog::create([
            'id_role' => 1,
            'username' => 'hambasatu',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 2,
            'username' => 'Roby',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 3,
            'username' => 'Lukman',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 4,
            'username' => 'Kahfie',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 4,
            'username' => 'khairul',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 4,
            'username' => 'gani',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 4,
            'username' => 'abdul',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 4,
            'username' => 'habib',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 4,
            'username' => 'musa',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 4,
            'username' => 'harun',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 4,
            'username' => 'robbany',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 4,
            'username' => 'gilang',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 4,
            'username' => 'nizam',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 4,
            'username' => 'ayu',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);
        Userlog::create([
            'id_role' => 4,
            'username' => 'arif',
            'password' => Hash::make('1'),
            'aktif'    => 1,
        ]);

        // Pendata atau survior
        Survior::create([
            'id_userlog' => 4,
            'id_kecamatan' => 1,
            'id_desa'   => 1,
            'nama_lengkap' => "Khairul Kahpi",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Alkhairi@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        Survior::create([
            'id_userlog' => 5,
            'id_kecamatan' => 2,
            'id_desa'   => 2,
            'nama_lengkap' => "Al Khairiy",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Alkhairi@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        Survior::create([
            'id_userlog' => 6,
            'id_kecamatan' => 3,
            'id_desa'   => 3,
            'nama_lengkap' => "Al Gani",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Alkhairi@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        Survior::create([
            'id_userlog' => 7,
            'id_kecamatan' => 4,
            'id_desa'   => 4,
            'nama_lengkap' => "Al Khairiy",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Alkhairi@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        Survior::create([
            'id_userlog' => 8,
            'id_kecamatan' => 5,
            'id_desa'   => 5,
            'nama_lengkap' => "Al Khairiy",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Alkhairi@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        Survior::create([
            'id_userlog' => 9,
            'id_kecamatan' => 6,
            'id_desa'   => 6,
            'nama_lengkap' => "Al Khairiy",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Alkhairi@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        Survior::create([
            'id_userlog' => 10,
            'id_kecamatan' => 7,
            'id_desa'   => 7,
            'nama_lengkap' => "Al Khairiy",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Alkhairi@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        Survior::create([
            'id_userlog' => 11,
            'id_kecamatan' => 8,
            'id_desa'   => 8,
            'nama_lengkap' => "Al Khairiy",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Alkhairi@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        Survior::create([
            'id_userlog' => 12,
            'id_kecamatan' => 9,
            'id_desa'   => 9,
            'nama_lengkap' => "Al Khairiy",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Alkhairi@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        Survior::create([
            'id_userlog' => 13,
            'id_kecamatan' => 10,
            'id_desa'   => 10,
            'nama_lengkap' => "Al Khairiy",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Alkhairi@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        Survior::create([
            'id_userlog' => 14,
            'id_kecamatan' => 11,
            'id_desa'   => 11,
            'nama_lengkap' => "Al Khairiy",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Alkhairi@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        Survior::create([
            'id_userlog' => 15,
            'id_kecamatan' => 12,
            'id_desa'   => 12,
            'nama_lengkap' => "Al Khairiy",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Alkhairi@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        // verifikator
        Verifikator::create([
            'id_userlog' => 3,
            'nama_lengkap' => "M Lukman Hakim",
            'nomor_sk' => '05_2009',
            'nik' => '52010199100120',
            'alamat' => 'Beraim',
            'email' => "Allukman@diatersenyum.wiki",
            'no_hp' => '087863270210',
            'file_sk' => 'sk_2023.pdf'
        ]);
        // kecamatan
        Kecamatan::create([
            'nama_kecamatan' => 'Praya',
        ]);
        Kecamatan::create([
            'nama_kecamatan' => 'Jonggat',
        ]);
        Kecamatan::create([
            'nama_kecamatan' => 'Batukliang',
        ]);
        Kecamatan::create([
            'nama_kecamatan' => 'Pujut',
        ]);
        Kecamatan::create([
            'nama_kecamatan' => 'Praya Barat',
        ]);
        Kecamatan::create([
            'nama_kecamatan' => 'Praya Timur',
        ]);
        Kecamatan::create([
            'nama_kecamatan' => 'Janapria',
        ]);
        Kecamatan::create([
            'nama_kecamatan' => 'Pringgarata',
        ]);
        Kecamatan::create([
            'nama_kecamatan' => 'Kopang',
        ]);
        Kecamatan::create([
            'nama_kecamatan' => 'Praya Tengah',
        ]);
        Kecamatan::create([
            'nama_kecamatan' => 'Praya Barat Daya',
        ]);
        Kecamatan::create([
            'nama_kecamatan' => 'Batukliang Utara',
        ]);
        // Desa
        Desa::create([
            'id_kecamatan' => 1,
            'nama_desa' => 'Praya',
        ]);
        Desa::create([
            'id_kecamatan' => 2,
            'nama_desa' => 'Barejulat',
        ]);
        Desa::create([
            'id_kecamatan' => 3,
            'nama_desa' => 'Bujak',
        ]);
        Desa::create([
            'id_kecamatan' => 4,
            'nama_desa' => 'Sengkol',
        ]);
        Desa::create([
            'id_kecamatan' => 5,
            'nama_desa' => 'Bonder',
        ]);
        Desa::create([
            'id_kecamatan' => 6,
            'nama_desa' => 'Sukaraja',
        ]);
        Desa::create([
            'id_kecamatan' => 7,
            'nama_desa' => 'Lekor',
        ]);
        Desa::create([
            'id_kecamatan' => 8,
            'nama_desa' => 'Pringgarata',
        ]);
        Desa::create([
            'id_kecamatan' => 9,
            'nama_desa' => 'Lendang are',
        ]);
        Desa::create([
            'id_kecamatan' => 10,
            'nama_desa' => 'Gerantung',
        ]);
        Desa::create([
            'id_kecamatan' => 11,
            'nama_desa' => 'Montong Sapah',
        ]);
        Desa::create([
            'id_kecamatan' => 12,
            'nama_desa' => 'Lantan',
        ]);

        //pekerjaan
        Pekerjaan::create([
            'pekerjaan' => 'Petani'
        ]);
        Pekerjaan::create([
            'pekerjaan' => 'Nelayan'
        ]);
        Pekerjaan::create([
            'pekerjaan' => 'Peternak'
        ]);
        Pekerjaan::create([
            'pekerjaan' => 'Pedagang'
        ]);
        Pekerjaan::create([
            'pekerjaan' => 'ASN'
        ]);
        Pekerjaan::create([
            'pekerjaan' => 'TKW/TKI'
        ]);
        Pekerjaan::create([
            'pekerjaan' => 'Lainnya'
        ]);
        // pendidikan
        Pendidikan::create(
            ['pendidikan' => 'PAUD/TK'],
        );
        Pendidikan::create(
            ['pendidikan' => 'Belum Sekolah'],
        );
        Pendidikan::create(
            ['pendidikan' => 'SD/MI Sederajat'],
        );
        Pendidikan::create(
            ['pendidikan' => 'Belum Tamat SD/MI Sederajat'],
        );
        Pendidikan::create(
            ['pendidikan' => 'SLTP Sederajat'],
        );
        Pendidikan::create(
            ['pendidikan' => 'Tamat SD/MI Sederajat'],
        );
        Pendidikan::create(
            ['pendidikan' => 'Tamat SLTP Sederajat'],
        );
        Pendidikan::create(
            ['pendidikan' => 'SLTA Sederajat'],
        );
        Pendidikan::create(
            ['pendidikan' => 'Tamat SLTA Sederajat'],
        );
        Pendidikan::create(
            ['pendidikan' => 'Perguruan Tinggi/Sekolah Kejuruan'],
        );

        // kelas pendidikan
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 0 Besar'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 0 Kecil'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 1'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 2'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 3'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 4'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 5'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 6'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 7'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 8'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 9'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 10'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 11'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Kelas 12'],
        );
        KelasPendidikan::create(
            ['kelas_pendidikan' => 'Putus Sekolah'],
        );
    }
}
