<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Board;
use App\BoardMaster;
use App\Member;
use App\Todo;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function ViewDetailBoard($id)
    {
        $board = Board::where('board_master_id', $id)->get();
        $todo = Todo::all();
        $user = User::all();
        return view('board.board', [
            'id' => $id,
            'board' => $board,
            'todo' => $todo,
            'user' => $user,
        ]);
    }
    public function PostAddBoard(Request $req)
    {
        $board = new Board;
        $board->board_master_id = $req->board_master;
        $board->auth_id = Auth::user()->id;
        $board->title = $req->title;
        $board->save();
        return redirect()->back();
    }
    public function PostTodo(Request $req)
    {
        $todo = new Todo;
        $todo->isi = $req->isi;
        $todo->board_id  = $req->board_id;
        $todo->user_id = Auth::user()->id;
        $todo->save();
        return redirect()->back();
    }
    public function DeleteTodo($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->back();
    }
    public function CompletedTodo($id)
    {
        $todo = Todo::find($id);
        if ($todo->completed == 1) {
            $todo->completed = 0;
        } else {
            $todo->completed = 1;
        }
        $todo->save();
        return redirect()->back();
    }
    public function PostEditTodo(Request $req)
    {
        $todo = Todo::find($req->id);
        $todo->isi = $req->isi;
        $todo->board_id = $req->board_id;
        $todo->save();
        return redirect()->back();
    }
    public function PostAddBoardMaster(Request $req)
    {
        $board = new BoardMaster;
        $board->name = $req->board_name;
        $board->auth_id = Auth::user()->id;
        $board->save();
        return redirect()->back();
    }
    public function addMember(Request $req)
    {
        $member = new Member;
        $member->board_master_id = $req->board_id;
        $member->author_id = Auth::user()->id;
        $member->id_tamu = $req->id_tamu;
        $member->save();
        return redirect()->back();
    }
}
