<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SociallyEndangered extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'surname', 'phone', 'transactions', 'description',
        'title', 'deadline', 'image', 'priority', 'goal', 'raised'
    ];
    public function donations() {
        return $this->hasMany(Donation::class);
    }

}
