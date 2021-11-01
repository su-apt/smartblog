<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowerFollowingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follower_following', function (Blueprint $table) {

            $table->unsignedBigInteger('follower_id');
            $table->unsignedBigInteger('following_id');

            $table->primary(array('follower_id', 'following_id'));
            $table->foreign('follower_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            $table->foreign('following_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follower_following');
    }
}
