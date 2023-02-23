<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function store(Request $request)
    {

        if (!User::where('id', $request->user_id)->count()){

            return response()->json([
                'StatusCode' => '-1',
                'message' => 'Invalid User_ID',
                ], 404);

        }else if (!Offer::where('id', $request->offer_id)->count()){

            return response()->json([
                'StatusCode' => '-2',
                'message' => 'Invalid Offer_ID',
                ], 404);

        }else if (Purchase::where('user_id', $request->user_id, 'and')->where('offer_id', $request->offer_id)->count()){

            return response()->json([
                'StatusCode' => '-3',
                'message' => 'This user already purchased that offer',
                ], 404);

        }
        
        $purchase = new Purchase;
        $purchase->user_id = $request->user_id;
        $purchase->offer_id = $request->offer_id;
        $purchase->save();

        return response()->json([
            'StatusCode' => '0',
            'message' => 'Successfull Purchase',
            ], 200);
    }
}
