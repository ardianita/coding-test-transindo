<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $guarded = ['id'];

    public function trash()
    {
        return $this->belongsTo(Trash::class);
    }
}
