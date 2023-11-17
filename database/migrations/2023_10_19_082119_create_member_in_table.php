<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateMemberInTable extends Migration
{
    public function up()
    {
        Schema::create('member_in', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('M_ID');
            $table->integer('Money_In')->nullable();
            $table->date('Time')->nullable();
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent()->useCurrentOnUpdate();


            $table->foreign('M_ID')->references('id')->on('member');
        });
    }

    public function down()
    {
        Schema::dropIfExists('member_in');
    }
}

