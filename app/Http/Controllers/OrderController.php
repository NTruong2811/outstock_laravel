<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
        return view('client.order', [
          'cart_list' => $list,
           'total' => $total
        ]);
    }
   
    public function manage(){
      $list = order::join('users', 'users.id', '=', 'orders.user_id')
      ->select('users.*','users.id as userid', 'orders.*', 'orders.id as orderid')
      ->get();
      // dd($list);
      return view('admin.orders.list', [
         'list' => $list
      ]);
    }
    public function cf_order(Request $request){
         $new_order = new order();
         $new_order->phone = $request->phone;
         $new_order->address = $request->address;
         $new_order->role = 0;
         $new_order->user_id = Auth::user()->id;
         $list = cart::orderBy('created_at','desc')
         ->join('products', 'products.id', '=', 'carts.product_id')
           ->select('carts.*', 'products.img', 'products.name', 'products.price')
           ->get();
           $total = 0;
         foreach ($list as $item){
           $total += $item->quantity * $item->price;
         }
         $new_order->order_total = $total;
         
         $new_order->save();
          
         $get_order = order::where('user_id','=',Auth::user()->id) ->orderBy('created_at', 'desc')->first();
           
        
        foreach ($list as $item){
            $total = $item->quantity * $item->price;
            $this->add_detail($get_order->id,$item->id,$total,$item->quantity);
          }

          return redirect()->route('client.cart.index');
    }
    public function add_detail($id_order,$id_product,$total,$quantity){
         
        $order_detail = new order_detail();
        $order_detail->order_id = $id_order;
        $order_detail->product_id = $id_product;
        $order_detail->total = $total;
        $order_detail->quantity = $quantity;
        $order_detail->save();
    }

     public function changeStatus(Request $request,$id){
      $product = order::find($id);
     
      $product->role = 1;

   $product->update();
   return redirect()->route('order.manage');

    }


   public function manage_order(){
    $list = order::where('user_id','=',Auth::user()->id)->get();
    // dd($list);
    return view('client.manage_order',[
      'list' => $list
    ]);
   }
   
   public function changeStatusUser($id){
    $product = order::find($id);
     
    $product->role = 2;

 $product->update();
 return redirect()->route('client.order.manage_order');
   }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
