<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                               
                                <div class="card-body">
                                    
                                    <h2>HTML Form </h2>
                                    @if(isset($data))
                                    <form>
                                        @csrf
                                        @foreach($data as $item)
                                        @if($item->field="text")
                                        <label>{{$item->label}}</strong></label>
                                        <input type="{{$item->field}}" name="{{$item->sample}}" class="form-control">
                                       <br>
                                        @elseif($item->field="number")
                                        <label>{{$item->label}} <strong style="color:red">*</strong></label>
                                        <input type="{{$item->field}}" name="{{$item->sample}}" class="form-control">
                                       
                                            <br>
                                        @elseif($item->field="select")

                                        <label>{{$item->label}}</label>
                                        <select class="form-control" name="{{$item->sample}}">
                                            <option value="0">Select field</option>
                                            
                                            @foreach(explode(',',$item->comments) as $key => $item)
                                             <option value="{{$item}}">{{$item}}</option>
                                            @endforeach
                                        </select>
                                       <br>
                                        @endif
                                        </div>
                                        @endforeach
                                        <input type="button" name="submit" value="Submit" style="color:green">
                                    </form>
                                    @else 
                                        <b styel="color:blue;">No Fields added</b>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
