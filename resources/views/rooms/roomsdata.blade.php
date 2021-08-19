<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Room List</title>

    <style>
        #table{
            font-family:Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td, #table th{
            border: 1px solid #dddddd;
        }

        
        #title{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 id="title">Rooms List</h2>
    <table id="table">
        <thead>
            <tr>
                <th>Room Id</th>
                <th>Room Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roomQuery as $room)
                <tr id="record_id_{{$room->id}}">
                    <td>{{$room->room_id}}</td>
                    <td>{{$room->roomDes}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>