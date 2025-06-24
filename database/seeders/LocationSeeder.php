<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class LocationSeeder extends Seeder
{
    public function run()
    {
        Location::truncate();

        Location::create(['name' => 'Shillong Head Office', 'address' => 'Brook land Compound, Lower New Colony', 'city' => 'Shillong', 'state' => 'Meghalaya', 'country' => 'India', 'zip' => '793003']);
        Location::create(['name' => 'New Delhi Office', 'address' => '15 NBCC Tower, Bhikaji Cama Place', 'city' => 'New Delhi', 'state' => 'Delhi', 'country' => 'India', 'zip' => '110066']);
        Location::create(['name' => 'Guwahati Office', 'address' => 'NEEPCO Bhavan, R.G Baruah Road', 'city' => 'Guwahati', 'state' => 'Assam', 'country' => 'India', 'zip' => '781005']);
        Location::create(['name' => 'Kopili HE Station', 'city' => 'Umrangso', 'state' => 'Assam']);
        Location::create(['name' => 'Doyang HE Station', 'city' => 'Doyang', 'state' => 'Nagaland']);
        Location::create(['name' => 'Assam Gas Based Power Station', 'city' => 'Bokuloni', 'state' => 'Assam']);
        Location::create(['name' => 'Agartala Gas Based Power Station', 'city' => 'Ramchandra Nagar', 'state' => 'Tripura']);
        Location::create(['name' => 'Tripura Gas Based Power Station', 'city' => 'Monarchak', 'state' => 'Tripura']);
        Location::create(['name' => 'Ranganadi HE Station', 'city' => 'Yazali', 'state' => 'Arunachal Pradesh']);
        Location::create(['name' => 'Tuirial HE Station', 'city' => 'Kolasib', 'state' => 'Mizoram']);
        Location::create(['name' => 'Pare HE Station', 'city' => 'Doimukh', 'state' => 'Arunachal Pradesh']);
        Location::create(['name' => 'Kameng HE Station', 'city' => 'Kimi', 'state' => 'Arunachal Pradesh']);
        Location::create(['name' => 'Wah Umium HE Plant', 'city' => 'Mawsynram', 'state' => 'Meghalaya']);
        Location::create(['name' => 'Delhi Camp Office', 'address' => 'Third Floor, Block-C, Centrum Mall, Sultanpur, M.G.Road', 'city' => 'New Delhi', 'state' => 'Delhi', 'country' => 'India', 'zip' => '110030']);
    }
}
