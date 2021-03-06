<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home-toyStore</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            update product
        </div>

        <div>
            @foreach($products as $product)

            <form method="post" action="{{url('update/product/'.$product->id)}}">
               {{csrf_field()}}
               name:<input type="text" name="name" value="{{$product->name}}"><br>
               description:<input type="text" name="description" value="{{$product->description}}"><br>
               select category<select name="cat_id">

                       @foreach($categories as $category)
                           <?php
                           if($product->cname ==$category->cname ){
                               echo"<option value='$product->cat_id' selected>$product->cname</option>";
                           }
                           else
                               {
                                   echo"<option value='$category->id' >$category->cname</option>";
                               }
                           ?>
                       @endforeach
                       @endforeach

                   </select><br>
               <input type="submit" name="add" value="Update"><br>
           </form>
        </div>
    </div>
</div>
</body>
</html>
