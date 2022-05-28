<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->string('path');
            $table->boolean('uploaded')->default(false);
            $table->boolean('processed')->default(false);
            $table->boolean('failed')->default(false);
            $table->text('failure_reason')->nullable();
            $table->boolean('requested_for_export')->default(false);
            $table->text('export_html_result')->nullable();
            $table->boolean('approved')->default(false);
            $table->double('grade', 8, 2)->nullable();
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
        Schema::dropIfExists('files');
    }
}
