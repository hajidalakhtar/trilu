@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="text-center">Selamat Datang <b>{{Auth::user()->name}}</b></h1>
    <h1 class="mt-5">Personal Boards</h1>
    <div class="row mt-2">
        @foreach ($board as $data)
        <div class="col-md-4">
            <a href="{{Route('details.board',$data->id)}}">
                <div class="card">
                    <div class="card-body">
                        <h1>{{$data->name}}</h1>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <h1 class="mt-5">Friend Board</h1>
    <div class="row mt-2">
        @foreach ($member as $data)
        <div class="col-md-4">
            <a href="{{Route('details.board',$data->board->id)}}">
                <div class="card">
                    <div class="card-body">
                        <h1>{{$data->board->name}}</h1>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>



<div class="modal fade" id="AddBoard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Board</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{Route('add.master.board')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <label for="">Name</label>
                    <input type="text" name="board_name" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('javascript')

@endsection