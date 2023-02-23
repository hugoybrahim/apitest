<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offer;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $purchases = DB::select ("SELECT b.* from (SELECT * FROM offers o WHERE  lower(season) = 'none' OR lower(season) = '" . strtolower($request->season) ."' ) b where id NOT IN (SELECT offer_id FROM purchases WHERE user_id = ". $request->user ." )");
        $invalid = DB::select ("SELECT COUNT(*) as c FROM offers WHERE lower(season) ='" . strtolower($request->season) . "'");
        if ( $invalid[0]->c == 0 ){
            
            return response()->json([
                'StatusCode' => '-1',
                'message' => 'Invalid Season',
                ], 404);
        }else if ( empty( $purchases ) ) {
            
            return response()->json([
                'StatusCode' => '-2',
                'message' => 'No matching offers',
                ], 404);
        }
        
        $price = array_column($purchases, 'price');
        array_multisort($price, SORT_ASC, $purchases);
        
        return response()->json([
            'StatusCode' => '0',
            'message' => 'Successfull',
            'data' => $purchases
            ], 200);
    }

}
