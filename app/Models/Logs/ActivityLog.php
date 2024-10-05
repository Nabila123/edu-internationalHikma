<?php

namespace App\Models\Logs;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'activity_log';

    public function user()
    {
        return $this->belongsTo(User::class, 'causer_id', 'id');
    }
}
