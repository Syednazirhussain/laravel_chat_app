<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chat_messages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('friend_id')->nullable()->index('friend_id');
			$table->integer('from_user')->unsigned()->nullable()->index('from_user');
			$table->integer('to_user')->unsigned()->nullable()->index('to_user');
			$table->binary('text')->nullable();
			$table->enum('status', array('read','delivered','pending','deleted'));
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chat_messages');
	}

}
