<?php

namespace App\Models;

use App\Traits\File\HasFiles;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Niveau
 * @package App\Models
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 *
 * @property string $intitule
 * @property string $level
 * @property string $description
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Niveau extends BaseModel implements Auditable
{
    use HasFactory, HasFiles, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    protected $with = ['imageniveau'];

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

    public function classes() {
        return $this->hasMany(Classe::class, 'niveau_id');
    }

    public function imageniveau() {
        return $this->file()
            ->where('role', "image_niveau");
    }

    #endregion

    public static function boot ()
    {
        parent::boot();

        // juste avant suppression
        self::deleting(function($model){
            //On supprime toutes les classes
            $model->classes()->get(['id'])->each->delete();
        });
    }
}
