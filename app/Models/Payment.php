<?php

namespace App\Models;

use App\Models\PaymentItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'user_id',
        'user_email',
        'amount',
        'currency',
        'order_status',
    ];

    protected $table = 'payment';

    public function items()
    {
        return $this->hasMany(PaymentItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}