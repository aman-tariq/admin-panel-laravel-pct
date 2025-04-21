<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAccountCareersTable extends Migration
{
    public function up()
    {
        Schema::create('admin_account_careers', function (Blueprint $table) {
            $table->id();  // Auto-increment primary key
            $table->string('name');  // Name column (VARCHAR)
            $table->string('email')->unique();  // Email column (unique to prevent duplicates)
            $table->string('phone')->nullable();  // Phone column (nullable)
            $table->text('experience')->nullable();  // Experience column (TEXT for longer content, nullable)
            $table->text('skills')->nullable();  // Skills column (TEXT, nullable)
            $table->text('message')->nullable();  // Message column (TEXT, nullable)
            $table->timestamps();  // Created at and updated at columns automatically managed by Laravel
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_account_careers');
    }
}

