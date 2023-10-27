<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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

    public function scopeWithFilter($query, Request $request)
    {
        return $query
            ->when($request->query('offer_id'), function (Builder $query, $offer_id) {
                $query->where(function ($sql) use ($offer_id) {
                    return $sql->where('offer_id', $offer_id);
                });
            })
            ->when($request->query('dates'), function (Builder $query, $dates) {
                $date = explode(' - ',$dates);


                $query->whereDate('created_at', '>=', Carbon::parse($date[0])->format('Y-m-d'))->whereDate('created_at', '<=', Carbon::parse($date[1])->format('Y-m-d'));
            })
            ->when($request->query('city'), function (Builder $query, $city) {
                if($city != 'Города') {
                    $query->where('city', $city);
                }
            });
    }
}
