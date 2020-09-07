@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-lg mt-8">
                    <div class="card-header"><h3 class="text-left font-weight-light my-4">Add New Song</h3></div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                        @endif
                        <form method="POST" action="/song">
                            @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="inputTitle">Title</label>
                                <input class="form-control py-4" id="inputTitle" name="title" type="text" placeholder="Enter song title" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputArtist">Artist</label>
                                <input class="form-control py-4" id="inputArtist" name="artist" type="text" placeholder="Enter artist" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputLyrics">Lyrics</label>
                                <textarea class="form-control py-4" name="lyrics" placeholder="Enter Lyrics"></textarea>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button type="submit" class="btn btn-primary" href="index.html">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection