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
        $products = Product::all();
        return view('ordersf.index' , compact('products'));
        
        /*if(Auth::user()->role == 'employee')
        {
            $orders = Order::all();
            return view('ordersf.lasttable',compact('orders'));
        }
        else
        {
            $orders = Order::all();
            return view('ordersf.index',compact('orders'));
        }*/
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
        Order::create($requset->all());
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
}
