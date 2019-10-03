@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{Route('add.board')}}" method="post">
                        @csrf
                        <input type="hidden" name="board_master" value="{{$id}}">
                        <input type="text" name="title" class="form-control" id="">
                        <input type="submit" value="add" class="btn btn-primary w-100 mt-2">
                    </form>
                    <div class="row mt-5">
                        @foreach ($board as $data_1)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    {{$data_1->title}}
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($todo as $data)
                                        @if ($data->board_id == $data_1->id )

                                        <li class="list-group-item"
                                            style="{{$data->completed ? 'text-decoration: line-through;' : ''}}">
                                            {{$data->isi}}
                                            <spam class="float-right" /> <a
                                                href="{{Route('delete.todo',$data->id)}}">✖</a> <a
                                                href="{{Route('completed.todo',$data->id)}}">✔</a> <a
                                                onClick="openModal('{{$data->isi}}','{{$data->board_id}}','{{$data->id}}')">✎</a></span>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                    <form action="{{Route('add.todo')}}" method="post" class="mt-5">
                                        @csrf
                                        <input type="text" class="form-control" value="" name="isi">
                                        <input type="submit" value="add" class="btn btn-primary mt-2 w-100">
                                        <input type="hidden" name="board_id" value="{{$data_1->id}}">
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{Route('edit.todo')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="text" class="form-control" name="isi" id="isi_modal" aria-describedby="helpId"
                        placeholder="">
                    <input type="hidden" class="form-control" name="board_id" id="board_id_modal"
                        aria-describedby="helpId" placeholder="">
                    <input type="hidden" class="form-control" name="id" id="id_modal" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="AddMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{Route('add.member')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="board_id" value="{{$id}}">
                    <select name="id_tamu" id="" class="form-control">
                        <option value="">Pilih Member</option>
                        @foreach ($user as $data)
                        @if ($data->id != Auth::user()->id)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endif
                        @endforeach
                    </select>
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
<script>
    function openModal(isi,board_id,id) {
    $('#isi_modal').val(isi);    
    $('#id_modal').val(id);    
    $('#board_id_modal').val(board_id);    
    
    $('#EditModal').modal('show')
}



</script>
@endsection