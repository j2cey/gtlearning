<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateAuteursTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'auteurs';
    public $table_comment = 'les auteurs du système.';

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

            $table->string('resume', 500)->nullable()->comment('Infos résumées (parcours) sur l auteur');
            $table->foreignId('personne_id')->nullable()
                ->comment('reférence de la personne')
                ->constrained('personnes')->onDelete('set null');

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
            $table->dropForeign(['personne_id']);
        });
        Schema::dropIfExists($this->table_name);
    }
}
