<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getStatus(): string
    {
        return match ($this->status) {
            'hold' => 'Не обработан',
            'accept' => 'Принят',
            'cancel' => 'Отклонен'
        };
    }

    public function offer()
    {
        return $this->hasOne(Offer::class, 'id', 'offer_id');
    }
}
