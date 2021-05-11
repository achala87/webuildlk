<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmendOrgTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
            $table->string('emails')->nullable()->change();
            $table->string('contact_numbers')->nullable()->change();
            $table->string('related_ministry')->nullable()->change();
            $table->text('address')->nullable()->change();
            $table->float('avg_rating')->nullable()->change();
            $table->json('photos')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organizations', function (Blueprint $table) {
            //
        });
    }
}
