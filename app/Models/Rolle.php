<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rolle extends Model
{
    use HasFactory;

    protected $table = 'rollen';

    public function rechte()
    {
        return $this->belongsToMany(Recht::class);
    }

    public function gibRecht(Recht $recht)
    {
        return $this->rechte()->save($recht);
    }
}
