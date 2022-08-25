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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->boolean('current')->default(false);

            $table->date('started_at');
            $table->date('finished_at')->nullable();

            $table->integer('sort')->nullable();

            $table->foreignIdFor(\App\Models\JobTitle::class, 'job_title_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Company::class,'company_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Profile::class,'profile_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
};
