<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Borrow List</title>

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
    <h2 id="title">Borrow list</h2>
        <table id ="table">
            <thead>
                <tr>
                    <th>Employee Id</th>
                    <th>Student Id</th>
                    <th>Borrowed Equipment</th>
                    <th>Quantity</th>
                    <th>Start</th>
                    <th>Released By</th>
                    <th>End</th>
                    <th>Recieved By</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($BorrowQuery as $borrow)  
                    <tr>
                        <td>{{$borrow->employee_id}}</td>
                        <td>{{$borrow->student_id}}</td>
                        <td>{{$borrow->eq_b_id}}</td>
                        <td>{{$borrow->quantity}}</td>
                        <td>{{$borrow->start}}</td>
                        <td>{{$borrow->ReleasedBy_SA_ID}}</td>
                        <td>{{$borrow->end}}</td>
                        <td>{{$borrow->RecievedBy_SA_ID}}</td>
                        @if($borrow->status == "1")
                            <td>Borrowed</td>
                        @else 
                            <td>Returned</td>
                        @endif
    
                    </tr>
                @endforeach
            </tbody>
        </table>

</body>
</html>

