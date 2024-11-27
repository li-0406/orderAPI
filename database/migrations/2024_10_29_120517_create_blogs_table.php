<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('用戶id');
            $table->integer('category_id')->comment('分類id');
            $table->integer('title')->comment('文章標題');
            $table->integer('content')->comment('文章內容');
            $table->integer('status')->default(1)->comment('發佈狀態：0未發佈 1發布');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};