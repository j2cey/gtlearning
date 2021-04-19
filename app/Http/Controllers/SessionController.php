<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Requests\Session\CreateSessionRequest;
use App\Http\Requests\Session\UpdateSessionRequest;

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
     * @param CreateSessionRequest $request
     * @return Session
     */
    public function store(CreateSessionRequest $request)
    {
        $new_session = new Session();
        $new_session->intitule = $request->intitule;
        $new_session->description = $request->description;
        $new_session->save();

        $new_session->createVimeoVideo($request);

        $new_session->setChapitre($request->chapitre_id);

        return $new_session->load('videosession');
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
     * @param UpdateSessionRequest $request
     * @param \App\Models\Session $session
     * @return Session
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        $session->intitule = $request->intitule;
        $session->description = $request->description;

        if( $request->hasFile('video_file') ) {
            $session->updateVimeoVideo($request);
        } else {
            $session->updateVideoInfosFromVimeo($session->videosession->video_uri,$request->intitule,$request->description);
        }

        $session->save();

        return $session->load('videosession');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        $session->delete();

        return response()->json(['status' => 'ok'], 200);
    }
}
