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

    #region Validation Rules

    public static function defaultRules() {
        return [
            'intitule' => ['required'],
            'cour_id' => ['required'],
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

    public function cours() {
        return $this->belongsTo(Cours::class, 'cour_id');
    }

    public function sessions() {
        return $this->hasMany(Session::class, 'chapitre_id');
    }

    #endregion
}
