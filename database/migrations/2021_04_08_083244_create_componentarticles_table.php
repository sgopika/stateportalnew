<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentarticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componentarticles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('iconclass',50);
            $table->string('entooltip',50);
            $table->string('maltooltip',50);
            $table->string('entitle',50);
            $table->string('maltitle',50);
            $table->string('ensubtitle',100);
            $table->string('malsubtitle',250);
            $table->text('encontent',50);
            $table->text('malcontent',50);
            $table->boolean('components_id');
            $table->tinyInteger('homepagestatus')->default('0');
            $table->text('maplinks',100)->nullable();
            $table->integer('contributor_status')->default('0');
            $table->integer('contributor_userid');
            $table->timestamp('contributor_timestamp')->nullable();
            $table->text('moderator_remarks',250);
            $table->integer('moderator_status')->default('0');
            $table->integer('moderator_userid');
            $table->timestamp('moderator_timestamp')->nullable();
            $table->text('approve_remarks',250);
            $table->integer('approve_status')->default('0');
            $table->integer('approve_userid');
            $table->timestamp('approve_timestamp')->nullable();
            $table->Integer('lock_status')->default('0');
            $table->boolean('status')->default('1');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('componentarticles');
    }
}
