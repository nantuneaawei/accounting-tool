<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\mydb\member;

class CreateMemberTable extends Migration
{
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->string('Nickname', 32);
            $table->string('Email', 32);
            $table->string('Password', 255);
            $table->string('UID', 32)->nullable();
            $table->string('UID_2', 32)->nullable();
        });

        if (!member::where('Nickname', 'test')->exists()) {
            member::create([
                'Nickname' => 'test',
                'Email' => 'test@gmail.com',
                'Password' => password_hash('1234', PASSWORD_DEFAULT),
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('member');
    }
}
