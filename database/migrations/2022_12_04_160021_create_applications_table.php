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
        Schema::create('applications', function (Blueprint $table) {
            
            $table->id();
            $table->string('days');
            $table->string('handover');
            $table->string('startDate');
            $table->string('endDate');
            $table->string('name');
            $table->longText('attachment');
            $table->string('comments');
            $table->string('applicantId');
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
        Schema::dropIfExists('applications');
    }
};
