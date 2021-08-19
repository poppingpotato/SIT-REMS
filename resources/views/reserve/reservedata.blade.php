<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Reservation List</title>

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
    <h2 id="title">Reservation List</h2>
    <table id="table">
        <thead>
            <tr>
                <th>Employee Id</th>
                <th>Reserved Equipment</th>
                <th>Quantity</th>
                <th>Reserved Room</th>
                <th>Start</th>
                <th>End</th>
                <th>ReservedBy_SA_ID</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ReserveQuery as $reserve)  
                <tr>
                    <td>{{$reserve->employee_id}}</td>
                    <td>{{$reserve->eq_r_id}}</td>
                    <td>{{$reserve->quantity}}</td>
                    <td>{{$reserve->room_id}}</td>
                    <td>{{$reserve->start}}</td>
                    <td>{{$reserve->end}}</td>
                    <td>{{$reserve->ReservedBy_SA_ID}}</td>
                    @if($reserve->status == 1)
                    <td>Reserved</td>
                    @else
                    <td>Cancelled</td>
                    @endif
                    {{-- <td>{{$reserve->status}}</td> --}}

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>