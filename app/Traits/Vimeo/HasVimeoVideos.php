<?php

namespace App\Traits\Vimeo;

use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;
use Vimeo\Exceptions\VimeoRequestException;

trait HasVimeoVideos
{
    private function getConfig() {
        return [
            'client_id' => config('app.vimeo_client_id'),
            'client_secret' => config('app.vimeo_client_secret'),
            'access_token' => config('app.vimeo_access_token'),
        ];
    }

    public function uploadVideoToVimeo($name, $description, $file_name) {
        $config = $this->getConfig();

        $lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);

        try {
            // Upload the file and include the video title and description. 536264706 - https://vimeo.com/536264706
            $uri = $lib->upload($file_name, array(
                'name' => $name,
                'description' => $description
            ));

            // TODO: supprimer temporairement from Vimeo

            // Get the metadata response from the upload and log out the Vimeo.com url
            $video_data = $lib->request($uri . '?fields=link');
            //echo '"' . $file_name . ' has been uploaded to ' . $video_data['body']['link'] . "\n";

            $video_link_arr = explode("/", $video_data['body']['link']);

            return [
                'uri' => $uri,
                'link' => $video_data['body']['link'],
                'id' => $video_link_arr[count($video_link_arr) - 1],
            ];

        } catch (VimeoUploadException $e) {
            // We may have had an error. We can't resolve it here necessarily, so report it to the user.
            echo 'Error uploading ' . $file_name . "\n";
            echo 'Server reported: ' . $e->getMessage() . "\n";

            return null;
        } catch (VimeoRequestException $e) {
            echo 'There was an error making the request.' . "\n";
            echo 'Server reported: ' . $e->getMessage() . "\n";

            return null;
        }
    }

    public function updateVideoInfosFromVimeo($uri, $name, $description) {
        $config = $this->getConfig();

        $lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);

        try {

            // Make an API call to edit the title and description of the video.
            $lib->request($uri, array(
                'name' => $name,
                'description' => $description,
            ), 'PATCH');

            return true;

        } catch (VimeoUploadException $e) {
            // We may have had an error. We can't resolve it here necessarily, so report it to the user.
            echo 'Error deleting ' . $uri . "\n";
            echo 'Server reported: ' . $e->getMessage() . "\n";

            return null;
        } catch (VimeoRequestException $e) {
            echo 'There was an error making the request.' . "\n";
            echo 'Server reported: ' . $e->getMessage() . "\n";

            return null;
        }
    }

    public function deleteVideoFromVimeo($uri) {
        $config = $this->getConfig();

        $lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);

        try {

            $lib->request($uri, [], 'DELETE');

            return true;

        } catch (VimeoUploadException $e) {
            // We may have had an error. We can't resolve it here necessarily, so report it to the user.
            echo 'Error deleting ' . $uri . "\n";
            echo 'Server reported: ' . $e->getMessage() . "\n";

            return null;
        } catch (VimeoRequestException $e) {
            echo 'There was an error making the request.' . "\n";
            echo 'Server reported: ' . $e->getMessage() . "\n";

            return null;
        }
    }

    /*public static function bootHasVimeoVideos()
    {
        static::deleting(function ($model) {
            $model->deleteVideoFromVimeo($model->videosession->video_uri);
        });
    }*/
}
