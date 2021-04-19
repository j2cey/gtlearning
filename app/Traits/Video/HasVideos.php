<?php

namespace App\Traits\Video;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Traits\File\HasFiles;

trait HasVideos
{
    use HasFiles;

    public function videos() {
        $elem_type = get_called_class();
        return $this->hasMany(Video::class, 'model_id', 'id')
            ->where('model_type', $elem_type)
            ;
    }

    public function video() {
        $elem_type = get_called_class();
        return $this->hasOne(Video::class, 'model_id', 'id')
            ->where('model_type', $elem_type)->oldest()
            ;
    }

    public function deleteAllVideos() {
        //$this->videos()->get(['id'])->each->delete();
        foreach ($this->videos as $video) {
            $video->delete();
        }
    }

    public static function bootHasVideos()
    {
        static::deleting(function ($model) {
            $model->deleteAllVideos();
        });
    }

    public function setVideoDuration($video, $full_video_path)
    {
        $getID3 = new \getID3;
        $file = $getID3->analyze($full_video_path);
        $playtime_seconds = $file['playtime_seconds'];

        $video->update([
            'duration_secs' => $playtime_seconds,
            'duration_mm' => floor($playtime_seconds / 60),
            'duration_ss' => floor($playtime_seconds % 60),
            'duration_hhmmss' => date('H:i:s.v', $playtime_seconds)
        ]);
    }

    /**
     * @param $name
     * @param $role
     * @param Request|null $request
     * @param null $fieldname_rqst
     * @param null $directory
     * @param bool $set_temp_file
     * @return Video
     */
    public function createNewVideo($name, $role, Request $request = null, $fieldname_rqst = null, $directory = null, $set_temp_file = false) {
        $elem_type = get_called_class();
        $video = Video::create([
            'name' => $name,
            'role' => $role,
            'model_type' => $elem_type,
            'model_id' => $this->id
        ]);

        if (!is_null($request) && !is_null($fieldname_rqst)) {
            //$video->setFileInfos($request, $fieldname_rqst);

            $file_temped = false;
            // set and store local file
            if (!is_null($directory)) {
                $file = $video->setLocalFile($request, $fieldname_rqst, $directory);
            } else {
                // set temp file
                $file_temped = true;
                $file = $video->setTempFile($request, $fieldname_rqst);
            }

            // set file infos
            $file_infos = $video->createFileInfos($file->name, "infos_file", config('app.' . $file->config_dir) . '/' . $file->name);

            $this->setVideoDuration($video, config('app.' . $file->config_dir) . '/' . $file->name);
            if (! $set_temp_file && $file_temped) {
                $file->delete();
            }
        }

        return $video;
    }
}
