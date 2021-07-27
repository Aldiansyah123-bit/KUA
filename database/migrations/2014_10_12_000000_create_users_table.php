<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nik',30)->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('temp_lahir',20)->nullable();
            $table->date('tanggal')->nullable();
            $table->integer('umur')->nullable();
            $table->string('agama',10)->nullable();
            $table->string('alamat',50)->nullable();
            $table->string('pendidikan',50)->nullable();
            $table->string('pekerjaan',50)->nullable();
            $table->integer('no_hp')->nullable();
            $table->string('foto',50)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('level')->default('user');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
