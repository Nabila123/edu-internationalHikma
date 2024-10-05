<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, AuthenticationLoggable, LogsActivity, SoftDeletes;
    protected $fillable = [
        'uuid',
        'name',
        'username',
        'email',
        'noHp',
        'password',
        'photo',
        'approvedBy'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = ['email_verified_at' => 'datetime'];
    protected $dates = ['deleted_at'];

    public function getRole()
    {
        return $this->hasOne('App\Models\ModelHasRole', 'model_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Management User')
            ->logOnly([
                'uuid',
                'name',
                'username',
                'email',
                'noHp',
                'password',
                'photo',
                'approvedBy'
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public static function userUpdateField($id, $updateField)
    {
        $dataField = [
            'uuid',
            'name',
            'username',
            'email',
            'noHp',
            'password',
            'photo',
            'approvedBy'
        ];

        $updatedFields = array_intersect_key($updateField, array_flip($dataField));
        $updatedFields['updated_at'] = now();
        $data = self::updateOrCreate(['id' => $id], $updatedFields);


        if ($data) {
            return ['status' => 'success', 'data' => $data];
        } else {
            return ['status' => 'error', 'data' => $data];
        }
    }
}
