<?php session_start();
$title= "login page";
echo $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

</head>

<body>
    <h2>Login Page</h2>
    <form id="loginForm">
        <input type="email" id="email" name="email" required>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
        <div id="errorMessage"></div>

        <head>
            <meta name="google-signin-client_id" content="601717773215-ki89r8n493im5u5kir9udc4h803qsjrk.apps.googleusercontent.com">

        </head>

        <body>
            <div id="g_id_onload"
                data-client_id="601717773215-ki89r8n493im5u5kir9udc4h803qsjrk.apps.googleusercontent.com"
                data-login_uri="https://redirectmeto.com/http://localhost:80/SocialMediaCompany/SocialMediaCampaingks/Pages/"
                data-auto_prompt="false">
            </div>

            <div class="g_id_signin"
                data-type="standard"
                data-size="large"
                data-theme="outline"
                data-text="sign_in_with"
                data-shape="rectangular"
                data-logo_alignment="left">
            </div>

            <script>
                function handleCredentialResponse(response) {
                    // Send the credential to your backend for verification
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../../controls/auth/verify.php');
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.onload = function() {
                        console.log('Signed in as: ' + xhr.responseText);
                    };
                    xhr.send('credential=' + response.credential);
                }

                window.onload = function() {
                    google.accounts.id.initialize({
                        client_id: '601717773215-ki89r8n493im5u5kir9udc4h803qsjrk.apps.googleusercontent.com',
                        callback: handleCredentialResponse
                    });
                    google.accounts.id.renderButton(
                        document.getElementById('g_id_signin'), {
                            theme: 'outline',
                            size: 'large'
                        } // Customization attributes
                    );
                   
                    google.accounts.id.prompt(); // Automatically prompt for sign-in
                 
                }  
            </script>
            <script src="https://accounts.google.com/gsi/client" async defer></script>
        </body>

</html>