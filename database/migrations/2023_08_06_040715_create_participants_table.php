<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clients_id')->unsigned()->index();
            $table->string('c_name')->nullable();
            $table->unsignedBigInteger('events_id')->unsigned()->index();
            $table->string('e_title')->nullable();
            $table->string('kids')->nullable();
            $table->string('adults')->nullable();
            $table->timestamps();

            $table->foreign('clients_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
