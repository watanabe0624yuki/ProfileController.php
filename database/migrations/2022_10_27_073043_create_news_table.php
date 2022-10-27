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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');// ニュースのタイトルを保存するカラム
            $table->string('body'); // ニュースの本文を保存するカラム
            $table->string('image_path')->nullable();// 画像のパスを保存するカラム。->nullable()という記述は、画像のパスは空でも保存できます、という意味
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//関数downには、Migrationの取り消しをおこなうためのコードを書く。ここでは、もしnewsというテーブルが存在すれば削除する、と書かれている。
    {
        Schema::dropIfExists('news');
    }
};
