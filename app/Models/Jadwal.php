<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = "jadwal_sholat";

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}

