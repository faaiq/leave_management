<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('reason');
            $table->integer('backup_employee_id');
            $table->unsignedSmallInteger('approved');
            
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
        Schema::dropIfExists('leave_applications');
    }
}
