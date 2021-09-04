<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $table = "kontak";

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
