<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "id";
    public function bill_detail()
    {
        return $this->hasMany(Bill_detail::class,'id_product','id');  //fix
    }
    public function product_type()
    {
        return $this->belongsTo(Type_product::class,'id_type','id');
    }
}
