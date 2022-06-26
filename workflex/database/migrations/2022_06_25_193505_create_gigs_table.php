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
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('gig_category_id')->constrained('gig_categories');
            $table->longText('description');
            $table->json('languages_requirements')->nullable();
            $table->json('skills_requirements')->nullable();
            $table->json('etiquette_requirements')->nullable();
            $table->enum('status', ['draft', 'publish', 'allocated', 'done', 'closed'])->default('draft');
            $table->timestamp('allocated_at')->nullable();
            $table->timestamp('closed_at')->nullable();
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
        Schema::dropIfExists('gigs');
    }
};
