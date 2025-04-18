<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('contacts', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Name of the contact
        $table->string('email')->unique(); // Unique email for each contact
        $table->string('phone')->nullable(); // Optional phone number
        $table->text('message')->nullable(); // Optional message field for notes or details
        $table->timestamps(); // For created_at and updated_at
    });
}

public function down()
{
    Schema::dropIfExists('contacts');
}
};
