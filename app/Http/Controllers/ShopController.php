<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\comments;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_list = products::paginate(9);
        return view('client.shop',[
            'product_list' => $product_list,
            'category_list'=> categories::all()
        ]);
    }
     
   public function search(Request $request){
       
    if($request->search === ''){
        return view('client.shop', [
            $product_list = products::paginate(9)
        ]);
     }else{
        $product_list = products::where('name','like',$request->search.'%')->paginate(9);

        return view('client.shop', [
            'product_list' => $product_list,
            'category_list'=> categories::all()
        ]);
     }

   }

   public function filter(Request $request){
      
      $filter = $request->all();
      $product_list = products::whereIn('cate_id',$filter)->paginate(9);
        
       return view('client.shop', [
        'product_list' => $product_list,
        'category_list'=> categories::all()
    ]);

   }


    public function product_detail($id){
        $product_detail = products::find($id);
        $comment = comments::join('users', 'users.id', '=', 'comments.user_id')
        ->where('product_id','=',$id)
        ->get();
        $same_product = products::where('cate_id','=',$product_detail->cate_id)->get();
        return view('client.product_detail',[
            'product_detail' => $product_detail,
            'same_product' =>$same_product,
             'comment' => $comment
        ]);
    }

    public function PostComment(Request $request){
        $comment = new comments();
        $comment->fill($request->all());
        $comment->user_id = Auth::user()->id;
       $comment->save();
       return redirect()->back();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
