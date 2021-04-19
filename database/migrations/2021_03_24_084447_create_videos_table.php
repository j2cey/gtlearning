<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateVideosTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'videos';
    public $table_comment = 'videos of the system.';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();
            $table->baseFields();

            $table->string('name')->comment('viedo name');
            $table->string('role')->comment('viedo role');

            $table->integer('duration_secs')->default(0)->comment('video duration (all seconds)');
            $table->integer('duration_mm')->default(0)->comment('video duration (minutes)');
            $table->integer('duration_ss')->default(0)->comment('video duration (seconds)');
            $table->string('duration_hhmmss')->nullable()->comment('video duration (H:i:s.v)');

            $table->string('remote_link')->nullable()->comment('video remote link');
            $table->string('video_id')->nullable()->comment('video id');
            $table->string('video_uri')->nullable()->comment('video uri');

            $table->string('model_type')->nullable()->comment('type of referenced model');
            $table->bigInteger('model_id')->nullable()->comment('model reference');
        });
        $this->setTableComment($this->table_name,$this->table_comment);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table_name, function (Blueprint $table) {
            $table->dropBaseForeigns();
        });
        Schema::dropIfExists($this->table_name);
    }
}
