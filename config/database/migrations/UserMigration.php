<?php
/**
 * Project      tufu
 * @author      Giacomo Barbalinardo <info@ready24it.eu>
 * @copyright   2016
 */

use Illuminate\Database\Schema\Blueprint;
use Tufu\Core\Migration;

class UserMigration extends Migration
{

    public function up()
    {
        $this->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username');
            $table->string('photo')->nullable();
            $table->string('code');
            $table->integer('active')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        $this->drop('users');
    }
}
