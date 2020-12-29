<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class StatController extends Controller
{
    public function index()
    {
        $games = Game::latest()->get();
        $count = Game::latest('id')->count();
        return view('/stats',['games'=>$games],['count'=>$count]);
    }
}
