<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\QueryException;
use Illuminate\Notifications\Notifiable;


class AosController extends Controller
{
    public function createaos()
    {
        $categories = [
            [   
                'name'=>'CORE RULEBOOK',
                'options'=> [
                    'Break Their Spirit',
                    'Broken Ranks',
                    'Conquer',
                    'Repel',
                    'Seize the Center',
                    'Slay the Warlord'
                    ]
            ]
        ];

        return view('aos.createaos', [
            'categories'=>$categories

        ]);
    }
}
