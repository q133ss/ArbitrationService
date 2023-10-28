<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOperation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function lead()
    {
        return $this->hasOne(Lead::class, 'id', 'lead_id');
    }
}
