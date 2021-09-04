<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = "banner";

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
