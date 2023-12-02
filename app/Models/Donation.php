<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name_for_donation',
        'linked_donation',
        'amount',
        'paid',
        'approval',
        'status',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function sociallyEndangered() {
        return $this->belongsTo(SociallyEndangered::class);
    }
}
