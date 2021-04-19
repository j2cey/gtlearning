<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Traits\Video\HasVideos;
use App\Traits\Vimeo\HasVimeoVideos;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Session
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
 * @property string|null $lien_video
 * @property integer|null $id_video
 *
 * @property integer|null $duree_secs
 * @property integer|null $duree_mm
 * @property integer|null $duree_ss
 * @property string|null $duree_hhmmss
 *
 * @property integer|null $chapitre_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Session extends BaseModel implements Auditable
{
    use HasFactory, HasVideos, HasVimeoVideos, \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    protected $with = ['videosession'];

    private static $mimes_types = "mp4,avi,flv,mov,wmv";

    #region Validation Rules

    public static function defaultRules() {
        return [
            'intitule' => ['required'],
            'chapitre_id' => ['required'],
            'description' => ['required'],
        ];
    }
    public static function createRules() {
        return array_merge(self::defaultRules(), [
            'video_file' => [
                'required','file','max:'. self::getVideoUploadMaxSize("ko"),
                'mimes:' . self::$mimes_types,
            ],
        ]);
    }
    public static function updateRules($model) {
        return array_merge(self::defaultRules(), [
            'video_file' => [
                'sometimes',
                'required','file','max:'. self::getVideoUploadMaxSize("ko"),
                'mimes:' . self::$mimes_types,
            ],
        ]);
    }

    public static function messagesRules() {
        return [
            'intitule.required' => 'Prière de renseigner l intitule',
            'chapitre_id.required' => 'Prière de séléctionner un chapitre',
            'description.required' => 'La description est obligatoire',

            'video_file.required' => 'Prière de télécharger une vidéo pour la Session',
            'video_file.file' => 'La vidéo de la session doit etre un fichier valide',
            'video_file.max' => 'La taille de la vidéo doit etre de ' . self::getVideoUploadMaxSize("Mo") .' Mo max',
            'video_file.mimes' => 'La vidéo doit etre au format mp4,avi,flv,mov ou wmv',
        ];
    }

    #endregion

    #region Eloquent Relationships

    public function chapitre() {
        return $this->belongsTo(Chapitre::class, 'chapitre_id');
    }

    public function videosession() {
        return $this->video()
            ->where('role', "video_session");
    }

    #endregion

    #region Custom Functions

    public function setChapitre($id) {
        $chapitre = Chapitre::where('id', $id)->first();
        if ($chapitre) {
            $this->chapitre()->associate($chapitre);
            $this->save();

            return 1;
        } else {
            return -1;
        }
    }

    public function createVimeoVideo(Request $request) {
        $video_session = $this->createNewVideo($request->intitule, "video_session", $request, 'video_file', null, true);
        $file_name = $video_session->tempfile->relativepath;

        $video_data = $this->uploadVideoToVimeo($request->intitule, $request->description,$file_name);

        $video_session->remote_link = $video_data['link'];
        $video_session->video_id = $video_data['id'];
        $video_session->video_uri = $video_data['uri'];
        $video_session->save();
    }

    public function updateVimeoVideo(Request $request) {
        $this->deleteVideoFromVimeo($this->videosession->video_uri);
        $this->deleteAllVideos();

        $this->createVimeoVideo($request);
    }

    #endregion

    public static function boot ()
    {
        parent::boot();

        // juste avant suppression
        self::deleting(function($model){
            $model->deleteVideoFromVimeo($model->videosession->video_uri);
            $model->deleteAllVideos();
        });
    }
}
