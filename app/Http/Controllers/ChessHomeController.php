<?php

namespace App\Http\Controllers;

use App\Models\RandFen;
use App\Services\GetParsedFenStringService;
use Illuminate\Http\Request;

class ChessHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $fenString = RandFen::all()->random(1)->pluck('fen_string')->toArray()[0];

        if($request->has('fen')){
            $fenStringParse = explode('/',$request->fen);

            if(count($fenStringParse) != 8){
                return response('Not a valid Fen string', 400);
            }
            $fenString = explode(' ',$request->fen)[0];

        }

        $parseFenStringService = new GetParsedFenStringService($fenString);
        $initBoard = $parseFenStringService->parse();

        return view('welcome', compact('initBoard'));
    }

}
