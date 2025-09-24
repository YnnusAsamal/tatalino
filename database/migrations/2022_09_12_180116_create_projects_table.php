<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('projectId');
            $table->string('projectName')->nullable();
            $table->string('projectDettails')->nullable();
            $table->string('projectPrice')->nullable();
            $table->string('ProjectLeader')->nullable();
            $table->date('projectStart')->nullable();
            $table->date('projectEnd')->nullable();
            $table->string('projectStatus')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
