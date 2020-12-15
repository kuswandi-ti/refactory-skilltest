<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->unsignedBigInteger('room_id');
			$table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
			$table->integer('total_person')->default(0);
			$table->dateTime('booking_time');
			$table->text('noted');
			$table->dateTime('check_in_time')->nullable();
			$table->dateTime('check_out_time')->nullable();
            $table->timestamps();
			$table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
        $table->dropForeign('user_id');
        $table->dropIndex('user_id');
        $table->dropColumn('user_id');
        $table->dropForeign('room_id');
        $table->dropIndex('room_id');
        $table->dropColumn('room_id');
    }
}
