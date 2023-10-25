<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'confirmed',
        'balance'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function offers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Offer::class, 'user_offer','user_id','offer_id')->withPivot(['approved']);
    }

    public function acceptedOffers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Offer::class, 'user_offer','user_id','offer_id')
            ->withPivot(['approved'])
            ->wherePivot('approved', 'approved');
    }

    /**
     * Возвращает либо все,
     * Либо не прочитанные
     *
     * @param $notRead
     */
    public function notifications($notRead = true)
    {
        $query = $this->hasMany(Notification::class, 'user_id', 'id');
        if($notRead == true){
            $query->where('is_read', false);
        }
        return $query;
    }

    public function cards(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserCard::class, 'user_id', 'id');
    }

    public function numbers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Number::class, 'user_id', 'id');
    }
}
