<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roomimage extends Model
{
    use HasFactory;
    use HasUuids;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $guarded    = [];
    protected $primaryKey = 'id';

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}