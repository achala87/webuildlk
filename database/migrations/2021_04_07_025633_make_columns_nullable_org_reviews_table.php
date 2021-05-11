<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeColumnsNullableOrgReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organization_reviews', function (Blueprint $table) {
            $table->string('note_to_organization_head')->nullable()->change();
            $table->string('evidence')->nullable()->change();
            $table->string('days_taken_to_recieve_service', 50)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organization_reviews', function (Blueprint $table) {
            //
        });
    }
}
