<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('todos', function (Blueprint $table) {
			$table->id();
			$table->softDeletes();
			$table->integer('usersQid')->nullable(false);
			$table->string('title');
			$table->timestamps();
			$table->integer('is_complated')->nullable(false)->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('todos');
	}
};
