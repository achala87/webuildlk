<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmendOrgReviewsTblReviewerDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organization_reviews', function (Blueprint $table) {
            $table->integer('reviewer_id')->default('0');
            $table->json('remarks'); //userid, remark, datetime, flag [normal/alert, on/off], fileuploads
            $table->tinyInteger('response_status')->default('0');
            $table->json('response_update'); //userid, response_msg, staff_id, datetime, flag [normal/alert, on/off], fileuploads
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
