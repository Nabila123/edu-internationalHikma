<?php

namespace App\Models\Main\SeetingDashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Video extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'mast_video';
    protected $fillable = [
        'uuid',
        'judul',
        'video',
        'userId',
        'isActive'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Main Layouting - Video')
            ->logOnly([
                'uuid',
                'judul',
                'video',
                'userId',
                'isActive'
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public static function videoUpdateField($id, $updateField)
    {
        $dataField = [
            'uuid',
            'judul',
            'video',
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
