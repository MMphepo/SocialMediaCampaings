<?php

?>
<?php include './Template/navbar.php' ?>
<div class="video-background">
  <video autoplay loop muted playsinline>
    <source src="../media/720pFH.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>


  <section class="hero-sec">
    <div class="hero">
      <div class="comp-name">
        <p>SOCIAL MEDIA COMPAIGN</p>
      </div>
      <div class="hero-text typing-container">
        <div class="typing-container"><span id="typed-text"></span><span id="cursor">|</span></div>
      </div>
    </div>
    <div class="herobox">
      <div class="cube">
        <div class="top-card"></div>
        <div>
          <span style="--i:0"></span>
          <span style="--i:1"></span>
          <span style="--i:2"></span>
          <span style="--i:3"></span>
        </div>
      </div>
    </div>
  </section>


  <div class="contents">
    <h1>Welcome to My Website</h1>
    <p>This div has a video background!</p>
  </div>
</div>

<section class="MostPopular section" id="scrollSection">
  <div class="top">
    <div class="content">
      <div class="cont-head">
        <h1 class="head-text" id="head-text">Whatsapp</h1>
      </div>
      <div class="cont-body" id="cont-body">
        <p class="body-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit fuga itaque cupiditate, us iste non.</p>
      </div>
    </div>
  </div>
  <div class="bottom">
    <div class="cards">
      <div class="card-1" onclick="twitter()"><img src="../media/twitter.png" alt=""></div>
      <div class="card-2"><img src="../media/Fb.png" alt=""></div>
      <div class="card-3"><img src="../media/Whatsapp.png" alt=""></div>
      <div class="card-4"><img src="../media/IG.png" alt=""></div>
    </div>
  </div>

  <div>
    <rssapp-carousel id="tjcy1UHfdQtlCQpm"></rssapp-carousel>
    <script src="https://widget.rss.app/v1/carousel.js" type="text/javascript" async></script>
  </div>
  <script>
    function twitter() {
      var headText = document.getElementById('head-text');
      headText.innerText = 'Twitter';
      headText.style.backgroundColor = 'rgba(0, 225, 255, 0.5)';
      headText.style.backdropFilter = 'blur(10px)';
      var contbody = document.getElementById('cont-body');
      contbody.style.backgroundColor = 'rgba(0, 225, 255, 0.5)';
      contbody.style.backdropFilter = 'blur(10px)';
    }
  </script>
</section>

<section class="Newsletter">
  <div class="news-pop">
    <h1>Subscribe</h1>
    <div class="newsText">Receive the latest emails on the most effective ways of online safety</div>
    <form>
      <input type="email" name="email" id="emailnewsletter" placeholder="Enter your email">
      <input type="submit" value="Subscribe">
    </form>
  </div>
</section>
<section>
  
</section>


<!-- <div class="video-wrapper">
  <video autoplay muted loop id="background-video">
    <source class="vid" src="../media/720pFH.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</div> -->
<!-- <section class="hero-sec">
  <div class="hero">
    <div class="comp-name">
      <p>SOCIAL MEDIA COMPAIGN</p>
    </div>
    <div class="hero-text typing-container">
      <div class="typing-container"><span id="typed-text"></span><span id="cursor">|</span></div>
    </div>
  </div>
</section> -->


<div id="content-source" style="display:none;">
  <p>Aiming to create a safe online environment for every Teenager</p>
</div>

<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Custom Cursor Example</title>
  <style>
    /* Paste the custom cursor CSS here */
    /* Custom cursor for the entire website */

    .custom-cursor,
    .custom-pointer {
      position: fixed;
      pointer-events: none;
      z-index: 9999;
      transition: opacity 0.3s ease;
    }

    .custom-cursor {
      width: 20px;
      height: 20px;
      border: 2px solid #000;
      border-radius: 50%;
      transform: translate(-50%, -50%);
    }

    .custom-pointer {
      width: 10px;
      height: 10px;
      background-color: #000;
      border-radius: 50%;
      transform: translate(-50%, -50%);
      opacity: 0;
    }

    /* Hide cursor on touch devices */
    @media (hover: none) and (pointer: coarse) {

      .custom-cursor,
      .custom-pointer {
        display: none;
      }
    }
  </style>
</head>





</html>

<script src="Template/JS/routes.js"></script>
<script src="Template/JS/Javascript.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Create custom cursor element
    const cursor = document.createElement('div');
    cursor.classList.add('custom-cursor');
    document.body.appendChild(cursor);

    // Create custom pointer element
    const pointer = document.createElement('div');
    pointer.classList.add('custom-pointer');
    document.body.appendChild(pointer);

    // Update cursor position
    document.addEventListener('mousemove', (e) => {
      cursor.style.left = e.clientX + 'px';
      cursor.style.top = e.clientY + 'px';
      pointer.style.left = e.clientX + 'px';
      pointer.style.top = e.clientY + 'px';
    });

    // Toggle pointer visibility
    document.addEventListener('mouseover', (e) => {
      if (e.target.matches('a, button, [role="button"], input[type="submit"], input[type="button"], .clickable')) {
        pointer.style.opacity = '1';
        cursor.style.opacity = '0';
      } else {
        pointer.style.opacity = '0';
        cursor.style.opacity = '1';
      }
    });

    // Hide default cursor
    document.body.style.cursor = 'none';
  });
  const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
      if (mutation.type === 'childList') {
        mutation.addedNodes.forEach((node) => {
          if (node.nodeType === Node.ELEMENT_NODE) {
            updateCursorStyle(node);
            node.querySelectorAll('a, button, [role="button"], input[type="submit"], input[type="button"], .clickable')
              .forEach(updateCursorStyle);
          }
        });
      }
    });
  });
</script>

<head>
            <meta name="google-signin-client_id" content="601717773215-ki89r8n493im5u5kir9udc4h803qsjrk.apps.googleusercontent.com">

        </head>

        <body>
            <div id="g_id_onload"
                data-client_id="601717773215-ki89r8n493im5u5kir9udc4h803qsjrk.apps.googleusercontent.com"
                data-login_uri="https://redirectmeto.com/http://localhost:80/SocialMediaCompany/SocialMediaCampaingks/Pages/"
                data-auto_prompt="false">
            </div>
            <script>
                function handleCredentialResponse(response) {
                    // Send the credential to your backend for verification
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '../controls/auth/verify.php');
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