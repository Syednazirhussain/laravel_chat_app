<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChatMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('chat_messages', function(Blueprint $table)
		{
			$table->foreign('friend_id', 'chat_messages_ibfk_1')->references('id')->on('friends')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('from_user', 'chat_messages_ibfk_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('to_user', 'chat_messages_ibfk_3')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('chat_messages', function(Blueprint $table)
		{
			$table->dropForeign('chat_messages_ibfk_1');
			$table->dropForeign('chat_messages_ibfk_2');
			$table->dropForeign('chat_messages_ibfk_3');
		});
	}

}
