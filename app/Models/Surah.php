<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    use HasFactory;
    protected $table = "surahfavs";
    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
