<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>quizy</title>
    <link
        href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>

<body>
    <img src="/img/{{ $question->image }}" alt="">
    <form action="/{{ request()->path() }}" method="POST">
        @csrf
        <table>
            <tr>
                <th>選択肢</th>
                <th>正解</th>
            </tr>

            @if (count($errors) > 0)
                <div class="errormessagebox">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach ($question->choices as $choice)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>
                        <input type="text" name="name{{ $loop->index }}" value="{{ $choice->name }}"
                            {{-- required="required" --}} {{-- maxlength="20" --}}>
                    </td>
                    <td>
                        <input type="radio" name="valid" value="{{ $loop->index }}"
                            @if ($choice->valid) checked @endif {{-- required="required" --}}>
                    </td>
                </tr>
            @endforeach
        </table>
        <input type="submit" value="更新">
    </form>
</body>

</html>
