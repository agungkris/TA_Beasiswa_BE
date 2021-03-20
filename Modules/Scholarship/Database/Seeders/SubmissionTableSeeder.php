<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipSubmissions;

class SubmissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        ScholarshipSubmissions::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'student_id' => 2,
            'period_id' => 2,
            'submit_form' => 'document/BRS.pdf',
            'brs' => 'document/Formulir Beasiswa.pdf',
            'raport' => 'document/Bukti Organisasi.pdf',
            'cv' => 'document/CV.pdf',
            'papers' => 'document/Karya Tulis.pdf',
            'other_requirements' => 'document/Prestasi.pdf',
            'initial_ipk' => 3,
            'next_stage' => 1,
            'final_stage' => 1,
            'created_at' => '2021-03-06 21:51:20',
            'updated_at' => '2021-03-08 22:11:43'
        ]);



        ScholarshipSubmissions::updateOrCreate([
            'id' => 2,
        ], [
            'id' => 2,
            'student_id' => 6,
            'period_id' => 2,
            'submit_form' => 'document/BRS.pdf',
            'brs' => 'document/Formulir Beasiswa.pdf',
            'raport' => 'document/Bukti Organisasi.pdf',
            'cv' => 'document/CV.pdf',
            'papers' => 'document/Karya Tulis.pdf',
            'other_requirements' => 'document/Prestasi.pdf',
            'initial_ipk' => 2,
            'next_stage' => 1,
            'final_stage' => 1,
            'created_at' => '2021-03-06 21:51:36',
            'updated_at' => '2021-03-08 22:11:43'
        ]);



        ScholarshipSubmissions::updateOrCreate([
            'id' => 3,
        ], [
            'id' => 3,
            'student_id' => 10,
            'period_id' => 2,
            'submit_form' => 'document/BRS.pdf',
            'brs' => 'document/Formulir Beasiswa.pdf',
            'raport' => 'document/Bukti Organisasi.pdf',
            'cv' => 'document/CV.pdf',
            'papers' => 'document/Karya Tulis.pdf',
            'other_requirements' => 'document/Prestasi.pdf',
            'initial_ipk' => 3.2,
            'next_stage' => 1,
            'final_stage' => 1,
            'created_at' => '2021-03-06 21:51:50',
            'updated_at' => '2021-03-08 22:11:43'
        ]);



        ScholarshipSubmissions::updateOrCreate([
            'id' => 4,
        ], [
            'id' => 4,
            'student_id' => 7,
            'period_id' => 2,
            'submit_form' => 'document/BRS.pdf',
            'brs' => 'document/Formulir Beasiswa.pdf',
            'raport' => 'document/Bukti Organisasi.pdf',
            'cv' => 'document/CV.pdf',
            'papers' => 'document/Karya Tulis.pdf',
            'other_requirements' => 'document/Prestasi.pdf',
            'initial_ipk' => 3.5,
            'next_stage' => 1,
            'final_stage' => 1,
            'created_at' => '2021-03-06 21:52:07',
            'updated_at' => '2021-03-10 03:22:51'
        ]);



        ScholarshipSubmissions::updateOrCreate([
            'id' => 5,
        ], [
            'id' => 5,
            'student_id' => 8,
            'period_id' => 2,
            'submit_form' => 'document/Formulir Beasiswa.pdf',
            'brs' => 'document/BRS.pdf',
            'raport' => 'document/Transkrip Nilai.pdf',
            'cv' => 'document/CV.pdf',
            'papers' => 'document/Karya Tulis.pdf',
            'other_requirements' => 'document/Prestasi.pdf',
            'initial_ipk' => 3,
            'next_stage' => 1,
            'final_stage' => 0,
            'created_at' => '2021-03-08 09:33:23',
            'updated_at' => '2021-03-10 03:53:03'
        ]);



        ScholarshipSubmissions::updateOrCreate([
            'id' => 6,
        ], [
            'id' => 6,
            'student_id' => 9,
            'period_id' => 2,
            'submit_form' => 'document/Formulir Beasiswa.pdf',
            'brs' => 'document/BRS.pdf',
            'raport' => 'document/Transkrip Nilai.pdf',
            'cv' => 'document/CV.pdf',
            'papers' => 'document/Karya Tulis.pdf',
            'other_requirements' => 'document/Prestasi.pdf',
            'initial_ipk' => NULL,
            'next_stage' => 1,
            'final_stage' => 0,
            'created_at' => '2021-03-08 09:35:34',
            'updated_at' => '2021-03-10 02:46:19'
        ]);



        ScholarshipSubmissions::updateOrCreate([
            'id' => 7,
        ], [
            'id' => 7,
            'student_id' => 11,
            'period_id' => 2,
            'submit_form' => 'document/Formulir Beasiswa.pdf',
            'brs' => 'document/BRS.pdf',
            'raport' => 'document/Transkrip Nilai.pdf',
            'cv' => 'document/CV.pdf',
            'papers' => 'document/Karya Tulis.pdf',
            'other_requirements' => 'document/Prestasi.pdf',
            'initial_ipk' => NULL,
            'next_stage' => NULL,
            'final_stage' => NULL,
            'created_at' => '2021-03-08 09:36:14',
            'updated_at' => '2021-03-08 09:36:14'
        ]);



        ScholarshipSubmissions::updateOrCreate([
            'id' => 8,
        ], [
            'id' => 8,
            'student_id' => 12,
            'period_id' => 2,
            'submit_form' => 'document/Formulir Beasiswa.pdf',
            'brs' => 'document/BRS.pdf',
            'raport' => 'document/Transkrip Nilai.pdf',
            'cv' => 'document/CV.pdf',
            'papers' => 'document/Karya Tulis.pdf',
            'other_requirements' => NULL,
            'initial_ipk' => NULL,
            'next_stage' => NULL,
            'final_stage' => NULL,
            'created_at' => '2021-03-08 09:36:31',
            'updated_at' => '2021-03-08 09:36:31'
        ]);
    }
}
