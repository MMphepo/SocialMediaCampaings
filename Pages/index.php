<?php
$link = 'Template/CSS/styles.css';
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
<section class="MostPopular">
  <div class="top">
    <div class="content">
      <div class="cont-head">
        <h1 class="head-text">Whatsapp</h1>
      </div>
      <div class="cont-body">
        <p class="body-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit fuga itaque cupiditate, us iste non.</p>
      </div>
    </div>
  </div>
  <div class="bottom">
    <div class="cards">
      <div class="card-1"><img src="../media/twitter.png" alt=""></div>
      <div class="card-2"><img src="../media/Fb.png" alt=""></div>
      <div class="card-3"><img src="../media/Whatsapp.png" alt=""></div>
      <div class="card-4"><img src="../media/IG.png" alt=""></div>
    </div>
  </div>

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

<script src="Template/JS/routes.js"></script>
<script src="Template/JS/Javascript.js"></script>