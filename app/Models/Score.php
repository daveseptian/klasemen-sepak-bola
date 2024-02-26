<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $primaryKey = 'score_id';

    protected $fillable = [
        'club_name',
        'club_score',
        'club_wins',
        'club_loses',
        'club_draws',
        'club_points',
    ];
}
