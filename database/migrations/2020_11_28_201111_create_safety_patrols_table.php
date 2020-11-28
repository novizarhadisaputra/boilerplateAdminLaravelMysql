<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSafetyPatrolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('safety_patrols', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->string('pic_name');
            $table->string('operator')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('safety_category_id');
            $table->dateTime('worked_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('safety_patrols');
    }
}
