<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipInformation;

class InformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        ScholarshipInformation::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'scholarship_form' => 'document/s4jWBnzD7WMJNauw926gsS45DgltMCb9vhO3o3eq.pdf',
            'scholarship_terms_condition' => 'document/7iEHnRMWDt9GbGOOfwKSGwdhyjYFYvqRn2JGBZ3i.pdf',
            'cv_templete' => 'document/lKlvZ7l1Rwq7F8RwEZvrGRxb10CHzfy5gj4osktf.pdf',
            'created_at' => '2021-01-31 05:50:19',
            'updated_at' => '2021-01-31 06:02:30'
        ]);
    }
}
