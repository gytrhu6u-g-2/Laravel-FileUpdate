<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * 画像アップロード処理
     * @param file
     */
    public function upload(Request $request)
    {
        $data = $request->all();
        // 最大データサイズ
        $max_file_size = $data['MAX_FILE_SIZE'];

        // ファイル関連の取得
        $fileName = basename($_FILES['file']['name']);
        $full_path = $_FILES['file']['full_path'];
        $type = $_FILES['file']['type'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $error = $_FILES['file']['error'];
        $size = $_FILES['file']['size'];

        // アップロード先のパス
        $upload_path = '/Users/koki/gytrhu6u/images/';

        // 保存名
        $save_filename = date('YmdHis') . $fileName;

        // エラーメッセージ
        $err_msgs = array();

        // ファイルサイズのバリデーション サイズが1MB未満か
        if ((int)$max_file_size < $size || $error == 2) {
            $err_msgs['err_size'] = 'ファイルサイズが1MBを超えています。';
        }

        // 拡張子は画像形式か
        $allow_ext = array('jpg', 'jpeg', 'png');
        // 拡張子の取得
        $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

        // 送信された画像の拡張子が配列に含まれているか
        if (!in_array(strtolower($file_ext), $allow_ext)) {
            $err_msgs['extension'] = '拡張子が異なります。';
        }

        // ファイルが存在するか
        if (is_uploaded_file($tmp_name)) {
            // ファイルの保存先指定
            if (move_uploaded_file($tmp_name, $upload_path . $save_filename)) {
                // DBにパスの保存
            } else {
                $err_msgs['upload'] = '保存に失敗しました。';
            }
        } else {
            $err_msgs['upload'] = 'ファイルが存在しません。';
        }
    }
}
