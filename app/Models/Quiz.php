<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
protected $casts = [
    'deadline' => 'datetime',
];

public function subject()
{
    return $this->belongsTo(\App\Models\Subject::class);
}

public function teacher()
{
    return $this->belongsTo(\App\Models\User::class, 'user_id');
}
public function status()
{
    if (!$this->deadline) return 'open';
    $now = now();
    if ($now->greaterThan($this->deadline)) return 'closed';
    // upcoming = within 1 day? (optional)
    if ($now->greaterThan($this->deadline->subDay())) return 'upcoming';
    return 'open';
}
}
