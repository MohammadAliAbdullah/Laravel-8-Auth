<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_code')->nullable();
            $table->string('name');
            $table->integer('branch_type_id')->unsigned();
            $table->foreign('branch_type_id')->references('id')->on('branch_types')->onDelete('cascade');
            $table->integer('parent_code');
            $table->string('address')->nullable();
            $table->integer('telephoe')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->date('branch_start');
            $table->date('branch_end')->nullable();
            $table->integer('area_code')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            // ---
            $table->integer('created_by')->nullable()->default(1)->unsigned();
            $table->integer('updated_by')->nullable()->default(1)->unsigned();
            $table->integer('organization_id')->unsigned();
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->unique('name');
            $table->unique('email');
        });
        DB::table('branches')->insert([
            [
                'name' => 'Akota Enterprise',
                'branch_type_id' => '1',
                'parent_code' => '1',
                'address' => 'Motalab Plaza, Hatirpool, Dhanmondi, Dhaka',
                'telephoe' => '01849378511',
                'email' => 'akotaentp@gmail.com',
                'website' => 'www.akotaentp.com',
                'branch_start' => '2020-01-01',
                'organization_id' => '1',
                'created_by' => 1,
                'updated_by' => 1,
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
        Schema::dropIfExists('branches');
    }
}
