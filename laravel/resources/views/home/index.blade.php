@extends('home.layout.default')

@section('title')
    ホームページ
@stop

@section('content')
    <body class="lock-screen" onload="startTime()">
    <div class="lock-wrapper">
        <div id="time"></div>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong style="color: #fff">{{ $error }}</strong>
                </div>
            @endforeach
        @endif
        <div class="lock-box text-center">
            <div class="lock-name">Welcome Chat System</div>
            <img src="images/index-logo.png" alt="lock avatar"/>
            <div class="lock-pwd">
                {!! Form::open(array('url' => '/', 'method' => 'post', 'class'=>'form-inline', 'role'=>'form')) !!}
                    <div class="form-group">
                        <input type="text" placeholder="Username" id="exampleInputPassword2" class="form-control lock-input" name="username">
                        <button class="btn btn-lock" type="submit">
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script>
        function startTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('time').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){startTime()},500);
        }
        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
    </script>
    </body>
@stop