<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('nickname')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthdate')->format('d.m.Y')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('sugar_daddy')->nullable();
            $table->boolean('sugar_mommy')->nullable();
            $table->boolean('submissive')->nullable();
            $table->boolean('bondage')->nullable();
            $table->boolean('cuckold')->nullable();
            $table->boolean('podolatry')->nullable();
            $table->boolean('thresome')->nullable();
            $table->string('avatar')->nullable();
            $table->json('gallery')->nullable();
            $table->dateTime('last_activity')->nullable();
            $table->text('description')->nullable();
            $table->integer('highlight')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->text('message')->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('visible')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
