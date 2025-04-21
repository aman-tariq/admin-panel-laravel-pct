<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToMenusTable extends Migration
{
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable()->after('type');
            $table->string('label')->nullable()->after('parent_id');
            $table->string('icon')->nullable()->after('label');
            $table->foreign('parent_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn(['parent_id', 'label', 'icon']);
        });
    }
}