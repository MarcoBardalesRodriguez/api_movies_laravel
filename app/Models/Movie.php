<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Director;
use App\Models\Actor;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Movie extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'movies';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'year',
        'date_published',
        'duration',
        'country',
        'worldwide_gross_income',
        'languages',
        'production_company',
    ];
    
    /**
     * Indicate the data types for certain columns,.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'int',
        'date_published' => 'date',
        'minutes_of_duration' => 'int',
        'worldwide_gross_income' => 'integer',
    ];

    /**
     * Get the genres for the movie.
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'movie_genre', 'movie_id', 'genre_id');
    }

    /**
     * The directors that belong to the movie.
     */
    public function directors(): BelongsToMany
    {
        return $this->belongsToMany(Director::class, 'movie_director', 'movie_id', 'director_id');
    }

    /**
     * The actors that belong to the movie.
     */
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'movie_actor', 'movie_id', 'actor_id')
                    ->withPivot('rol');
    }

    /**
     * Get the ratings for the movie.
     */
    public function rating(): HasOne
    {
        return $this->hasOne(Rating::class, 'movie_id', 'id');
    }

}
