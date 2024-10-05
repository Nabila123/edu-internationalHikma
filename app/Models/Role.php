<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'roles';
    protected $fillable = ['name', 'guard_name'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Setting Management - Roles')
            ->logOnly([
                'name',
                'guard_name'
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
