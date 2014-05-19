<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirstTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
		
		$table->increments('id');
		
		$table->string('firstname', 20);
		
		$table->string('lastname', 20);
		
		$table->string('email', 100)->unique();
		
		$table->string('password', 64);
		
		$table->timestamps();
		
		});
		
		Schema::create('sections', function($table) {
		
		$table->increments('id');
		
		$table->integer('user_id')->unsigned();
		
		$table->string('title', 60);
		
		$table->text('content', 20);
		
		$table->string('caller', 20)->unique();
		
		$table->timestamps();
		
		$table->foreign('user_id')->references('id')->on('users');
		
		});
		
		Schema::create('orderlists', function($table) {
		
		$table->increments('id');
		
		$table->integer('inventory_id')->unsigned();
		
		$table->integer('order_id')->unsigned();
		});
		
		Schema::create('orders', function($table) {
		
		$table->increments('id');
		
		$table->integer('user_id_checker')->unsigned();
		
		$table->binary('checked');
		
		$table->string('firstname', 30);
		
		$table->string('lastname', 30);
		
		$table->string('email', 60);
		
		$table->integer('orderlist_id')->unsigned();
		
		$table->timestamps();
		});
		
		Schema::create('inventory', function($table) {
		
		$table->increments('id');
		
		$table->string('title', 60);
		
		$table->text('description');
		
		$table->float('price');
		
		$table->integer('avaible');
		
		$table->timestamps();
		});
		
		Schema::table('orderlists', function($table)
		{
		$table->foreign('inventory_id')->references('id')->on('inventory');
		
		$table->foreign('order_id')->references('id')->on('orders');
		});
		
		Schema::table('orders', function($table)
		{
		$table->foreign('user_id_checker')->references('id')->on('users');
		
		$table->foreign('orderlist_id')->references('id')->on('orderlists');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sections');
		Schema::drop('users');
		Schema::drop('orderlists');
		Schema::drop('orders');
		Schema::drop('inventory');
	}

}
