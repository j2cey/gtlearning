<?php

namespace App\Models;

use Illuminate\Http\Request;
use App\Traits\File\HasFiles;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cours
 * @package App\Models
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 *
 * @property string $intitule
 * @property string $description
 *
 * @property integer|null $auteur_id
 * @property integer|null $classe_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Cours extends BaseModel implements Auditable
{
    use HasFactory, HasFiles, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    protected $with = ['auteur','classe','chapitres','imagecours'];

    private static $mimes_types = "jpeg,png,bmp,gif,svg";

    #region Validation Rules

    public static function defaultRules() {
        return [
            'intitule' => ['required'],
            'auteur' => ['required'],
            'classe' => ['required'],
            'description' => ['required'],
        ];
    }
    public static function createRules() {
        return array_merge(self::defaultRules(), [
            'imagecours_file' => [
                'required','file','max:'. self::getImageUploadMaxSize("ko"),
                'mimes:' . self::$mimes_types,
            ],
        ]);
    }
    public static function updateRules($model) {
        return array_merge(self::defaultRules(), [
            'imagecours_file' => [
                'sometimes',
                'required','file','max:'. self::getImageUploadMaxSize("ko"),
                'mimes:' . self::$mimes_types,
            ],
        ]);
    }

    public static function messagesRules() {
        return [
            'intitule.required' => 'Prière de renseigner l intitule',
            'auteur.required' => 'Prière de séléctionner un auteur',
            'classe.required' => 'Prière de séléctionner la classe',
            'description.required' => 'La description est obligatoire',

            'imagecours_file.required' => 'Prière de télécharger une image pour le cours',
            'imagecours_file.file' => 'L image du cours doit etre un fichier valide',
            'imagecours_file.max' => 'La taille de l image du cours doit etre de ' . self::getImageUploadMaxSize("Mo") .' Mo max',
            'imagecours_file.mimes' => 'L image du cours doit etre au format jpeg,png,bmp,gif ou svg',
        ];
    }

    #endregion

    #region Eloquent Relationships

    public function auteur() {
        return $this->belongsTo(Auteur::class, 'auteur_id');
    }

    public function classe() {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function chapitres() {
        return $this->hasMany(Chapitre::class, 'cour_id');
    }

    public function imagecours() {
        return $this->file()
            ->where('role', "image_cours");
    }

    #endregion

    #region Accessors

    public function getImagePathAttribute() {
        return asset( config('app.cours_files_dir') . '/' . $this->image);
    }

    #endregion

    #region Scopes

    public function scopeSearch($query, $q) {
        if ($q == null) return $query;

        return $query
            ->where('intitule', 'LIKE', "%{$q}%")
            ->orWhere('description', 'LIKE', "%{$q}%")
            ;
    }

    #endregion

    #region Custom Functions

    public function setAuteur($id) {
        $auteur = Auteur::where('id', $id)->first();
        if ($auteur) {
            $this->auteur()->associate($auteur);
            $this->save();

            return 1;
        } else {
            return -1;
        }
    }

    public function setClasse($id) {
        $classe = Classe::where('id', $id)->first();
        if ($classe) {
            $this->classe()->associate($classe);
            $this->save();

            return 1;
        } else {
            return -1;
        }
    }

    public function setImagecours( Request $request, $fieldname_rqst, File $curr_file = null ) {
        return $this->verifyAndStoreFile($request, $fieldname_rqst, "image_cours", "cours_files_dir", $curr_file = null );
    }

    #endregion

    public static function boot ()
    {
        parent::boot();

        // juste avant suppression
        self::deleting(function($model){
            //On supprime tous les chapitres
            $model->chapitres()->get(['id'])->each->delete();
        });
    }
}
