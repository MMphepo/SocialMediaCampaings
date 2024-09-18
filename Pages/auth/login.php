<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

</head>

<body>
    <h2>Login Page</h2>
    <!-- <form id="loginForm" action="../../controls/auth/login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form> -->
    <form id="loginForm">
        <input type="email" id="email" name="email" required>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
        <div id="errorMessage"></div>
    </form>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            login(email, password);
        });

        function login(email, password) {
            fetch('../../controls/auth/loginControl.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        email,
                        password
                    }),
                })
                .then(response => response.json())
                .then(data => handleLoginResponse(data))
                .catch(error => console.error('Error:', error));
        }

        function handleLoginResponse(data) {
            const errorMessage = document.getElementById('errorMessage');

            if (data.success) {
                window.location.href = '../index.php';
            } else {
                errorMessage.textContent = data.error;
            }
        }
    </script>
</body>

</html>