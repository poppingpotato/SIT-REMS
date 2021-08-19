<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

    <title>Users-List</title>
</head>
<body>
    <h2 id="title">Users List</h2>
    <table id="table">
        <thead>
            <tr>
                <th>Id Number</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Priveleges</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userQuery as $user)  
                <tr>
                    <td>{{$user->idNumber}}</td>
                    <td>{{$user->lastName}}</td>
                    <td>{{$user->firstName}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->idNumber == 2020 && $user->is_admin == 1)
                    <td>Admin</td>
                    @elseif($user->is_admin == 1)
                        <td>Admin</td>
                    @else
                        <td>User</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>