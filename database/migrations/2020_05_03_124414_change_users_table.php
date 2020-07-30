<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->nullable()->default(NULL)->change();
            $table->string('phone', 100)->nullable()->default(NULL);
            $table->string('state', 100)->nullable()->default(NULL)->comment('город');
            $table->string('street', 100)->nullable()->default(NULL)->comment('улица');
            $table->string('house', 50)->nullable()->default(NULL)->comment('номер дома');
            $table->string('flat', 50)->nullable()->default(NULL)->comment('номер квартиры');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('state');
            $table->dropColumn('street');
            $table->dropColumn('house');
            $table->dropColumn('flat');
        });
    }
}
