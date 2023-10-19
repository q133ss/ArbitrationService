<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function advertiser(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'advertiser_id');
    }

    public function files(): array
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'materials')->pluck('src')->all();
    }

    /**
     * Возвращает прошлую версию модели
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function version(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Version::class, 'versionable')->orderBy('created_At', 'desc');
    }
}
