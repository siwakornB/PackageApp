<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::dropIfExists('image_uploads');
        Schema::create('image_uploads', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->bigInteger('Package_Id');
            $table->text('path');
            $table->timestamps();

            $table->foreign('Package_Id')
                ->references('Id')
                ->on('package52')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_uploads');
    }
}
