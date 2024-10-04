<?php session_start();
$title = "login page";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../Template/CSS/styles.css">
    <meta name="google-signin-client_id" content="601717773215-ki89r8n493im5u5kir9udc4h803qsjrk.apps.googleusercontent.com">
</head>

<body>
    <section class="Login">
        <div class="log-left">
            <div class="log-top">
                <h2>Login</h2>
                <p>Please enter your login details to log in</p>
            </div>
            <form id="loginForm">
                <div class="log-input">
                    <input type="email" id="email" name="email" required>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="forgot">
                    <div>
                        <input type="checkbox" name="keep in" id="" value=" Keep me logged in">
                        <label for="keep in">Keep me logged in</label>
                    </div>
                    <a href="#">Forgot Password?</a>
                </div>
                <input type="submit" value="Login">
                <div class="dont-have-account">
                    Dont have an account? <a href="./register.php">Create account</a>
                </div>


                <div class="log-line">
                    <hr>
                    <p>or</p>
                    <hr>
                </div>
                <div class="google">
                    <div class="g_id_signin"
                        data-type="standard"
                        data-size="large"
                        data-theme="outline"
                        data-text="sign_in_with"
                        data-shape="rectangular"
                        data-logo_alignment="left">
                    </div>
                </div>


                <div id="g_id_onload"
                    data-client_id="601717773215-ki89r8n493im5u5kir9udc4h803qsjrk.apps.googleusercontent.com"
                    data-login_uri="https://redirectmeto.com/http://localhost:80/SocialMediaCompany/SocialMediaCampaingks/Pages/"
                    data-auto_prompt="false">
                </div>


            </form>
        </div>
        <div class="log-right">
            <div class="log-welcome">
                <div>Welcome Back</div>
            </div>
        </div>
    </section>

    <script>
        const body = document.getElementsByTagName('body')[0];
        body.style.backgroundColor = 'rgb(121 135 194)';;
    </script>
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
    <script src="../Template/JS/Javascript.js"></script>
    <script src="../Template/JS/routes.js"></script>
    <script>
        customCursor();
    </script>
</body>

</html>