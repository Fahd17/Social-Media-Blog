<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_user_profile', function (Blueprint $table) {
            $table->primary(["post_id", "user_profile_id"]);
            $table->bigInteger("post_id")->unsigned();
            $table->bigInteger("user_profile_id")->unsigned();
            $table->timestamps();

            $table->foreign("user_profile_id")->references("id")->on("user_profiles")
            ->onDelete("cascade")->onUpdate("cascade");

            $table->foreign("post_id")->references("id")->on("posts")
            ->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_user_profile');
    }
};
