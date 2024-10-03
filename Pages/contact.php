<?php
$title = "Contact Us Page"
?>
<section class="contHeadSection">
  <?php include('Template/navbar.php') ?>
  <div class="head">
    <h1>Contact Us</h1>
  </div>
</section>
<section class="contSection">
  <div class="C-left">
    <form action="#" method="post">
      <div class="C-emp">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="number" name="phoneNumber" id="phoneNumber" placeholder="Phone Number">
      </div>
      <div class="C-msg">
        <input type="text" name="name" id="name" placeholder="Name">
        <textarea name="message" id="message" rows="10" cols="30" placeholder="Enter your Message"></textarea>
      </div>
      <div class="C-send">
        <div class="policy">
          <div>
            <input type="submit" value="Send" id="submit">
          </div>
          <div>
            <input class="clickable" type="checkbox" name="policy" id="policybox">
            <p>you agree with our <a href="#"> privacy policy</a></p>
          </div>

        </div>
        <div id="policyError" class="error"></div>
    </form>
  </div>
  </div>
  <div class="C-right">
    <div class="R-content">
      <h2>Our Newsletter</h2>
      <p>Subscribe to our newsletter to receive updates about our latest social media campaigns. We also provide the latest and most effective ways of online safety specailly tailored for todays teens</p>
      <input type="email" name="emai" id="email" placeholder="email">
      <input type="submit" value="Submit">
    </div>
  </div>
</section>
<section class="C-details">
  <div class="details">
    <div class="d-top">
      <i>
        <img src="../media/whatsappblackicon.png" alt="">
      </i>
      <p>(+265) 88 648 0623</p>
    </div>
    <div class="d-text">
      You can contact us on Whatsapp during working hours and days.
    </div>
  </div>
  <div class="details">
    <div class="d-top">
      <i>
        <img src="../media/blackemailicon.png" alt="">
      </i>
      <p>smc.org@email.com</p>
    </div>
    <div class="d-text">
      Contact us through email for questions or further clarifications on our campaign
    </div>
  </div>
  <div class="details">
    <div class="d-top">
      <i>
        <img src="../media/locationicon.png" alt="">
      </i>
      <p>City Center</p>
    </div>
    <div class="d-text">
      Or find us at our office for a one on one session with our experts in Social Media Psychology
    </div>
  </div>
</section>
<section class="C-Map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1436.9916346492685!2d33.797899779408006!3d-13.963030539844777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smw!4v1727950318550!5m2!1sen!2smw"  class="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<script src="Template/JS/routes.js"></script>
<script src="./Template/JS/Javascript.js">
</script>
<script>
  customCursor();
</script>