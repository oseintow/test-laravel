<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <p>good</p>
    <h1>Please Login</h1>
    <h1>Hello World!</h1>

    <div>
        <p class="question">How are you?</p>
        <p>Yep</p>
    </div>

    <ul class="tasks">
        <li>cooking</li>
        <li>coding</li>
        <li>cleaning</li>
    </ul>

    <form action="">
        <input type="text" name="first">
        <input type="text" name="last">
        <button type="submit">Submit</button>
    </form>


    <form action="login" method="post">
        {{csrf_token()}}

        <div>
            <label for="email">Email</label>
            <input type="text" name="email">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        
        <div>
            <input type="submit" value="Login">
        </div>

    </form>
</body>
</html>