<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function show($id)
    {
        return response()->json(Product::find($id));
    }

    public function store(Request $request)
    {
        $item = new Product();
        $item->type_id = $request->type_id;
        $item->date = $request->date;

        $item->save();
    }

    public function update(Request $request, $id)
    {
        $item = Product::find($id);
        $item->type_id = $request->type_id;
        $item->date = $request->date;

        $item->save();
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    public function productBasket()
    {
        $user = Auth::user();
        return Basket::with('products')
        ->where('user_id', '=', $user->id)
        ->get();
    } 
}
