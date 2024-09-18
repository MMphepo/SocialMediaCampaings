<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Template/CSS/styles.css">
</head>

<body>
    <nav>
        <div class="icon">SMC</div>
        <div class="links">
            <ul>
                <li>Home</li>
                <li onclick="toContact()">Contact</li>
                <li onclick="toMostPop()" >Popular Apps</li>
                <li>
                    <div class="dropdown">
                        <div class="dropbtn" onclick="toInfo()">Information</div>
                        <div class="dropdown-content">
                            <a onclick="toParents()" >How Parents can Help</a>
                            <a onclick="toLive()">Livestreaming</a>
                            <a onclick="toLegislation()">Legislation</a>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="profile">
            <?php
            if (isset($_SESSION['user_id'])) {
                echo "<canvas id='contactIcon' width='50' height='50'></canvas>";
            } else {
                echo "<a onclick='toLogin()'>Login</a> | <a onclick='toSignUp()'>SignUp</a>";
            }
            ?>
        </div>

        <div class="search"><canvas id="searchIcon" width="50" height="50"></canvas></div>
    </nav>

   
    <!-- <script>
    function checkLoginStatus(targetPage) {
    fetch('check_login.php', {
        method: 'GET',
        credentials: 'same-origin' // This is important for including cookies
    })
    .then(response => response.json())
    .then(data => {
        if (data.loggedIn) {
            // User is logged in, proceed to the target page
            window.location.href = targetPage;
        } else {
            // User is not logged in, show login form or message
            showLoginForm();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Handle error (e.g., show an error message to the user)
    });
}

function showLoginForm() {
    // This function should display your login form
    // You can show a modal, update a div, etc.
    document.getElementById('loginFormContainer').style.display = 'block';
}

// Use this function for navigation instead of direct links
// For example: <button onclick="checkLoginStatus('protected_page.php')">Go to Protected Page</button>
</script>    -->