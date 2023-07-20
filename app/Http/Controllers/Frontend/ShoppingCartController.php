<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Category;

class ShoppingCartController extends Controller
{
    public function index(){
        $categoryModel = new Category();
        $categoryItems = $categoryModel->getListItems(null,['task' =>'frontend_get_list_items']);
        return view('frontend.pages.cart.cartShow', compact('categoryItems'));
    }

    public function addToCart(Request $request){
        $id_product= $request->id;
        $qty = $request->qty_add_to_cart;
        $productModel = new Product();
        $product = $productModel->getItem($id_product,['task'=>'admin_get_item']);
        
        if($product['discount']>0){
            $product['price'] = $product['price'] - ($product['price']*$product['discount'])/100;
        }
        // dd($product['price']);
        $thumb = json_decode($product['thumb'],true)[0];        
        Cart::add([
            'id' => $id_product, 
            'name' => $product['name'], 
            'qty' => $qty, 
            'price' => $product['price'],
            'options' => ['thumb' => $thumb, 'discount' => $product['discount'],]
        ]);
        
        return redirect('/gio-hang');
    }

    public function removeItem(Request $request){
        $rowId = $request->id;
        Cart::remove($rowId);
        return redirect('/gio-hang');
    }

    public function upQuantity(Request $request){
        $rowId = $request->id;
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;

        Cart::update($rowId,$qty);
        return redirect()->back();
    }

    public function downQuantity(Request $request){
        $rowId = $request->id;
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;

        Cart::update($rowId,$qty);
        return redirect()->back();
    }
    
    public function destroy(){
        Cart::destroy();
        return redirect('/gio-hang');
    }
    
}
