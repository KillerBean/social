<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ URL::To('/css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::To('/css/style.css') }}" rel="stylesheet">
    <style>
        .table td, .table th{
            text-align: center;
        }
    </style>

</head>
<body>
    <div class="col-md-6 col-md-offset-3">
        <table class="table table-bordered">
            <thead>
                <tr class="info" style="text-align: center;">
                    <th>Users Count</th>
                    <th>Posts Count</th>
                </tr>
            </thead>
            <tbody>
                <tr class="active">
                    <td>{{\App\User::All()->Count()}}</td>
                    <td>{{\App\Post::All()->Count()}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr class="warning">
                    <th>Post id</th>
                    <th>Belongs to</th>
                    <th>created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Post::all() as $post)
                    <tr class="active">
                        <th scope="row">{{$post->id}}</th>
                        <td>{{\App\User::find($post->user_id)->name}}</td>
                        <td>{{$post->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
