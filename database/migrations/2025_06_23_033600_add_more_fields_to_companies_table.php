<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('short_name')->nullable()->after('name');
            $table->text('summary')->nullable()->after('short_name');
            $table->string('address')->nullable()->after('summary');
            $table->string('city')->nullable()->after('address');
            $table->string('state')->nullable()->after('city');
            $table->string('zip', 10)->nullable()->after('state');
            $table->string('country')->nullable()->after('zip');
            $table->string('website')->nullable()->after('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn([
                'short_name',
                'summary',
                'address',
                'city',
                'state',
                'zip',
                'country',
                'website',
                'phone',
                'fax',
                'email'
            ]);
        });
    }
}
