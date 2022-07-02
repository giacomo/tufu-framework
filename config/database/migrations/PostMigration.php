<?php
/**
 * Project      tufu
 * @author      Giacomo Barbalinardo <info@ready24it.eu>
 * @copyright   2016
 */

use Illuminate\Database\Schema\Blueprint;
use Tufu\Core\Migration;

class PostMigration extends Migration
{

    public function up()
    {
        $this->create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        $this->drop('posts');
    }
}
