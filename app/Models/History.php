<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'history';

    protected $fillable = ['id_user','score','word','answer','correct'];

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
