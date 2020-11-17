<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            // mendatory field
            $table->string('name')->unique();
            $table->string('url');
            $table->string('font_awsome')->nullable();
            $table->integer('parent_id')->default(0);
            $table->tinyInteger('level_no')->default(1);
            $table->tinyInteger('status')->default(1);
            // general field ..
            $table->integer('created_by')->nullable()->default(1)->unsigned();
            $table->integer('updated_by')->nullable()->default(1)->unsigned();
            $table->timestamps();
            $table->integer('branch_id')->default(1)->unsigned();
            $table->integer('organization_id')->default(1)->unsigned();
            $table->softDeletes();
        });

        DB::table('menus')->insert([
            [
                'name' => 'Organization Management',
                'url' => "#",
                'font_awsome' => 'fas fa-globe',
                'parent_id' => 0,
                'level_no' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'Branch Add',
                'url' => "{{ url('/role') }}",
                'font_awsome' => 'fas fa-circle',
                'parent_id' => 1,
                'level_no' => 2,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'Branch Create',
                'url' => "{{ url('/permission') }}",
                'font_awsome' => 'far fa-circle',
                'parent_id' => 1,
                'level_no' => 2,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'Branch Show',
                'url' => "{{ url('/permission') }}",
                'font_awsome' => 'far fa-circle',
                'parent_id' => 1,
                'level_no' => 2,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);
        Link::create([
            'name' => 'Laravel - The PHP framework for web artisans.',
            'url' => 'https://laravel.com/',

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
