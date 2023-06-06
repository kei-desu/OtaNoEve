<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $table = 'events';
    public $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = [
        "img_name",
        "img_path",
    ];

}
