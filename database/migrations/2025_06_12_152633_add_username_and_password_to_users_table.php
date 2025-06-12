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
    Schema::table('users', function (Blueprint $table) {
        // Remove or comment out this line if the column already exists
        // $table->string('username')->unique()->after('id');

        // Only add password if not present
        if (!Schema::hasColumn('users', 'password')) {
            $table->string('password')->after('email');
        }
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        // $table->dropColumn('username');
        $table->dropColumn('password');
    });
}


};
