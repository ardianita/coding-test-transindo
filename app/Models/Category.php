<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $tabel = 'categories';
    protected $guarded = ['id'];

    public function trashes()
    {
        return $this->hasMany(Trash::class);
    }
}
