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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string("comment_text");
            $table->bigInteger("user_profile_id")->unsigned();
            $table->bigInteger("post_id")->unsigned();
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
        Schema::dropIfExists('comments');
    }
};
