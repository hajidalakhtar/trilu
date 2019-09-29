<?php

namespace App\Http\Controllers;

use Auth;
use App\Board;
use App\Todo;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function PostAddBoard(Request $req)
    {
        $board = new Board;
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
        $todo->isi =$req->isi;
        $todo->board_id =$req->board_id;
        $todo->save();
        return redirect()->back();
    }
}
