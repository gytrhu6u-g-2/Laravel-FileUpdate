<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * 画像アップロード
     */
    public function upload(Request $request)
    {
        $data = $request->all();

        $fileName = $data['file'];
        dd($fileName);
    }
}
