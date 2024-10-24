<?php

namespace App\Models\Main\SeetingDashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Caraosel extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'mast_caraosel';
    protected $fillable = [
        'uuid',
        'title',
        'deskripsi',
        'slogan',
        'image',
        'userId',
        'isActive'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Main Layouting - Caraosel')
            ->logOnly([
                'uuid',
                'title',
                'deskripsi',
                'slogan',
                'image',
                'userId',
                'isActive'
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public static function caraoselUpdateField($id, $updateField)
    {
        $dataField = [
            'uuid',
            'title',
            'deskripsi',
            'slogan',
            'image',
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
