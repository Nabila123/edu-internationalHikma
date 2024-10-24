<?php

namespace App\Models\Main\SeetingDashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SideHeader extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'mast_dash_header';
    protected $fillable = [
        'uuid',
        'title',
        'deskripsi',
        'userId',
        'isActive'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Main Layouting - Dash Header')
            ->logOnly([
                'uuid',
                'title',
                'deskripsi',
                'userId',
                'isActive'
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public static function dashHeaderUpdateField($id, $updateField)
    {
        $dataField = [
            'uuid',
            'title',
            'deskripsi',
            'userId',
            'isActive'
        ];

        $updatedFields = array_intersect_key($updateField, array_flip($dataField));
        $updatedFields['updated_at'] = now();
        $data = self::updateOrCreate(['uuid' => $id], $updatedFields);


        if ($data) {
            return ['status' => 'success', 'data' => $data];
        } else {
            return ['status' => 'error', 'data' => $data];
        }
    }
}
