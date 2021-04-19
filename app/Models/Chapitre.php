<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Chapitre
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
 * @property integer $posi
 *
 * @property integer|null $cour_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Chapitre extends BaseModel implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    protected $with = ['sessions'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['duree'];

    #region Validation Rules

    public static function defaultRules() {
        return [
            'intitule' => ['required'],
            'cour_id' => ['required'],
            'description' => ['required'],
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
            'intitule.required' => 'Prière de renseigner l intitule',
            'cour_id.required' => 'Prière de séléctionner le cours',
            'description.required' => 'La description est obligatoire',
        ];
    }

    #endregion

    #region Accessors

    public function getDureeAttribute() {

        //$secs = $this->sessions->sum('duree_secs');
        $secs = 0;

        foreach ($this->sessions as $session) {
            $secs += $session->videosession->duration_secs;
        }

        $ss = floor($secs % 60);
        $mm = floor($secs / 60);

        return "{$mm}:{$ss}";
    }

    #endregion

    #region Eloquent Relationships

    public function cours() {
        return $this->belongsTo(Cours::class, 'cour_id');
    }

    public function sessions() {
        return $this->hasMany(Session::class, 'chapitre_id');
    }

    #endregion

    #region Custom Functions

    public function setCours($id) {
        $cours = Cours::where('id', $id)->first();
        if ($cours) {
            $this->cours()->associate($cours);
            $this->save();

            return 1;
        } else {
            return -1;
        }
    }

    #endregion

    public static function boot ()
    {
        parent::boot();

        // juste avant suppression
        self::deleting(function($model){
            //On supprime toutes les sessions
            $model->sessions()->get(['id'])->each->delete();
        });
    }
}
