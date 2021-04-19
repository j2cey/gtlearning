<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateSessionsTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'sessions';
    public $table_comment = 'les sessions d un  chapitre de cours.';

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

            $table->string('intitule')->comment('intitulé de la session');
            $table->integer('posi')->nullable()->comment('numéro d ordre de la session');
            $table->string('description', 500)->nullable()->comment('description du chapitre');

            $table->foreignId('chapitre_id')->nullable()
                ->comment('reférence du chapitre')
                ->constrained('chapitres')->onDelete('set null');
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
            $table->dropForeign(['chapitre_id']);
        });
        Schema::dropIfExists($this->table_name);
    }
}
