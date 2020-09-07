<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;
use App\Repository\SongRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Session;

class SongController extends Controller
{
    private $song;

    public function __construct(SongRepositoryInterface $song)
    {
        $this->song = $song;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('song.list', ['data' => $this->song->listAllSong()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('song.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'lyrics' => 'required',
        ]);
        
        $this->song->saveSong($request->all());

        Session::flash('message', 'New song added');
        return redirect('/song');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        return view('song.update', ['data' => $this->song->findSong($song->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'lyrics' => 'required',
        ]);
        
        $this->song->updateSong($request->all(), $song->id);

        Session::flash('message', 'Song updated');
        return redirect('/song');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $this->song->deleteSong($song->id);

        Session::flash('message', 'Deleted succesfully!');
        return redirect('/song');
    }
}
