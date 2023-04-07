<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowingdetail extends Model
{
    use HasFactory;

    public function apparatus()
    {
        return $this->belongsTo(Apparatus::class);
    }
    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }
}
