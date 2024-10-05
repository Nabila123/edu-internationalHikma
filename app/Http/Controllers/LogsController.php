<?php

namespace App\Http\Controllers;

use App\Models\Logs\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LogsController extends Controller
{
    public function auth()
    {
        if (getRolesId() == 1) { // jika roles sebagai administrator
            $datas = DB::table('authentication_log as a')
                ->leftjoin('users as b', 'b.id', '=', 'a.authenticatable_id')
                ->orderBy('a.id', 'DESC')
                ->paginate('5');
        } else {
            $datas = DB::table('authentication_log as a')
                ->leftjoin('users as b', 'b.id', '=', 'a.authenticatable_id')
                ->orderBy('a.id', 'DESC')
                ->where('a.authenticatable_id', getUserId())
                ->paginate('5');
        }

        return view('logs.auth', compact('datas'));
    }

    public function system()
    {
        return Redirect::to('system');
    }

    public function activity()
    {
        $datas = ActivityLog::with('user')
            ->when(getRolesId() > 2, function ($q) {
                return $q->where('causer_id', getUserId());
            })
            ->orderBy('id', 'DESC')
            ->paginate(100);

        $noPage = ($datas->currentPage() - 1) * $datas->perPage() + 1;
        foreach ($datas as $data) {
            if ($data->event == 'created') {
                $data->color = "badge-light-success";
            } elseif ($data->event == 'updated' || $data->event == 'update') {
                $data->color = 'badge-light-warning';
            } elseif ($data->event == 'approve' || $data->event == 'approved') {
                $data->color = 'badge-light-info';
            } elseif ($data->event == 'upload' || $data->event == 'uploaded') {
                $data->color = 'badge-light-primary';
            } elseif ($data->event == 'export') {
                $data->color = 'badge-light-dark';
            } else {
                $data->color = 'badge-light-danger';
            }

            $data->noPage = $noPage++;
            $data->nama = $data->user != null ? $data->user->first_name . ' ' . $data->user->last_name : ' - ';
        }

        return view('logs.activity', compact('datas'));
    }

    function transformJsonToDesiredFormat($jsonData, $event = '')
    {
        $data = json_decode($jsonData, true);

        $transformedData = [
            'atribute' => [],
            'old' => []
        ];

        if (isset($data['attributes'])) {
            foreach ($data['attributes'] as $attrTitle => $attrValue) {
                $transformedData['atribute'][] = [
                    'title' => $attrTitle,
                    'value' => $attrValue
                ];
            }
        }

        if (isset($data['old'])) {
            foreach ($data['old'] as $oldTitle => $oldValue) {
                $transformedData['old'][] = [
                    'title' => $oldTitle,
                    'value' => $oldValue
                ];
            }
        }

        if (empty($transformedData['atribute']) && empty($transformedData['old'])) {
            switch ($event) {
                case 'create':
                case 'update':
                    foreach ($data as $attrTitle => $attrValue) {
                        $transformedData['atribute'][] = [
                            'title' => $attrTitle,
                            'value' => $attrValue
                        ];
                    }
                    break;
                case 'delete':
                    foreach ($data as $attrTitle => $attrValue) {
                        $transformedData['old'][] = [
                            'title' => $attrTitle,
                            'value' => $attrValue
                        ];
                    }
                    break;
            }
        }

        return $transformedData;
    }

    public function showActivity($id)
    {
        $data = ActivityLog::find($id);
        $data->json = $this->transformJsonToDesiredFormat($data->properties, $data->event);

        return response()->json($data->json);
    }
}
