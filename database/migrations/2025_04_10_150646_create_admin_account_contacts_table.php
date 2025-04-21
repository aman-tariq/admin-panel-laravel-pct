<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAccountContactsTable extends Migration
{
    public function up()
    {
        Schema::create('admin_account_contacts', function (Blueprint $table) {
            $table->id();  
            $table->string('name');  
            $table->string('email')->unique();  // Email column (unique for uniqueness)
            $table->string('phone')->nullable();  // Phone column, nullable
            $table->text('message');  // Message column (TEXT for longer content)
            $table->timestamps();  // Created at and updated at columns automatically managed by Laravel
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_account_contacts');
    }
}
