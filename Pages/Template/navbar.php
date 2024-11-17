<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="Template/CSS/styles.css">
    <form id="newsletter" onsubmit="subscribeNewsletter(event)"></form>
</head>

<body>
    <nav id="navi">
        <div class="icon" onclick="toHome()">SMC</div>
        <div class="links">
            <ul>
                <li class="clickable" onclick="toHome()">Home</li>
                <li class="clickable" onclick="toContact()">Contact</li>
                <li class="clickable" onclick="toMostPop()">Popular Apps</li>
                <li class="clickable" onclick="toInfo()">Information</li>
                <li>
                    <div class="dropdown">
                        <div class="clickable dropbtn">More Info</div>
                        <div class="dropdown-content">
                            <a onclick="toParents()">How Parents can Help</a>
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
                $fname = $_SESSION['firstname'];
                $firstLetter = substr($fname, 0, 1);
                echo "
                    <div class='p-dropdown'>
                        <canvas id='contactIcon' class='clickable p-dropdown' width='50' height='50'></canvas>
                        <div class='p-dropdown-content'>
                            <div>
                                <div class='firstLetter'>$firstLetter</div>
                                <a href='Template/Profile.php'>Profile</a>
                            </div>
                            <div>
                                <a href='Template/Profile.php?param=hist'>History</a>
                            </div>
                            <div>
                                <a href='#' onclick='logout()'>Logout</a>
                            </div>
                        </div>
                    </div>
                ";
            } else {
                echo "<a onclick='toLogin()'>Login</a> | <a onclick='toSignUp()'>SignUp</a>";
            }
            ?>
        </div>

        <div class="clickable search"><canvas id="searchIcon" width="50" height="50"></canvas></div>
        <div class="links2">
            <div class="dropdown">
                <div class="dropbtn">More Info</div>
                <div class="dropdown-content">
                    <a onclick="toParents()">How Parents can Help</a>
                    <a onclick="toLive()">Livestreaming</a>
                    <a onclick="toLegislation()">Legislation</a>
                </div>
            </div>
        </div>
    </nav>