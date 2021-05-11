<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveExtraColsOrgReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organization_reviews', function (Blueprint $table) {
            $table->dropColumn('negative_attributes');
            $table->dropColumn('positive_attributes');
            $table->dropColumn('dates');
            $table->date('date_from');
            $table->date('date_to')->nullable();
            $table->double('service_quality');
            $table->double('process_clarity');
            $table->double('efficiency_timeliness');
            $table->double('bribery_corruption');
            $table->boolean('confirm_truthfullness')->default(0);

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
