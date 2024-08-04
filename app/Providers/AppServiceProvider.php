<?php

namespace App\Providers;
use App\Models\Bill;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Slide;
use App\Models\User;
use App\Models\Type_product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() :void
    {
        Paginator::useBootstrap();
         $slide= Slide::all();
         $type_product=Type_product::all();
         $bill=Bill::all();
         $user=User::all();
         View::share("bill", $bill);
         View::share("user", $user);
         View::share("slide", $slide);
         View::share("type_product", $type_product);
         view()->composer(['frontend/layouts/header','frontend/pages/dathang'],function($view){
            if(Session('cart')){
                $old_cart=Session::get('cart');
                $cart =new Cart($old_cart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalprice'=>$cart->totalPrice,'totalqty'=>$cart->totalQty]);
            }
         });
         
    }
}
