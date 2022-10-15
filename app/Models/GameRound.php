<?php

namespace App\Models;

use App\Models\Game;
use App\Models\GameHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameRound extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function gameHistories()
    {
        return $this->hasMany(GameHistory::class, 'game_round_id', 'id');
    }
}
