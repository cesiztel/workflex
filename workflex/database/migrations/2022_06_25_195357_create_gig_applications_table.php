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
        Schema::create('gig_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('gig_id')->constrained('gigs');
            $table->foreignId('shift_id')->constrained('shifts');
            $table->enum('status', ['open', 'allocated', 'rejected'])->default('open');
            $table->timestamp('allocated_at');
            $table->timestamp('rejected_at');
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
        Schema::dropIfExists('gig_applications');
    }
};
