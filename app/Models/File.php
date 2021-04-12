<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class File
 * @package App\Models
 *
 * @property integer $id
 *
 * @property string $uuid
 * @property bool $is_default
 * @property string|null $tags
 *
 * @property string $name
 * @property string $role
 * @property string|null $type
 * @property integer|null $size
 * @property string|null $extension
 * @property string|null $config_dir
 *
 * @property string|null $model_type
 * @property integer|null $model_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class File extends BaseModel implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['fullpath'];

    #region Validation Rules

    public static function defaultRules() {
        return [
            'name' => ['required'],
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

    public function getFullpathAttribute() {
        $separator = "/";
        return asset( config("app." . $this->config_dir) . $separator . $this->name);
    }

    #endregion

    #region Eloquent Relationships

    #endregion
}
