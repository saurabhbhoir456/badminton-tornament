<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchh extends Model
{
    use HasFactory;
    protected $fillable = ['team1_id', 'team2_id', 'match_date', 'venue'];

    public function individualMatches()
    {
        return $this->hasMany(IndividualMatch::class);
    }
}
