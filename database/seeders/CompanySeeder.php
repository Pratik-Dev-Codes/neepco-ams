<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::debug('Seed companies');
        Company::truncate();

        Company::create([
            'name' => 'North Eastern Electric Power Corporation Limited (NEEPCO)',
            'short_name' => 'NEEPCO',
            'summary' => 'North Eastern Electric Power Corporation Limited (NEEPCO) is a Schedule ‘A’ “Mini Ratna” Category-I Central Public Sector Enterprise (CPSE) under the Ministry of Power, Government of India. It was incorporated on 2nd April 1976 to plan, investigate, design, construct, generate, operate & maintain power stations in the North Eastern Region of India.',
            'address' => 'Brookland Compound, Lower New Colony',
            'city' => 'Shillong',
            'state' => 'Meghalaya',
            'zip' => '793003',
            'country' => 'India',
            'website' => 'https://neepco.co.in/',
            'phone' => '0364-2224487',
            'fax' => '0364-2226417',
            'email' => 'cmdneepco@neepco.co.in',
        ]);
    }
}
