<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- <meta charset="utf-8"> --}}
</head>
<body>
<p>من: {{$email}}</p>
<p>الاسم: {{$name}}</p>
<p>العنوان: {{$subject}}</p>
<p>الرسالة: {{$messagg}}</p>

</body>
</html>
