@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">List of Songs!</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Example
                <a href="{{ url('/song/create') }}">
                    <button class="btn btn-primary pull-right"><i class="fas fa-plus"></i> Add New Song</button>
                </a>
            </div>
            <div class="card-body">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Song Title</th>
                                <th>Artist</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if (count($data) > 0)
                            <tbody>
                                @foreach ($data as $song)
                                    <tr>
                                        <td>{{ $song->id }}</td>
                                        <td>{{ $song->title }}</td>
                                        <td>{{ $song->artist }}</td>
                                        <td class="text-center">{{ date('F d, Y',strtotime($song->created_at)) }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/song/'.$song->id.'/edit') }}">
                                                Edit
                                            </a> |
                                            <a href="#" class="delete-modal" data-toggle="modal" data-target="#deleteModal" song-id="{{ $song->id }}">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tr><td class="text-center" colspan="5"> NO SONGS YET!</td></tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" id="form-delete" action="">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Delete this song</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>Are you sure you want to delete this song?</p>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>   
@endsection