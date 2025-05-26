<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::findOrFail($productId);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            $price = $product->sell_price; // definisikan dulu
            $cart[$productId]['total'] = $cart[$productId]['quantity'] * $price;
        } else {
            $cart[$productId] = [
                "name" => $product->name_product,
                "quantity" => 1,
                "price" => $product->sell_price,
                "total" => $product->sell_price,
                "photo" => $product->photo
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk ditambahkan ke cart!');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart berhasil dikosongkan!');
    }

}


