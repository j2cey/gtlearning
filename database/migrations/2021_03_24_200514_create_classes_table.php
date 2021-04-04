<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateClassesTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'classes';
    public $table_comment = 'les classes du système.';

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

            $table->string('intitule')->comment('intitulé de la classe');
            $table->string('sigle')->comment('sigle de la classe');
            $table->string('description', 500)->nullable()->comment('description de la classe');
            $table->string('image')->nullable()->comment('image de la classe');

            $table->foreignId('niveau_id')->nullable()
                ->comment('reférence du niveau')
                ->constrained('niveaux')->onDelete('set null');
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
            $table->dropForeign(['niveau_id']);
        });
        Schema::dropIfExists($this->table_name);
    }
}
