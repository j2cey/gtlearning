<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Classe
 * @package App\Models
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 *
 * @property string $intitule
 * @property string $sigle
 * @property string $description
 * @property string $image
 *
 * @property integer|null $niveau_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Classe extends BaseModel implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    #region Validation Rules

    public static function defaultRules() {
        return [
            'intitule' => ['required'],
            'level' => ['required'],
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

    public function niveau() {
        return $this->belongsTo(Niveau::class, 'niveau_id');
    }

    public function cours() {
        return $this->hasMany(Cours::class, 'classe_id');
    }

    #endregion
}
