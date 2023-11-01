<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function send(string $title, int $user_id, int $offer_id = null): void
    {
        $this->create([
            'title' => $title,
            'user_id' => $user_id,
            'offer_id' => $offer_id
        ]);
    }
}
