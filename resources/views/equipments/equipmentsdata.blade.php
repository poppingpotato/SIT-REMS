<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

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
    <table id="table">
        <thead>
            <tr>
                <th>Equipment Id</th>
                <th>Equipment Name</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
          
            @foreach($equipmentQuery as $equipment)  
                <tr>
                    <td>{{$equipment->equipment_id}}</td>
                    <td>{{$equipment->equipmentName}}</td>
                    <td>{{$equipment->quantity}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>