<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\CartRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function cartPage(){

        $activeCart = Cart::query()->where('status', 'Активно')->where('user_id', auth()->user()->id)->first();

        if($activeCart){
            $shops = $activeCart->shop;

            $total=$activeCart->shop->sum('price');

            return view('page.cart', compact('shops', 'activeCart','total'));

        }


        return view('page.cart');
    }
    public function cartPageAdmin(Request $request){

        $statuss = Cart::query()->whereNot('status', 'Активно')->get();
        if(isset($request->all()['status'])){
            $status=$request->all()['status'];
            $activeCarts = Cart::query()->where('status', $status)->orderByDesc('updated_at')->get();
            $activeCartsUsers = Cart::query()->where('status', $status)->where('user_id', auth()->user()->id)->orderByDesc('updated_at')->get();

            if($activeCarts){
    
                if($activeCartsUsers){
    
                    return view('page.cartAdmin', compact('activeCarts', 'activeCartsUsers', 'statuss'));
                }
            }

        }else{

            $activeCarts = Cart::query()->whereNot('status', 'Активно')->orderByDesc('updated_at')->get();
            $activeCartsUsers = Cart::query()->whereNot('status', 'Активно')->where('user_id', auth()->user()->id)->orderByDesc('updated_at')->get();

            if($activeCarts){
    
                if($activeCartsUsers){
    
                    return view('page.cartAdmin', compact('activeCarts', 'activeCartsUsers', 'statuss'));
                }
            }
        }


        return view('page.cartAdmin');
    }

    public function confirm(Cart $cart){
        $cart=Cart::query()->where('id', $cart->id)->update([
            'status'=>'Принято'
        ]);
        return back();
    }
    public function cancel(Cart $cart, Request $request){

        $validate = Validator::make($request->all(),[
            'reason'=>['required']
        ]);

        $data = $validate->validate();

        Cart::query()->where('id', $cart->id)->update([
            'status'=>'Отклонено',
        ]);

        Cart::query()->where('id', $cart->id)->update($data);

        return back();
    }

    public function cartPut(CartRequest $cartRequest, Shop $shop){

        $cart=Cart::query()->where('status', 'Активно')->where('user_id', auth()->user()->id)->first();

        if(!$cart){
            $CartData=[
                'user_id'=>auth()->user()->id,
            ];

            $cart=Cart::query()->create($CartData);

            $orderData=[
                'cart_id'=>$cart->id,
                'shops_id'=>$shop->id,
            ];

            Order::query()->create($orderData);
            return redirect()->route('catalog.page');
        }


        $orderData=[
            'cart_id'=>$cart->id,
            'shops_id'=>$shop->id,
        ];

        $orderData['cart_id']=$cart->id;

        $errors = $cart->shop->contains('id', $shop->id);

            if($errors){
                session()->flash('error', 'Данный товар уже находится в корзине');
                return back();
            }
        Order::query()->create($orderData);
        return redirect()->route('catalog.page');
    }

    public function destroyShop(Cart $cart, Shop $shop){

        Order::query()->where('cart_id', $cart->id)->where('shops_id',$shop->id)->delete();

        return back();
    }


    public function checkout(Cart $cart, Request $request){
        $Validate = Validator::make($request->all(),[
            'password'=>['required']
        ]);

        $data = $Validate->validate();

        if(!Hash::check($request->password, $request->user()->password)){
            return back()->withErrors(['password'=>'неверный пароль'])->withInput($request->all());
        }

        $cart->update([
            'status'=>'Оформлено'
        ]);

        return back();
    }
}
