<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Employee List</title>

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
    <h2 id="title">Employee List</h2>
    <table id="table">
        <thead>
            <tr>
                <th>Employee Id</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employeeQuery as $employee)
                <tr id="record_id_{{$employee->id}}">
                    <td>{{$employee->employee_id}}</td>
                    <td>{{$employee->lastName}}</td>
                    <td>{{$employee->firstName}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>