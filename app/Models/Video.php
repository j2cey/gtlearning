<?php

namespace App\Models;

use Illuminate\Http\Request;
use App\Traits\File\HasFiles;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Video
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
 *
 * @property integer $duration_secs
 * @property integer $duration_mm
 * @property integer $duration_ss
 * @property string|null $duration_hhmmss
 *
 * @property string|null $remote_link
 * @property string|null $video_id
 * @property string|null $video_uri
 *
 * @property string|null $model_type
 * @property integer|null $model_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Video extends BaseModel implements Auditable
{
    use HasFactory, HasFiles, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    protected $with = ['fileinfos','tempfile','localfile'];

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

    #endregion

    #region Eloquent Relationships

    public function fileinfos() {
        return $this->file()
            ->where('role', "infos_file");
    }

    public function tempfile() {
        return $this->file()
            ->where('role', "temp_file");
    }

    public function localfile() {
        return $this->file()
            ->where('role', "local_file");
    }

    #endregion

    #region Custom Functions

    public function setFileInfos(Request $request, $fieldname_rqst) {
        $fileinfos = $this->verifyAndStoreFile($request,$fieldname_rqst, "infos_file", "temp_files_dir");
        $fileinfos->deleteRawFile();
        return $fileinfos;
    }

    public function setTempFile(Request $request, $fieldname_rqst) {
        return $this->verifyAndStoreFile($request,$fieldname_rqst, "temp_file", "temp_files_dir");
    }

    public function setLocalFile(Request $request, $fieldname_rqst, $directory) {
        return $this->verifyAndStoreFile($request,$fieldname_rqst, "local_file", $directory);
    }

    #endregion

    public static function boot ()
    {
        parent::boot();
        // juste avant suppression
        self::deleting(function($model){
            //On supprime tous les fichiers
            $model->deleteAllFiles();
        });
    }
}
