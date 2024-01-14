<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API-RECORD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            max-width: 100%;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 90%;
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 14px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div><button id="signin" type="submit">Sign In</button></div>
    </form>
<script>



        var signin = document.getElementById('signin');
        signin.addEventListener('click', function () {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            var formData = new FormData();

            formData.append('email', email);
            formData.append('password', password);

            fetch('http://127.0.0.1:8000/api/login', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.token !== undefined) {
                    localStorage.setItem('token', data.token);
                    window.location.href = '{{ route('record') }}';
                } else {
                    alert('Invalid');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

</script>

</body>


</html>

