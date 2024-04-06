<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\Category;
use App\Http\Requests\Shop\ShopRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Shop;
use Illuminate\Http\Request;


class ShopController extends Controller
{
    public function CreatePage(Request $request){
        $categories = \App\Models\Category::query()->get();
        return view('page.create', compact('categories'));
    }

    public function CategoryPage(){
        $categories = \App\Models\Category::query()->get();
        return view('page.category');
    }

    public function categoryCreate(Category $request){
        $data=$request->validated();
        \App\Models\Category::query()->create($data);
        return redirect()->route('catalog.page');
    }

    public function create(ShopRequest $shopRequest){

        $data = $shopRequest->validated();

        
        if($shopRequest->hasFile('img')){

            $path=$shopRequest->file('img')->store('public/img');

            $data['img']=$path;

            Shop::query()->create($data);

            return redirect()->route('catalog.page');
        } 

        
        
        return redirect()->route('main.page');
    }

    public function editPage(Shop $shop){
        
        $categories=\App\Models\Category::all();
        return view('page.edit', compact('categories', 'shop'));
    }

    public function edit(Shop $shop, UpdateRequest $request){
        $data=$request->validated();
        $shop->update($data);

        return redirect()->route('catalog.page');
    }

    public function delete(Shop $shop){
        $shop->delete();
         
        return redirect()->route('catalog.page');
    }
    public function deleteCategory(\App\Models\Category $category){
        $category->delete();
         
        return redirect()->route('catalog.page');
    }



    




}
