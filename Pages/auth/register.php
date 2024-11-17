<?php
$title = "";
$style = "";

?>

<head>
    <link rel="stylesheet" href="../Template/CSS/styles.css">
    <title>Contact Us Page</title>
</head>

<body>
    <div id="message" style="display: none;">Registration successful!</div>
    <section class="register">
        <div class="reg-left">
            <div class="reg-welcome">
                <div>
                    Let's Get Started
                </div>
            </div>
        </div>
        <div class="reg-right">
            <h1>Create your Account</h1>
            <form id="registerForm" action="../../controls/auth/registerControl.php" method="post">
                <div class="reg-names">
                    <div>
                        <label for="firstname">First name</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>
                    </div>
                    <div>
                        <label for="lastname">Last name</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>
                    </div>
                </div>
                <div class="reg-names">
                    <div class="reg-input">
                        <label for="date">Date of Birt</label>
                        <input type="date" id="date" name="dob" required>
                    </div>
                    <div class="reg-input">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="reg-input">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your Password" required>
                </div>
                <div class="reg-input">
                    <label for="password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your Password" required>
                </div>
                <div class="policy" id="policy">
                    <div>
                        <input type="submit" value="Register" id="submit">
                    </div>
                    <div>
                        <input class="clickable" type="checkbox" name="policy" id="policybox">
                        <p>I agree with the Terms and <a href="../../media/Privacy Policy.pdf"> privacy policy</a></p>
                    </div>
                </div>
                <hr>
                <div class="g_id_signin"
                    data-type="standard"
                    data-size="large"
                    data-theme="outline"
                    data-text="sign_in_with"
                    data-shape="rectangular"
                    data-logo_alignment="left">
                </div>
                <div>Already have an acount <a href="./login.php"> Login</a></div>
            </form>
        </div>
    </section>
    <div id="g_id_onload"
        data-client_id="601717773215-ki89r8n493im5u5kir9udc4h803qsjrk.apps.googleusercontent.com"
        data-login_uri="https://redirectmeto.com/http://localhost:80/SocialMediaCompany/SocialMediaCampaingks/Pages/"
        data-auto_prompt="false">
    </div>
    <script src="../Template/JS/Javascript.js"></script>
    <script src="../Template/JS/routes.js"></script>
    <script>
        customCursor();
    </script>
    <script>
        const body = document.getElementsByTagName('body')[0];
        body.style.backgroundColor = 'rgb(121 135 194)';;
    </script>
    <script>
        function handleCredentialResponse(response) {
            // Send the credential to backend for verification
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



    <script>
        document.getElementById("registerForm").addEventListener("submit", async function(event) {
            event.preventDefault(); // Prevent form from submitting the default way and refreshing the page

            // Collect form data
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm_password").value;
            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return;

            } else if (password.length >= 8 && password.length <= 20) {

                const formData = new FormData(event.target);

                try {
                    // Send form data to the bacend using fetch
                    const response = await fetch("../../controls/auth/registerControl.php", {
                        method: "POST",
                        body: formData,
                    });

                    // Handle the response
                    const result = await response.json();
                    if (result.success) {
                        // Registration successful, you can display a success message or redirect the user
                        const message = document.getElementById('message');
                        message.style.display = 'block';
                        setTimeout(function() {
                            message.style.display = 'none';
                            window.location.href = "./login.php";
                        }, 5000);
                    } else {
                        // Display error message
                        alert("Error: " + result.message);
                    }
                } catch (error) {
                    // Handle any errors that occurred during the fetch
                    console.error("Error:", error);
                    alert("An error occurred while processing your request.");
                }
            }else{
                alert("Password must be between 8 and 20 characters long!");
            }
        });
        
    </script>

    <script src="https://accounts.google.com/gsi/client" async defer></script>