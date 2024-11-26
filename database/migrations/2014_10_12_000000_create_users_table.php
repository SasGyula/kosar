<?php

use App\Models\User;
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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('balance');
            $table->boolean('role')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            "name" => "admin",
            "email" => "admin@admin.hu",
            "password" => "admin12345",
            "balance" => 0,
            "role" => 0
        ]);
        User::create([
            "name" => "user",
            "email" => "user@user.hu",
            "password" => "user12345",
            "balance" => 0,
            "role" => 1
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
