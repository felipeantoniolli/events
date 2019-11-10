<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id_subscription');
            $table->dateTime('subscribe_date');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_event');

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_event')->references('id_event')->on('events');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
