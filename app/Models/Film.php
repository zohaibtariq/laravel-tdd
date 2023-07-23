<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'edited';

    protected $fillable = ['title', 'opening_crawl', 'episode_id', 'director_id', 'producer_id', 'release_date'];

    protected $hidden = ['pivot'];

    public function vehicles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class)->select('id', 'name');
    }

    public function characters(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Human::class, (new FilmCharacter())->getTable())->select('id', 'name');
    }

    public function planets(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Planet::class)->select('id', 'name');
    }

    public function starships(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Starship::class)->select('id', 'name');
    }

    public function species(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Species::class)->select('id', 'name');
    }

    public function director(){
        return $this->hasOne(Human::class, 'id', 'director_id')->select('id', 'name');
    }

    public function producer(){
        return $this->hasOne(Human::class, 'id', 'producer_id')->select('id', 'name');
    }

    public function episode(){
        return $this->hasOne(Episode::class, 'id', 'episode_id')->select('id', 'title');
    }
}
