<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id', 
        'product_id'
    ];

    protected $table = 'payment_items';

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
