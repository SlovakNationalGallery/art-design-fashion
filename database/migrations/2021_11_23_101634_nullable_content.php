<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exhibitions', function (Blueprint $table) {
            $table->text('content')->nullable()->change();
        });
        Schema::table('cabinets', function (Blueprint $table) {
            $table->text('content')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exhibitions', function (Blueprint $table) {
            $table->text('content')->nullable(false)->change();
        });
        Schema::table('cabinets', function (Blueprint $table) {
            $table->text('content')->nullable(false)->change();
        });
    }
}
