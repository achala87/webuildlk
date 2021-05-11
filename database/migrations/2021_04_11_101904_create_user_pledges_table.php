<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPledgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pledges', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("user_id");
            $table->uuid("pledge_id");

            //relationships
            //$table->foreign('user_id')->references('id')->on('user')->onDelete('cascade'); // if user deleted then delete pledge
            //$table->foreign('pledge_id')->references('pledge_id')->on('pledges')->onUpdate('cascade'); //if pledge id updated updated pledge id here as well
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_pledges');
    }
}
