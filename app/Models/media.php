<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    use HasFactory;
    protected $table = "table_media";
    public function posts(){
        $this->belongsToMany(media::class);

    }
}
