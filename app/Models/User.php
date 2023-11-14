<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
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
        'balance',
        'percent'
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

    /**
     * Создает/меняет аватар у юзера
     *
     * Передавать надо полный пусть со /storage/
     *
     * @param string $path
     * @return void
     */
    public function updateImage(string $path): void
    {
        $file = File::where('fileable_type', 'App\Models\User')->where('fileable_id', $this->id)->where('category', 'photo');
        if($file->exists()){
            //удаляем старый ставим новый!
            Storage::disk('public')->delete(str_replace('/storage/', '', $file->pluck('src')->first()));
            $file->first()->update(['src' => $path]);
        }else{
            File::create([
                'fileable_type' => 'App\Models\User',
                'fileable_id' => $this->id,
                'category' => 'photo',
                'src' => $path
            ]);
        }
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function getAvatar()
    {
        $file = $this->files->where('category', 'photo');
        if(!$file->isEmpty()){
            return $file->pluck('src')->first();
        }else{
            return '/assets/images/dashboard/profile.jpg';
        }
    }

    public function getOperatorLeads()
    {
        return $this->belongsToMany(Lead::class, 'operator_leads', 'operator_id', 'lead_id');
    }
}
