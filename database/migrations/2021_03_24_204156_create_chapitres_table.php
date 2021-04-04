<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateChapitresTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'chapitres';
    public $table_comment = 'les chapitres d un cours.';

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

            $table->string('intitule')->comment('intitulé du chapitre');
            $table->string('description', 500)->nullable()->comment('description du chapitre');
            $table->integer('posi')->nullable()->comment('numéro d ordre du chapitre');

            $table->foreignId('cour_id')->nullable()
                ->comment('reférence du cours')
                ->constrained('cours')->onDelete('set null');
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
            $table->dropForeign(['cour_id']);
        });
        Schema::dropIfExists($this->table_name);
    }
}
