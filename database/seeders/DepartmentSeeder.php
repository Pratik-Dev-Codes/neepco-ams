<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        Department::truncate();

        $this->call(LocationSeeder::class);

        $admin = User::where('permissions->superuser', '1')->first() ?? User::factory()->firstAdmin()->create();

        $locations = Location::all()->keyBy('name');

        $departments = [
            ['name' => 'CMD Secretariat', 'location' => 'Shillong Head Office'],
            ['name' => 'Director (Personnel) Secretariat', 'location' => 'Shillong Head Office'],
            ['name' => 'Director (Technical) Secretariat', 'location' => 'Shillong Head Office'],
            ['name' => 'Chief Vigilance Officer', 'location' => 'Shillong Head Office'],
            ['name' => 'Company Secretariat', 'location' => 'Shillong Head Office'],
            ['name' => 'Corporate Affairs, Corporate Communications & Renewable Energy', 'location' => 'New Delhi Office'],
            ['name' => 'Corporate Planning', 'location' => 'Shillong Head Office'],
            ['name' => 'Corporate Project Monitoring', 'location' => 'Shillong Head Office'],
            ['name' => 'Commercial', 'location' => 'Shillong Head Office'],
            ['name' => 'Project Hydro & Tato & Heo', 'location' => 'Guwahati Office'],
            ['name' => 'Contract and Procurement', 'location' => 'Shillong Head Office'],
            ['name' => 'Design & Engineering', 'location' => 'Guwahati Office'],
            ['name' => 'Material Management', 'location' => 'Guwahati Office'],
            ['name' => 'Environment & RR', 'location' => 'Shillong Head Office'],
            ['name' => 'Project Acquisition & Business Development', 'location' => 'Guwahati Office'],
            ['name' => 'Operation & Maintenance', 'location' => 'Shillong Head Office'],
            ['name' => 'Vigilance', 'location' => 'Shillong Head Office'],
            ['name' => 'Finance and Accounts', 'location' => 'Shillong Head Office'],
            ['name' => 'Human Resource', 'location' => 'Shillong Head Office'],
            ['name' => 'Quality Assurance & Inspection', 'location' => 'Shillong Head Office'],
            ['name' => 'Arbitration & Corporate Planning', 'location' => 'Guwahati Office'],
            ['name' => 'QSHE', 'location' => 'Shillong Head Office'],
            ['name' => 'Land Acquisition', 'location' => 'Shillong Head Office'],
            ['name' => 'Information Technology', 'location' => 'Shillong Head Office'],
            ['name' => 'Kopili Hydro Power Station', 'location' => 'Kopili HE Station'],
            ['name' => 'Doyang Hydro Power Station', 'location' => 'Doyang HE Station'],
            ['name' => 'Assam Gas Based Power Station', 'location' => 'Assam Gas Based Power Station'],
            ['name' => 'Agartala Gas Based Power Station', 'location' => 'Agartala Gas Based Power Station'],
            ['name' => 'Tripura Gas Based Power Station', 'location' => 'Tripura Gas Based Power Station'],
            ['name' => 'Ranganadi Hydro Power Station', 'location' => 'Ranganadi HE Station'],
            ['name' => 'Tuirial Hydro Power Station', 'location' => 'Tuirial HE Station'],
            ['name' => 'Pare Hydro Power Station', 'location' => 'Pare HE Station'],
            ['name' => 'Kameng Hydro Power Station', 'location' => 'Kameng HE Station'],
            ['name' => 'Wah Umium Hydro Electric Plant', 'location' => 'Wah Umium HE Plant'],
            ['name' => 'CMD & Directors Camp Office, Delhi', 'location' => 'Delhi Camp Office'],
        ];

        foreach ($departments as $department) {
            if (isset($locations[$department['location']])) {
                Department::create([
                    'name' => $department['name'],
                    'location_id' => $locations[$department['location']]->id,
                    'created_by' => $admin->id,
                ]);
            }
        }
    }
}
