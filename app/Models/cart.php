<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $guarded;
    
    // cart bhitra bhako name haru tanna ko lagi 
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
