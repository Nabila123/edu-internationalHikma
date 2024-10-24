<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Logos extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'mast_logos';
    protected $fillable = [
        'uuid',
        'logo',
        'kategori',
        'userId'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Main Layouting - Logos')
            ->logOnly([
                'uuid',
                'logo',
                'kategori',
                'userId'
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public static function logosUpdateField($id, $updateField)
    {
        $dataField = [
            'uuid',
            'logo',
            'kategori',
            'userId'
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
