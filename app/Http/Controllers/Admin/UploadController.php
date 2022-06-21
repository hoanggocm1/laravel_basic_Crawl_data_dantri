<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\UploadService;

class UploadController extends Controller
{
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function store(Request $request)
    {
        $url = $this->uploadService->store($request);

        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url' => $url,
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function stores(Request $request)
    {

        $url = $this->uploadService->stores($request);

        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url' => $url,
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function store_slider(Request $request)
    {
        $url = $this->uploadService->store_slider($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url' => $url,
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function store_avatarAdmin(Request $request)
    {
        $url = $this->uploadService->store_avatarAdmin($request);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url' => $url,
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function testimage()
    {
        return view('test');
    }
    public function testimagestore(Request $request)
    {
        return dd($request->input('ok'));
    }
}
