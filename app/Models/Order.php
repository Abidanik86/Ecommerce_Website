<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'status', // Add 'status' to the $fillable array
        // Add other fields as needed
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_name', 'title');
    }
    use HasFactory;

}
