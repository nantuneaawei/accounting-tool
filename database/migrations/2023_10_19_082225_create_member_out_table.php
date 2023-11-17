<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateMemberOutTable extends Migration
{
    public function up()
    {
        Schema::create('member_out', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('M_ID');
            $table->string('Items', 32)->nullable();
            $table->integer('Money')->nullable();
            $table->date('Time')->nullable();
            $table->timestamp('createdAt')->useCurrent();
            $table->timestamp('updatedAt')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('M_ID')->references('id')->on('member');
        });
    }

    public function down()
    {
        Schema::dropIfExists('member_out');
    }
}
