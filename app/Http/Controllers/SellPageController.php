<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SellPageController extends Controller
{
    public function index(Request $request)
    {
        $forSale = Product::where('user_id', $request->user()->id)
            ->where('sold_at', null)->with('user')->paginate(15);

        $sold = Product::where('user_id', $request->user()->id)
            ->where('sold_at', !null)->with('user')->paginate(15);

        return response()->json(compact('forSale', 'sold'));
    }
}
