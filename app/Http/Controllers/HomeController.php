<?php

namespace App\Http\Controllers;

use Auth;
use App\Board;
use App\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $board = Board::where('auth_id', Auth::user()->id)->get();
        $todo = Todo::all();
        return view('home', [
            'board' => $board,
            'todo' => $todo
        ]);
    }
}
