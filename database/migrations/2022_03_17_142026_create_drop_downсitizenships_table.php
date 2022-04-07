<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDropDownсitizenshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // qweqweqwqe
    public function up()
    {
        Schema::create('drop_downсitizenships', function (Blueprint $table) {
            $table->id();
            $table->string('citizenship');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drop_downсitizenships');
    }
}
