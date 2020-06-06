<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pack;

class WidgetController extends Controller
{

    public function divisionIntoPackages(Request $request) 
    {
        $widgets = (int)$request->input('widgets');

        $packs_db_all = json_decode(Pack::all());
        $packs_db = [];
       
        foreach ($packs_db_all as $key => $value) {
            $packs_db[] = $value->quantity;
        }

        arsort($packs_db);

        $packs = [];
        foreach($packs_db as $k => $pack) {
            $packs[] = $pack;
        }

        $count_packs = count($packs);
        $result_full_packs = [];
        $min_pack = $packs[$count_packs-1];
        $next_min = $packs[$count_packs-2];
        $max_pack = $packs[0];


        $min_packs = $widgets/$min_pack;
        $min_packs_all = (int)$min_packs;

        if(!is_int($min_packs)) {
            $min_packs_all++;
        }
        $min_packs_all = $min_packs_all * $min_pack;

        foreach($packs as $i => $pack){
            $division = $min_packs_all/$pack;
            if((int)$division > 0) {
                $result_full_packs[$pack] = (int)$division;
                $min_packs_all = $min_packs_all - $pack * (int)$division;   
            }
        }

       // var_dump(json_decode($result_full_packs));
        //die();
        return view('widget')->with([
                'data' => $result_full_packs,
                'widgets' => $widgets
            ]);
    }
}
