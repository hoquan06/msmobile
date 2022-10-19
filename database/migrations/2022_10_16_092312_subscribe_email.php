<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubscribeEmail extends Migration
{
    public function up()
    {
        Schema::create('subscribe_emails', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('ip');
            $table->string('location');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscribe_emails');
    }
}
