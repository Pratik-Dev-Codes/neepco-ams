<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToAssets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('assets', function (Blueprint $table) {
            if (!Schema::hasColumn('assets', 'image')) {
                $table->text('image')->after('notes')->nullable()->default(null);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

       /**
        * I'm leaving this one out, since it could destroy data that was already long-existing. 
        */
    }
}
