<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aos;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\QueryException;
use Illuminate\Notifications\Notifiable;

class TenEdController extends Controller
{
    use HasFactory, Notifiable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create10e()
    {
        return view('40k10e.10e_score_card');
    }
}