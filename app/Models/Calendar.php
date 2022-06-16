<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'start_at',
        'finish_at',
        'title',
        'description',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
