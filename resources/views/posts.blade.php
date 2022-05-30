<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Posts</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    </head>
    <body>
        <div class="wrapper">
            <div class="filters">
                <form> 
                    <fieldset>
                        <legend>Фильтры</legend>
                        <div class="d-flex justify-content-evenly">
                            <input class="form-control me-2" type="text" name="symbolcode" placeholder = "Символьный код"></input>
                            <input class="form-control me-2" type="text" name="name" placeholder = "Введите название статьи"></input>
                            <input class="form-control me-2" type="text" name="tags" placeholder = "Введите название тега"></input>
                            <button class="btn btn-primary" type="submit">Поиск</button>                                
                        </div>
                    </fieldset> 
                </form>
            </div>
            
            <a class="btn btn-link wdth-2" href="http://127.0.0.1:8000/posts">Все статьи</a>

            <table>
                <h1>Статьи</h1>
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
                    @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->name }}</td>
                        <td>{{ $article->symbolcode }}</td>
                        <td>{{ $article->content }}</td>
                        <td>{{ $article->create_time }}</td>
                        <td>{{ $article->author }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>                
            </table>
            {!! $articles->appends(Request::except('page'))->render('pagination::bootstrap-5') !!}

            <table width="400">
                <h1>Теги</h1>
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
    </body>
</html>