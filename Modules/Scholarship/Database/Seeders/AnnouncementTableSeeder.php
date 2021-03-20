<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipAnnouncement;

class AnnouncementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        ScholarshipAnnouncement::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'period_id' => 2,
            'title' => 'Pembukaan Seleksi Beasiswa Pembangunan Jaya',
            'description' => 'Seleksi beasiswa pembangunan jaya telah dibuka, batas akhir pengumpulan dokumen tanggal 28 Februari 2021',
            'document' => NULL,
            'created_at' => '2021-01-31 06:00:34',
            'updated_at' => '2021-01-31 06:00:34'
        ]);



        Scholarshipannouncement::updateOrCreate([
            'id' => 2,
        ], [
            'id' => 2,
            'period_id' => 2,
            'title' => 'Pengumuman Forum Group Discussions',
            'description' => 'Berikut terlampir informasi terkait dengan kegiatan FGD',
            'document' => 'document/BRS.pdf',
            'created_at' => '2021-01-31 06:01:16',
            'updated_at' => '2021-01-31 06:01:16'
        ]);



        Scholarshipannouncement::updateOrCreate([
            'id' => 3,
        ], [
            'id' => 3,
            'period_id' => 2,
            'title' => 'Mahasiswa Penerima Beasiswa Pembangunan Jaya',
            'description' => 'Berikut adalah daftar mahasiswa yang mendapatkan beasiswa pembangunan jaya',
            'document' => 'document/Bukti Organisasi.pdf',
            'created_at' => '2021-01-31 06:01:56',
            'updated_at' => '2021-01-31 06:01:56'
        ]);
    }
}
