<?php

use Illuminate\Database\Migrations\Migration;

class MigrateDenormedAssetLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Artisan::call('neepco_ams:sync-asset-locations', ['--output' => 'all']);
        $output = Artisan::output();
        \Log::info($output);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
