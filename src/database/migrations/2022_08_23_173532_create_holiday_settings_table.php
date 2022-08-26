<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidaySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holiday_settings', function (Blueprint $table) {
            $table->id();
            $table->integer("flag_mon");
			$table->integer("flag_tue");
			$table->integer("flag_wed");
			$table->integer("flag_thu");
			$table->integer("flag_fri");
			$table->integer("flag_sat");
			$table->integer("flag_sun");
			$table->integer("flag_holiday");
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
        Schema::dropIfExists('holiday_settings');
    }
}
