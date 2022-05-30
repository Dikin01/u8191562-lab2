<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Post</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            

    </head>
    <body>
        @if($article != null)
        <div class="wrapper">
            <table>
                <caption>Статья</caption>
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Символьный код</th>
                        <th>Содержание</th>
                        <th>Дата создания</th>
                        <th>Автор</th>
                    </tr>
                </thead>
                <tbody>                
                    <tr>
                        <td>{{ $article->name }}</td>
                        <td>{{ $article->symbolcode }}</td>
                        <td>{{ $article->content }}</td>
                        <td>{{ $article->create_time }}</td>
                        <td>{{ $article->author }}</td>
                    </tr>                
                </tbody>
            </table>
            
            <table>
                <caption>Теги</caption>
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Символьный код</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->symbolcode }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <h2 class=message>Такая статья не найдена</h2>
        @endif
    </body>
</html>