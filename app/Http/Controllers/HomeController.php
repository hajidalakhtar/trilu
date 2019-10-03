<?php

namespace App\Http\Controllers;

use Auth;
use App\Board;
use App\BoardMaster;
use App\Todo;
use App\Member;
use App\User;
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
        $member = Member::where('id_tamu', Auth::user()->id)->get();
        $board = BoardMaster::where('auth_id', Auth::user()->id)->get();
        return view('home', [
            "board" => $board,
            'member' => $member,

        ]);
    }
}
