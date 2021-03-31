<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{
    use HasFactory;
    protected $table = 'booked_events';

    public $primarykey = 'id';

    public $timestamps = 'true';

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function posts(){
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}
