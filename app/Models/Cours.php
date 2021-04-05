<?php

namespace App\Models;

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
 * @property string $image
 *
 * @property integer|null $auteur_id
 * @property integer|null $classe_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Cours extends BaseModel implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    protected $with = ['auteur','classe','chapitres'];

    #region Validation Rules

    public static function defaultRules() {
        return [
            'intitule' => ['required'],
            'classe_id' => ['required'],
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

    #endregion
}
