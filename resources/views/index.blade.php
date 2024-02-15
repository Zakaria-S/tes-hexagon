<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Negara Asal</th>
                <th>Nama</th>
                <th>Id Manufaktur</th>
                <th>Nama Manufaktur</th>
                <th>Tipe Kendaraan</th>
            </tr>
        </thead>
        @foreach ($result->Results as $item)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$item->Country}}</td>
                        <td>{{$item->Mfr_CommonName}}</td>
                        <td>{{$item->Mfr_ID}}</td>
                        <td>{{$item->Mfr_Name}}</td>
                        <td>
                        @foreach($item->VehicleTypes as $v)
                            {{$v->Name . ', '}}
                        @endforeach
                        </td>
                    </tr>
        @endforeach
    </table>
</body>
</html>