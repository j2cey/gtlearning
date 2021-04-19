<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateNotesTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'notes';
    public $table_comment = 'les notes du système.';

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

            $table->integer('email')->comment('email de la Personne');
            $table->string('nom')->comment('nom de la Personne');
            $table->string('prenom')->nullable()->comment('prenom de la Personne');
            $table->string('sexe')->nullable()->comment('sexe de la Personne');
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
