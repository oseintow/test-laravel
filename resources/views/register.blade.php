<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    @if (session()->has('message'))
        <div class="flash">
            {{ session()->get('message') }}
        </div>
    @endif

    {!! Form::open() !!}

        {!! Form::label('email','Email:') !!}}
        {!! Form::text('email') !!}

        {!! Form::label('password', 'Password:') !!}
        {!! Form::text('password') !!}

        {!! Form::submit('Register Now') !!}

    {!! Form::close() !!}
</body>
</html>