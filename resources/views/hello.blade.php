<!DOCTYPE html>
<html>

<head></head>

<body>
    <h1>Personal Profile</h1>
    @foreach($anotherMessage as $key => $info)
    <p>{{ $key }}: {{ $info }}</p>
    @endforeach
    <h1>Object loop below</h1>
    @foreach($objectHere as $key => $info)
    <p>{{ $key }}: {{ $info }}</p>
    @endforeach
</body>

</html>