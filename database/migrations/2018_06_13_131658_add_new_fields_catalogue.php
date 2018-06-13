<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsCatalogue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::table('catalogues_list', function(Blueprint $table)
		{
			// add 'title', 'description', 'isbn', 'icon'
			$table->string('title')->nullable()->after('id');
			$table->string('description')->nullable()->after('title');
			$table->string('isbn')->nullable()->after('description');
			$table->string('icon')->nullable()->after('isbn');

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::table('users', function(Blueprint $table)
		{
			// delete above columns
			$table->dropColumn(array('title', 'description', 'isbn', 'icon'));
		});
    }
}
