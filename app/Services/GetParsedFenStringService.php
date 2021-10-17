<?php

namespace App\Services;

class GetParsedFenStringService {
    public $fenString;
    const GUTI = [
        "P" => ['name' => 'pawn', 'color' => 'white', 'image' => 'Wp'],
        "N" => ['name' => 'knight', 'color' => 'white', 'image' => 'Wn'],
        "B" => ['name' => 'bishop', 'color' => 'white', 'image' => 'Wb'],
        "R" => ['name' => 'rook', 'color' => 'white', 'image' => 'Wr'],
        "Q" => ['name' => 'queen', 'color' => 'white', 'image' => 'Wq'],
        "K" => ['name' => 'king', 'color' => 'white', 'image' => 'Wk'],
        "p" => ['name' => 'pawn', 'color' => 'black', 'image' => 'Wp'],
        "n" => ['name' => 'knight', 'color' => 'black', 'image' => 'Wn'],
        "b" => ['name' => 'bishop', 'color' => 'black', 'image' => 'Wb'],
        "r" => ['name' => 'rook', 'color' => 'black', 'image' => 'Wr'],
        "q" => ['name' => 'queen', 'color' => 'black', 'image' => 'Wq'],
        "k" => ['name' => 'king', 'color' => 'black', 'image' => 'Wk'],
    ];
    public function __construct( $fenString ) {
        $this->fenString = $fenString;
    }

    public function parse(  ) {
        $board = [];
        $rows = explode(' ', 'A B C D E F G H');

        for($i = 8; $i >= 1; $i --){
            foreach ($rows as $key => $row){
                $board[$row.$i]['position'] = $row.$i;
                if($i%2 == $key%2){
                    $board[$row.$i]['color'] = 'white';
                } else{
                    $board[$row.$i]['color'] = 'black';
                }

            }
        }
        //$fenBlockArray = explode('/', 'rnbqkbnr/pp1ppppp/8/2p5/4P3/5N2/PPPP1PPP/RNBQKB1R');

        $fenBlockArray = explode('/', $this->fenString);
        $j = 8;
        foreach ($fenBlockArray as $key => $row){
            $len = strlen($row);
            $k = 0;
            for($i = 0; $i < $len; $i++){
                //echo $rows[$key].$j;
                if(is_numeric($row[$i])){
                    $k += $row[$i];
                }else{
                    $board[$rows[$k++].$j]['guti'] = self::GUTI[$row[$i]];
                }
            }
            $j--;
        }

        return $board;
    }
}
