<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Boardinghouse extends Model
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

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'like', $term);
        });
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function bonuses()
    {
        return $this->hasMany(Bonus::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
      public function generateSlug($name)
    {
        return Str::slug($name);
    }

    // Set slug auto with name dengan muttator
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = $this->generateSlug($value);
    }
}