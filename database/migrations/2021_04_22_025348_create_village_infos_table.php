<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillageInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_infos', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("address");
            $table->text("description");
            $table->string("no_hp");
            $table->string("email");
            $table->enum("start_day", ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"]);
            $table->enum("end_day", ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"]);
            $table->time("start_time");
            $table->time("end_time");
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
        Schema::dropIfExists('village_infos');
    }
}
