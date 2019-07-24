<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsInUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('address_id')->after('id');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('cell_phone');
            $table->string('sex', 1);
            $table->date('birth_date');

            $table->foreign('address_id')
                ->references('id')
                ->on('addresses')
                ->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['address_id']);
            Schema::dropColumn([
                'cell_phone',
                'sex',
                'birth_date',
                'mother_name',
                'father_name',
                'address_id'
            ]);
        });
    }
}
