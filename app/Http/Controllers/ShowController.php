<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function main(Request $request){
        $shops=Shop::query()->latest()->limit(5)->get()->reverse();
        return view('page.main', compact('shops'));
    }

    public function catalog(Request $request){
        $categories=Category::query()->get();

        if(isset($request->all()['category'])){

            $category=$request->all()['category'];

            $shops=Shop::query()->where('category', $category)->get();

        }else{
            $shops=Shop::query()->latest()->get();
        }
        return view('page.catalog', compact('categories', 'shops'));
    }
    public function cardPage($id){
        $shop=Shop::findOrFail($id);
        return view('page.card', compact('shop'));
    }
}
