<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualMatch extends Model
{
    use HasFactory;

    protected $fillable = ['match_id', 'type', 'player1_id', 'player2_id', 'player3_id', 'player4_id', 'score_player1', 'score_player2'];

    public function match()
    {
        return $this->belongsTo(Matchh::class);
    }

    public function player1()
    {
        return $this->belongsTo(Player::class, 'player1_id');
    }

    public function player2()
    {
        return $this->belongsTo(Player::class, 'player2_id');
    }

    public function player3()
    {
        return $this->belongsTo(Player::class, 'player3_id');
    }

    public function player4()
    {
        return $this->belongsTo(Player::class, 'player4_id');
    }
}

