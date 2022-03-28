<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDropDownEnglishProficiencyCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drop_down_english_proficiency_certificates', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('englishProficiencyCertificates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drop_down_english_proficiency_certificates');
    }
}
