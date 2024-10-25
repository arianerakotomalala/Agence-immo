<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable=['bien_id','path'];
    
    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }
}
