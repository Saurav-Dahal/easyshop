<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        // return response()->json(['success' => 'Successfully added to your Cart.']);
        $product = Product::findorFail($id);

        if($product->discount_price == NULL || $product->discount_price == $product->selling_price)
        {
            Cart::add(['id' => $id, 
                       'name' => $request->product_name, 
                       'qty' => $request->quantity,
                       'price' => $product->selling_price, 
                       'weight' => 1, 
                       'options' => [
                            'image' => $product->product_thumbnail,
                            'color' => $request->color,
                            'size' => $request->size,
                        ],
                    ]);
                    return response()->json(['success' => 'Successfully added to your Cart.']);
        }else{
                Cart::add(['id' => $id, 
                           'name' => $request->product_name, 
                           'qty' => $request->quantity,
                           'price' => $product->discount_price, 
                           'weight' => 1, 
                           'options' => [
                                'image' => $product->product_thumbnail,
                                'color' => $request->color,
                                'size' => $request->size,
                            ],
                        ]);
                        return response()->json(['success' => 'Successfully added to your Cart.']);
            }
    }

    public function getProductDataForMiniCart()
    {
        $cartContent = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::subtotal();

        return response()->json(array(
            'cartContent'=> $cartContent,
            'cartQty'=> $cartQty,
            'cartTotal'=> round($cartTotal),
        ));
    }
}
