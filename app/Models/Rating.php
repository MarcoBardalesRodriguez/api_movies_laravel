<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rating extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ratings';

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
        'avg_rating',
        'total_votes',
        'median_rating',
        'movie_id',
    ];

    /**
     * The data types for certain columns.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'int',
        'avg_rating' => 'decimal:1',
        'total_votes' => 'int',
        'median_rating' => 'int',
        'movie_id' => 'int',
    ];

    /**
     * Get the movie associated with the rating.
     */
    public function movie(): HasOne
    {
        return $this->hasOne(Movie::class, 'id', 'movie_id');
    }
}
