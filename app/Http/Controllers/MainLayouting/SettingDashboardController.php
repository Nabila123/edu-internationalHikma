<?php

namespace App\Http\Controllers\MainLayouting;

use App\Http\Controllers\Controller;
use App\Models\Main\Logos;
use App\Models\Main\SeetingDashboard\Caraosel;
use App\Models\Main\SeetingDashboard\SideHeader;
use App\Models\Main\SettingDashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class SettingDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        abort_if(Gate::denies('main-layouting-setting-read'), 403);

        $dataLogos = Logos::all();
        foreach ($dataLogos as $logo) {
            $logo->logo = getStorageImage('media/logo', $logo->logo, 'assets/media/avatars/logo-none.jpg');

            if ($logo->kategori == "utama") {
                $logo->posisi = "Tab Navigasi Bar";
            } elseif ($logo->kategori == "header") {
                $logo->posisi = "Header Navigasi";
            } else {
                $logo->posisi = "Component Content";
            }
        }
        $datas['logo'] = $dataLogos;

        $dataCaraosel = Caraosel::paginate(25);
        $noPage = ($dataCaraosel->currentPage() - 1) * $dataCaraosel->perPage() + 1;
        foreach ($dataCaraosel as $caraosel) {
            $caraosel->noPage = $noPage++;
            $caraosel->image = getStorageImage('media/caraosel', $caraosel->image, 'assets/media/avatars/logo-none.jpg');
            $caraosel->status = $caraosel->isActive == 1 ? 'Aktif' : 'Tidak Aktif';
        }
        $datas['caraosel'] = $dataCaraosel;

        $dataSideHeader = SideHeader::all();
        foreach ($dataSideHeader as $side) {
            $side->status = $side->isActive == 1 ? 'Aktif' : 'Tidak Aktif';
        }
        $datas['sideHeader'] = [
            'data' => $dataSideHeader,
            'total' => $dataSideHeader->count(),
        ];

        return view('MainLayouting.SettingDashboard.index', compact('datas'));
    }

    // public function createHeader(Request $request)
    // {
    //     abort_if(Gate::denies('main-layouting-setting-create'), 403);

    //     try {
    //         DB::beginTransaction();
    //         $validator = Validator::make($request->all(), [
    //             'judul' => [
    //                 'required'
    //             ],
    //             'deskripsi' => [
    //                 'required'
    //             ]
    //         ], [
    //             'judul.required' => 'Judul Tidak Boleh Kosong !!',
    //             'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong !!',
    //         ]);

    //         if ($validator->fails()) {
    //             $errors = $validator->errors()->all();
    //             foreach ($errors as $error) {
    //                 toast($error, 'warning')->autoClose(5000)->timerProgressBar();
    //             }
    //             return redirect()->back();
    //         }

    //         $headerData = SettingDashboard::first();
    //         $dataHeader = null;

    //         if ($headerData->header != null) {
    //             $dataHeader = json_decode($headerData->header);

    //             foreach ($request->repeaterCreateBmt as $subArray) {
    //                 foreach ($subArray as $value) {
    //                     if ($value != null) {
    //                         array_push($dataHeader, $value);
    //                     }
    //                 }
    //             }
    //         }

    //         $dataHeader[] = [
    //             'judul' => $request->judul,
    //             'deskripsi' => $request->deskripsi
    //         ];

    //         if ($dataHeader != null) {
    //             $dataHeader = json_encode($dataHeader);
    //         }

    //         $paramHeader = [
    //             'header' => $dataHeader,
    //             'userId' => getUserId()
    //         ];

    //         $dataHeaders = SettingDashboard::settingDashboardUpdateField($headerData->id ?? '', $paramHeader);
    //         if ($dataHeaders['status'] != 'success') {
    //             toast('Data Header Gagal DiSimpan !!', 'warning')->autoClose(5000)->timerProgressBar();
    //             return redirect()->back()->withInput();
    //         }

    //         DB::commit();
    //         toast('Data Header Berhasil Disimpan', 'success')->autoClose(5000)->timerProgressBar();
    //         return redirect()->back();
    //     } catch (\Throwable $th) {
    //         DB::rollback();

    //         Log::error('[ Setting Dashboard ] - Header', [
    //             'Error' => $th->getMessage(),
    //             'Exception' => $th,
    //             'Stacktrace' => $th->getTraceAsString()
    //         ]);

    //         if (env('APP_ENV') != 'production') {
    //             dd($th);
    //         } else {
    //             toast('Terjadi Kesalahan !!!', 'warning')->autoClose(5000)->timerProgressBar();
    //         }
    //         return redirect()->back();
    //     }
    // }
}
