<?php
$title = "Home Page";
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
        <div class="top-card">SMC</div>
        <div>
          <span class="my-span" >
            <img src="../media/whatsappblackicon.png" alt="">
          </span>
          <span class="my-span" >
            <img src="../media/IG.png" alt="">
          </span>
          <span class="my-span" >
            <img src="../media/blackemailicon.png" alt="">
          </span>
          <span class="my-span" >
            <img src="../media/twitter.png" alt="">
          </span>
        </div>
      </div>
    </div>
  </section>


  <div class="contents">
    <h1>Welcome to My Website</h1>
    <p>This div has a video background!</p>
  </div>
</div>
<div class="Most-pop-head">
  <h1>Most Popular Social Media Platforms</h1>
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
      <div class="card-2" onclick="facebook()"><img src="../media/Fb.png" alt=""></div>
      <div class="card-3" onclick="whatsapp()"><img src="../media/Whatsapp.png" alt=""></div>
      <div class="card-4" onclick="instagram()"><img src="../media/IG.png" alt=""></div>
    </div>
  </div>

  <script>
    function twitter() {
      var headText = document.getElementById('head-text');
      headText.innerText = 'Twitter';
      headText.style.removeProperty('background');
      headText.style.removeProperty('opacity');
      headText.style.backgroundColor = 'rgb(49 255 236 / 68%)';
      headText.style.backdropFilter = 'blur(10px)';

      var contbody = document.getElementById('cont-body');
      contbody.style.removeProperty('background');
      contbody.style.removeProperty('opacity');
      contbody.style.backgroundColor = 'rgb(49 255 236 / 68%)';
      contbody.style.backdropFilter = 'blur(10px)';
    }

    function facebook() {
      var headText = document.getElementById('head-text');
      headText.innerText = 'Facebook';
      headText.style.removeProperty('background');
      headText.style.removeProperty('opacity');
      headText.style.backgroundColor = 'rgb(8 102 255 / 50%)';
      headText.style.backdropFilter = 'blur(10px)';

      var contbody = document.getElementById('cont-body');
      contbody.style.removeProperty('background');
      contbody.style.removeProperty('opacity');
      contbody.style.backgroundColor = 'rgb(8 102 255 / 50%)';
      contbody.style.backdropFilter = 'blur(10px)';
    }

    function whatsapp() {
      var headText = document.getElementById('head-text');
      headText.innerText = 'Whatsapp';
      headText.style.removeProperty('background');
      headText.style.removeProperty('opacity');
      headText.style.backgroundColor = 'rgb(11 215 63 / 50%)';
      headText.style.backdropFilter = 'blur(10px)';

      var contbody = document.getElementById('cont-body');
      contbody.style.removeProperty('background');
      contbody.style.removeProperty('opacity');
      contbody.style.backgroundColor = 'rgb(11 215 63 / 50%)';
      contbody.style.backdropFilter = 'blur(10px)';
    }

    function instagram() {
      var headText = document.getElementById('head-text');
      headText.innerText = 'Instagram';
      headText.style.opacity = 0.5;
      headText.style.background = 'linear-gradient(23deg, #ec8211, #e6683c, #dc2743, #cc2366, #d8139a)';
      headText.style.backdropFilter = 'blur(10px)';
      var contbody = document.getElementById('cont-body');
      contbody.style.opacity = 0.5;
      contbody.style.background = 'linear-gradient(23deg, #ec8211, #e6683c, #dc2743, #cc2366, #d8139a)';
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
<section class="rssfeed">
<div class="tagshop" style="width:100%;height:100%;overflow: auto;">
  <div class="tagshop-socialwall" data-wall-id="17879" data-source="website"></div>
  <script src="https://widget.tagshop.ai/embed-lite.min.js" type="text/javascript"></script>
</div>
</section>


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
  </style>
</head>





</html>

<script src="Template/JS/routes.js"></script>
<script src="Template/JS/Javascript.js"></script>
<script>
  activityHistory();
  customCursor();
  typer();
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