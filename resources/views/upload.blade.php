<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ファイルアップロード</title>
</head>

<body>
    <div>
        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                {{-- accept="image/*"　画像だけを許容 --}}
                <input type="file" name="file" accept="image/*" required>
                {{-- ファイルの最大値 --}}
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
            </div>
            <div>
                <input type="submit" value="送信する">
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
    </div>
</body>

</html>