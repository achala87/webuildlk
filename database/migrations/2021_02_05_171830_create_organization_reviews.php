<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('organization_reviews');
        Schema::create('organization_reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id')->references('id')->on('organizations');

            $table->double('rating');
            $table->json('dates');
            $table->string('description');
            $table->text('note_to_organization_head');
            $table->json('designation_of_officers');
            $table->string('service_saught');
            $table->json('negative_attributes');
            $table->json('positive_attributes');
            $table->json('evidence');
            $table->boolean('service_recieved');
            $table->double('days_taken_to_recieve_service');
            $table->integer('created_by_user_id');
            $table->tinyInteger('status');
            $table->boolean('send_user_information_to_authorities');
            $table->softDeletesTz('deleted_at', 0);

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_reviews');
    }
}
