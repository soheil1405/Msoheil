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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('id');
            $table->string('title')->unique();
            $table->string('cover');
            $table->string('category');
            $table->string('auther');
            $table->longtext('content');
            $table->text('keywords');
            $table->longtext('caption');
            $table->boolean('isCommentOn')->default(true);
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
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
         Schema::dropIfExists('personal_access_tokens');
    }
};
