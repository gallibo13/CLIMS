<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    public function borrowers()
    {
        return $this->hasMany(Borrower::class);
    }
    public function borrowingdetails()
    {
        return $this->hasMany(Borrowingdetail::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
