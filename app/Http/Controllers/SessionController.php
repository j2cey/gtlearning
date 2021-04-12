<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;
use Vimeo\Exceptions\VimeoRequestException;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getById($id) {
        $session = Session::where('id', $id)->first();
        return $session;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $config = [
            'client_id' => config('app.vimeo_client_id'),
            'client_secret' => config('app.vimeo_client_secret'),
            'access_token' => config('app.vimeo_access_token'),
        ];
        $lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);

        $temp_file_dir = config('app.temp_files_dir');

        $video_file = $request->file('video_file');

        $file_name = md5('temp_files_dir_' . time()) . '.' . $video_file->getClientOriginalExtension();

        // Move image to folder
        $video_file->move($temp_file_dir, $file_name);

        $file_name = $temp_file_dir . '/' . $file_name;

        try {
            // Upload the file and include the video title and description.
            $uri = $lib->upload($file_name, array(
                'name' => $request->intitule,
                'description' => "This video was uploaded through the Vimeo API's PHP SDK."
            ));

            // Get the metadata response from the upload and log out the Vimeo.com url
            $video_data = $lib->request($uri . '?fields=link');
            echo '"' . $file_name . ' has been uploaded to ' . $video_data['body']['link'] . "\n";

            $new_session = new Session();
            $new_session->intitule = $request->intitule;
            $new_session->description = $request->description;
            $new_session->lien = $video_data['body']['link'];
            $new_session->save();

            $new_session->setChapitre($request->cour_id);

            dd($video_data,$uri);

            return $new_session;

            // Make an API call to edit the title and description of the video.
            $lib->request($uri, array(
                'name' => 'Vimeo API SDK test edit',
                'description' => "This video was edited through the Vimeo API's PHP SDK.",
            ), 'PATCH');

            echo 'The title and description for ' . $uri . ' has been edited.' . "\n";

            // Make an API call to see if the video is finished transcoding.
            $video_data = $lib->request($uri . '?fields=transcode.status');
            echo 'The transcode status for ' . $uri . ' is: ' . $video_data['body']['transcode']['status'] . "\n";
        } catch (VimeoUploadException $e) {
            // We may have had an error. We can't resolve it here necessarily, so report it to the user.
            echo 'Error uploading ' . $file_name . "\n";
            echo 'Server reported: ' . $e->getMessage() . "\n";
        } catch (VimeoRequestException $e) {
            echo 'There was an error making the request.' . "\n";
            echo 'Server reported: ' . $e->getMessage() . "\n";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}
