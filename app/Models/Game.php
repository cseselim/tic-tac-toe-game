<?php

namespace App\Models;

use App\Models\GameRound;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Game extends Model
{
    use HasFactory;

    public const DEFAULT_SIZE = 3;
    public const FIRST_PLAYER_TYPE = 1;
    public const SECOND_PLAYER_TYPE = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_player_name',
        'second_player_name',
        'token',
    ];

    public static function generateToken(): string
    {
        return (string) Str::uuid();
    }

    public static function getPlayerTypes(?int $type = null)
    {
        $types = [
            self::FIRST_PLAYER_TYPE => 'x',
            self::SECOND_PLAYER_TYPE => 'o',
        ];

        if ($type !== null) {
            return $types[$type] ?? null;
        }

        return $types;
    }

    public function setToken(): void
    {
        $this->token = self::generateToken();
    }

    public function gameRounds()
    {
        return $this->hasMany(GameRound::class, 'game_id', 'id');
    }

    public function countGameRounds()
    {
        return $this->hasMany(GameRound::class, 'game_id', 'id')->count();
    }

    public function gameRoundLatest()
    {
        return $this->hasOne(GameRound::class, 'game_id', 'id')->latest();
    }
}
