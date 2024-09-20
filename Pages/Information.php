<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Div with Background Video</title>
    <style>
        .video-background {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .video-background video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translateX(-50%) translateY(-50%);
            z-index: -1;
        }

        .content {
            position: relative;
            z-index: 1;
            text-align: center;
            padding-top: 50vh;
            color: white;
        }
    </style>
</head>
<body>
    <div class="video-background">
        <video autoplay loop muted playsinline>
            <source src="../media/720pFH.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <?php include'./Template/navbar.php' ?>
        <div class="content">
            <h1>Welcome to My Website</h1>
            <p>This div has a video background!</p>
        </div>
    </div>
</body>
</html>