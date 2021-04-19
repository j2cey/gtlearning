<?php

namespace App\Models;

use Illuminate\Http\Request;
use App\Traits\File\HasFiles;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Auteur
 * @package App\Models
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 *
 * @property string $resume
 * @property integer $personne_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Auteur extends BaseModel implements Auditable
{
    use HasFactory, HasFiles, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    protected $with = ['personne'];

    protected $appends = ['nomComplet','email','nom','prenom','telephone','fonction','imageauteur','imageauteurPath'];

    private static $mimes_types = "jpeg,png,bmp,gif,svg";

    #region Validation Rules

    public static function defaultRules() {
        return [
            'email' => [
                'required',
                'email:rfc,dns'
            ],
            'nom' => ['required'],
            'fonction' => ['required'],
            'resume' => ['required'],
            'imagecours_file' => [
                'sometimes',
                'required','file','max:'. self::getImageUploadMaxSize("ko"),
                'mimes:' . self::$mimes_types,
            ],
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
            'email.required' => 'Prière de renseigner l email',
            'email.email' => 'L adresse email doit etre une adresse valide',
            'nom.required' => 'Prière de renseigner le nom',
            'fonction.required' => 'Prière de renseigner la fonction',
            'resume.required' => 'Le résumé est obligatoire',

            'imageauteur_file.required' => 'Prière de télécharger une image pour l auteur',
            'imageauteur_file.file' => 'L image de l auteur doit etre un fichier valide',
            'imageauteur_file.max' => 'La taille de l image de l auteur doit etre de ' . self::getImageUploadMaxSize("Mo") .' Mo max',
            'imageauteur_file.mimes' => 'L image de l auteur doit etre au format jpeg,png,bmp,gif ou svg',
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
        return $this->personne->nomComplet;
    }

    public function getEmailAttribute()
    {
        return $this->personne->email;
    }

    public function getNomAttribute()
    {
        return $this->personne->nom;
    }

    public function getPrenomAttribute()
    {
        return $this->personne->prenom;
    }

    public function getTelephoneAttribute()
    {
        return $this->personne->telephone;
    }

    public function getFonctionAttribute()
    {
        return $this->personne->fonction;
    }

    public function getImageauteurAttribute()
    {
        return $this->personne->imagepersonne;
    }

    public function getImageauteurPathAttribute()
    {
        if ($this->personne->imagepersonne) {
            return $this->personne->imagepersonne->fullpath;
        } else {
            $separator = "/";
            return asset( config("app.auteurs_files_dir") . $separator . "auteur_default.jpg");
        }
    }

    #endregion

    #region Eloquent Relationships

    public function personne() {
        return $this->belongsTo(Personne::class, 'personne_id');
    }

    public function cours() {
        return $this->hasMany(Cours::class, 'auteur_id');
    }

    #endregion

    #region Scopes

    public function scopeSearch($query, $q) {
        if ($q == null) return $query;

        $personnes = Personne::search($q)->get()->pluck('id')->toArray();

        return $query
            ->where('resume', 'LIKE', "%{$q}%")
            ->orWhereIn('personne_id', $personnes)
            ;
    }

    #endregion

    #region Custom Functions

    public function setImageauteur( Request $request, $fieldname_rqst, File $curr_file = null ) {
        return $this->personne->setImagepersonne($request, $fieldname_rqst, $curr_file);
    }

    #endregion

    protected static function boot() {
        parent::boot();

        /*static::deleting(function($model) {
            if ($model->cours()->count() > 0)
            {
                throw new Exception("Cet Auteur a des Cours");
                return response()->json(['errors' => 'Cet Auteur a des Cours'], 422);
            }
        });*/
    }
}
