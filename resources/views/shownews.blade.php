<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shownews</title>
</head>
<body>
    News title : {{ $news->newstitle}}
    <br>
    author : {{ $news->author}}
    <br>
    content : {{ $news->content}}
    <br>
    Published : {{ $news->published}}
    <br>

</body>
</html>