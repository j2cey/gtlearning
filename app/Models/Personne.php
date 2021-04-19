<?php

namespace App\Models;

use Illuminate\Http\Request;
use App\Traits\File\HasFiles;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Personne
 * @package App\Models
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 *
 * @property string $email
 * @property string $nom
 * @property string $prenom
 * @property string $sexe
 * @property string $adresse
 * @property string $telephone
 * @property string $fonction
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Personne extends BaseModel implements Auditable
{
    use HasFactory, HasFiles, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    #region Validation Rules

    public static function defaultRules() {
        return [
            'email' => ['required'],
            'nom' => ['required'],
        ];
    }
    public static function createRules() {
        return array_merge(self::defaultRules(), [

        ]);
    }
    public static function updateRules($model) {
        return array_merge(self::defaultRules(), [

        ]);
    }

    public static function messagesRules() {
        return [

        ];
    }

    #endregion

    #region Accessors

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getNomCompletAttribute()
    {
        return ucwords($this->nom) . " " . ucwords($this->prenom);
    }

    #endregion

    #region Eloquent Relationships

    public function imagepersonne() {
        return $this->file()
            ->where('role', "image_personne");
    }

    #endregion

    #region Scopes

    public function scopeSearch($query, $q) {
        if ($q == null) return $query;

        return $query
            ->where('nom', 'LIKE', "%{$q}%")
            ->orWhere('prenom', 'LIKE', "%{$q}%")
            ;
    }

    #endregion

    #region Custom Functions

    public function setImagepersonne( Request $request, $fieldname_rqst, File $curr_file = null ) {
        return $this->verifyAndStoreFile($request, $fieldname_rqst, "image_personne", "personnes_files_dir", $curr_file = null );
    }

    #endregion
}
