<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\RandFen;
use App\Services\GetParsedFenStringService;
use Illuminate\Http\Request;

class ApiFenStringsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('fen')){
            $fenStringParse = explode('/',$request->fen);

            if(count($fenStringParse) != 8){
                return response('Not a valid Fen string', 400);
            }
            $fenString = explode(' ',$request->fen)[0];

        }else{
            $fenString = RandFen::all()->random(1)->pluck('fen_string')->toArray()[0];
        }

        $parseFenStringService = new GetParsedFenStringService($fenString);
        return response()->json(['data' => array_values($parseFenStringService->parse())]);
    }

}
