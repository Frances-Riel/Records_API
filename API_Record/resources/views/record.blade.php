<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #333;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
        button {
            margin-top: 20px;
            background-color: #d32f2f;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #b71c1c;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Records</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody id="content"></tbody>
    </table>
    <button id="logout">Logout</button>
    <script>
        var token = localStorage.getItem('token')
        var content = document.getElementById('content')
        var logoutButton = document.getElementById('logout');
        if(token == null){
            var route = "{{route('index')}}";
            window.location = route;
        }

        fetch('http://localhost:8000/api/records',{
            method:'GET',
            headers:{
                'Authorization':'Bearer '+token
            }
        })
        .then(response => response.json())
        .then(data => {
            var html = ""
            data.forEach(function(value){
                html += `
                    <tr>
                        <td>${value.id}</td>
                        <td>${value.name}</td>
                        <td>${value.gender}</td>
                        <td>${value.age}</td>
                        <td>${value.address}</td>
                        <td>${value.created_at}</td>
                        <td>${value.updated_at}</td>
                    </tr>
                `
            })

            content.innerHTML = html
        })
        .catch(error => {
            console.error('Error during fetch:', error);
        });

        logoutButton.addEventListener('click', function() {
            localStorage.removeItem('token');
            var route = "{{route('index')}}";
            window.location = route;
        });

    </script>
</body>
</html>
