<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            // Ideally, there probably should be a modified_at field just for the summarized review text.

            // The summarized review is a version of the original review that a site admin hypothetically modified/edited for length
            $table->longText('summarized_review')->nullable();


            // This would allow an admin and/or a reviewer to redact the review w/o actually deleting it from the db
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
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('summarized_review');
        });
    }
}
