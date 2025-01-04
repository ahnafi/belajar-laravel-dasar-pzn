<!doctype html>
<html lang="en">
<head>
    <title>form</title>
</head>
<body>
<form action="/form" method="post">
    <label for="name">
        <input type="text" name="name" id="">
    </label>
    <input type="submit" value="say hello">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
</form>
</body>
</html>
