<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    use HasFactory;
    protected $table = "bill_detail";
    protected $primaryKey = "id";

    public function bills()
    {
        return $this->belongsTo(Bill::class,'id_bill','id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class,'id_product','id');
    }
}
