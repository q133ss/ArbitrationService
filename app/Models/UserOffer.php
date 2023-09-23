<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOffer extends Model
{
    use HasFactory;

    protected $table = 'user_offer';

    protected $guarded = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function offer(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Offer::class, 'id', 'offer_id');
    }
}
