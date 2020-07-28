<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userlogs', function (Blueprint $table) {
            $table->bigIncrements('id'); //id
            $table->string('log_name');     //ชื่อ log ในที่นี้จะให้เป็นว่าทำอะไร
            $table->text('description')->nullable();    //รายละเอียด
            $table->unsignedBigInteger('subject_id')->nullable();   //id คนที่ทำ
            $table->string('subject_role')->nullable(); //role คนที่ทำ
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
        Schema::dropIfExists('userlogs');
    }
}
