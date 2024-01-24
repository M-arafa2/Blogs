<!DOCTYPE html>

<html>

<head>

    <title>{{ $message->first_name }}</title>

</head>

<body>
    <table frame="border" rules="all">
        <tr>
            <th>الاسم</th>
            <td>{{ $message->first_name }} {{ $message->last_name }} </td>
        </tr>
        <tr>
            <th>الجوال</th>
            <td>{{ $message->phone }} </td>
        </tr>
        <tr>
            <th>البريد</th>
            <td>{{ $message->email }} </td>
        </tr>
        <tr>
            <th>الرسالة</th>
            <td>{{ $message->message }} </td>
        </tr>
    </table>
</body>
</html>
