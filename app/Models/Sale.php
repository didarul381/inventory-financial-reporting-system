<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'product_id', 'quantity', 'discount', 'vat', 'customer_paid', 'due'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }
}
