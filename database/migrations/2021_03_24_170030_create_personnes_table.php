<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreatePersonnesTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'personnes';
    public $table_comment = 'les personnes du système.';

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

            $table->string('email')->comment('email de la Personne');
            $table->string('nom')->comment('nom de la Personne');
            $table->string('prenom')->nullable()->comment('prenom de la Personne');
            $table->string('sexe')->nullable()->comment('sexe de la Personne');
            //TODO: Gérer les emails et les téléphones
            $table->string('adresse')->nullable()->comment('adresse de la Personne');
            $table->string('telephone')->nullable()->comment('telephone de la Personne');
            $table->string('fonction')->nullable()->comment('fonction de la Personne');
            $table->string('image')->nullable()->comment('url de la photo de la personne');
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
