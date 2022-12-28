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
        Schema::create('members', function (Blueprint $table) {
            $table->id('member_id', 11);
            $table->string('member_name', 50);
            $table->string('address', 100);
            $table->string('contact', 15);
            $table->string('email', 30);
            $table->integer('age');
            $table->string('gender', 30);
            $table->date('joining_date');
            $table->date('end_of_membership_date');
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
        Schema::dropIfExists('members');
    }
};
