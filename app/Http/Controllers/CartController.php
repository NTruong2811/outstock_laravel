<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $list = cart::orderBy('created_at','desc')
    ->join('products', 'products.id', '=', 'carts.product_id')
      ->select('carts.*', 'products.img', 'products.name', 'products.price')
      ->get();
      $total = 0;
    foreach ($list as $item){
      $total += $item->quantity * $item->price;
    }
    return view('client.cart', [
      'cart_list' => $list,
       'total' => $total
    ]);
  }

  public function add_to_cart($id)
  {

    $checkcart = cart::where('product_id', '=', $id)->first();


    if (isset($checkcart->product_id)) {
      $checkcart->quantity += 1;
      $checkcart->update();
      return redirect()->route('client.cart.index');
    } else {
      $add_to_cart = new cart();
      $add_to_cart->user_id = Auth::user()->id;
      $add_to_cart->product_id = $id;
      $add_to_cart->quantity = 1;
      $add_to_cart->save();
      return redirect()->route('client.cart.index');
    }
  }
  public function destroy($id){
    echo $id;
  }
}
