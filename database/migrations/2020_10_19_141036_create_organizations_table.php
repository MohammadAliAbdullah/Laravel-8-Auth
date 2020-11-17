<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_code')->nullable();
            $table->string('name');
            $table->string('address');
            $table->integer('telephoe');
            $table->string('email', 100);
            $table->string('website', 100)->nullable();
            $table->string('meto')->nullable();
            $table->string('logo', 100)->nullable();
            $table->date('financial_month');
            $table->year('financial_year');
            $table->date('current_date');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            // ---
            $table->integer('created_by');
            $table->integer('updated_by');
            // ---
            $table->softDeletes();
            $table->unique('name');
            $table->unique('email');
        });
        DB::table('organizations')->insert([
            [
                'name' => 'Akota Enterprise',
                'address' => 'Motalab Plaza, Hatirpool, Dhanmondi, Dhaka',
                'telephoe' => '01849378511',
                'email' => 'akotaentp@gmail.com',
                'website' => 'www.akotaentp.com',
                'financial_month' => '2020-01-01',
                'financial_year' => '2020',
                'current_date' => '2020-01-01',
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
        Schema::dropIfExists('companies');
    }
}
