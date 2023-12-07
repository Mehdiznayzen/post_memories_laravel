<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memoriesModel extends Model
{
    protected $table = 'memories';
    protected $fillable = ['creator', 'title', 'message', 'tags', 'image'];
}
