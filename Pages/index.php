<?php 
$link = 'Template/CSS/styles.css';
include 'Template/navbar.php';
?>
<div class="video-wrapper">
  <video autoplay muted loop id="background-video">
    <source class="vid" src="../media/720pFH.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</div>
<section class="hero-sec">
  <div class="hero">
    <div class="comp-name">
      <p>SOCIAL MEDIA COMPAIGN</p>
    </div>
    <div class="hero-text typing-container">
      <div class="typing-container"><span id="typed-text"></span><span id="cursor">|</span></div>
    </div>
  </div>
</section>
<button id="video-control" onclick="toggleVideo()">Pause</button>
<div id="content-source" style="display:none;">
  <p>Aiming to create a safe online environment for every Teenager</p>
</div>
<section class="MostPopular">
    <div class="content">
        <div class="cont-head"><h1 class="head-text">Twitter</h1></div>
        <div class="cont-body"> <p class="body-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit fuga itaque cupiditate, us iste non.</p></div>
        <div>
            <div><</div>
            <div>></div>
        </div>
    </div>
    <div class="Tabs">
      <div>twitter</div>
      <div>Whatsapp</div>
      <div>Facebook</div>
      <div>Reddit</div>
    </div>
</section>

  <script src="Template/JS/routes.js"></script>
  <script src="Template/JS/Javascript.js"></script>