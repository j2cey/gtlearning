<?php

namespace App\Models;

use App\Traits\File\HasFiles;
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
 *
 * @property integer|null $niveau_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Classe extends BaseModel implements Auditable
{
    use HasFactory, HasFiles, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    protected $with = ['imageclasse'];

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

    public function imageclasse() {
        return $this->file()
            ->where('role', "image_classe");
    }

    #endregion

    public static function boot ()
    {
        parent::boot();

        // juste avant suppression
        self::deleting(function($model){
            //On supprime tous les cours
            $model->cours()->get(['id'])->each->delete();
        });
    }
}
