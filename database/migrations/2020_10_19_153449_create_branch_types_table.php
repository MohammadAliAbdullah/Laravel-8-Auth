<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->integer('created_by')->nullable()->default(1)->unsigned();
            $table->integer('updated_by')->nullable()->default(1)->unsigned();
            $table->softDeletes();
        });
        DB::table('branch_types')->insert([
            [
                'name' => 'head_office',
                'description' => 'Head Office',
            ],
            [
                'name' => 'branch_office',
                'description' => 'Branch Office',
            ],
            [
                'name' => 'project_office',
                'description' => 'Project Office',
            ],
            [
                'name' => 'wear_house',
                'description' => 'Wear Office',
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_types');
        $table->dropForeign('gigs_band_id_foreign');
        $table->dropForeign('gigs_stage_id_foreign');
    }
}
