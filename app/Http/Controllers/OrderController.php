<?php

namespace App\Http\Controllers;
use Validator;
use Auth;
use DB;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::all();
        // return view('ordersf.index' , compact('products'));
        
        if(Auth::user()->role == 'employee')
        {
            $orders = DB::table('orders')->where('employee_id',Auth::user()->id)->orderBy('order_status','desc')->get();
            return view('ordersf.lasttable',compact('orders'));
        }
        else
        {
            $products = Product::all();
            return view('ordersf.index',compact('products'));
        }
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
       
        $order = new Order([
            'product_id'=>$request->get('product_id'),
            'employee_id' => $request->get('employee_id'),
            'customer_id' => $request->get('customer_id'),
            'customer_name'=>Auth::user()->name,
            'product_name'=>$request->get('product_name'),
            'product_detail'=>$request->get('product_detail'),
            'price' => $request->get('price'),
            'customer_address'=> Auth::user()->address,
            'customer_mobile' => Auth::user()->mobile,
            'date' => date("Y-m-d"),
            'order_status' =>'New'

        ]);
        $order->save();
        return redirect()->route('orders.index');
    }
    
    public function showEmployeeOrder()
    {
        $data = DB::table('orders')
        ->join('users','orders.employee_id','=','users.id')
        ->join('products','products.id','=','orders.product_id')
        ->select('users.name','users.address','users.mobile','products.name as prod_name',
        'products.detail','orders.created_at')->where('orders.employee_id', Auth::user()->id)
            ->get();
        return view('ordersf.show',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function myaction(Request $request)
    {
        //return $request->raw_id;
        Order::where('id',$request->raw_id)->update(array('order_status'=>$request->action));

        if($request->action == 'Delivered'){
            session()->flash('success','Order Cancelled');
            return redirect(route('orders.index'));
        }else{
            session()->flash('success','Order Cancelled');
            return redirect('customerorders');
        }
       
    }
    public function myorder()
    {
        $products= DB::table('orders')
        ->join('users','users.id',"=",'orders.employee_id')
        ->select('orders.*','users.name')
        ->orderBy('order_status','desc')
        ->get();
        //return $products;
        // $orders = Order::all();
        return view('ordersf.myorders',compact('products'));
    }
}
