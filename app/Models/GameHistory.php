<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'game_id',
        'game_round_id',
        'player_type',
        'game_row',
        'game_column',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
