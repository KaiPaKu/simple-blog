<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recht extends Model
{
    use HasFactory;

    protected $table = 'rechte';

    public function rollen()
    {
        return $this->belongsToMany(Rolle::class);
    }
}
