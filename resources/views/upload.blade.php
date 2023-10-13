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
                <input type="file" name="file" required>
            </div>
            <div>
                <input type="submit" value="送信する">
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
    </div>
</body>

</html>