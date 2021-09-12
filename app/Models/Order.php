<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'employee_id','customer_id','product_name','product_detail','price','customer_name','customer_address','customer_mobile','date','order_status'];
}
