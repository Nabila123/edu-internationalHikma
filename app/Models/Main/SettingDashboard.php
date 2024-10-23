<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SettingDashboard extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'mast_dashboard_setting';
    protected $fillable = [
        'logo',
        'header',
        'side',
        'video',
        'userId'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Main Layouting - Setting Dashboard')
            ->logOnly([
                'logo',
                'header',
                'side',
                'video',
                'userId'
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public static function settingDashboardUpdateField($id, $updateField)
    {
        $dataField = [
            'logo',
            'header',
            'side',
            'video',
            'userId'
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
