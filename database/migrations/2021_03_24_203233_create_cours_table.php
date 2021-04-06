<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateCoursTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'cours';
    public $table_comment = 'les cours du système.';

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
            $table->string('description', 500)->nullable()->comment('description de la classe');
            $table->string('image')->nullable()->comment('image de la classe');
            $table->string('image_type')->nullable()->comment('type du fichier image');
            $table->integer('image_size')->nullable()->comment('taille du fichier image');

            $table->foreignId('auteur_id')->nullable()
                ->comment('reférence de l auteur')
                ->constrained('auteurs')->onDelete('set null');

            //TODO: un cours peut appartenir à plusieurs classes
            $table->foreignId('classe_id')->nullable()
                ->comment('reférence de la classe')
                ->constrained('classes')->onDelete('set null');
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
            $table->dropForeign(['auteur_id']);
            $table->dropForeign(['classe_id']);
        });
        Schema::dropIfExists($this->table_name);
    }
}
