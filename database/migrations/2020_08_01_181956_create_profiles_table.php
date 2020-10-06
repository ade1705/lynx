<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('profile_id');
            $table->integer('profile_user_id');
            $table->string('profile_username')->nullable();
            $table->string('profile_avatar')->nullable();
            $table->text('profile_bio')->nullable();
            $table->string('profile_website')->nullable();
            $table->string('profile_instagram')->nullable();
            $table->string('profile_twitter')->nullable();
            $table->string('profile_facebook')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
