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
    <form>
      <div class="C-emp">
        <input type="email" name="email" id="email" placeholder="Email" required>
        <input type="number" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" required>
      </div>
      <div class="C-msg">
        <input type="text" name="name" id="name" placeholder="Name" required>
        <textarea name="message" id="message" rows="10" cols="30" placeholder="Enter your Message" required></textarea>
      </div>
      <div class="C-send">
        <div class="policy">
          <div>
            <input type="submit" value="Send" id="submit">
          </div>
          <div>
            <input class="clickable" type="checkbox" name="policy" id="policybox" required">
            <p>you agree with our <a href="../media/Privacy Policy.pdf"> privacy policy</a></p>
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
      <input form="newsletter" type="email" name="email" id="emailnewsletter" placeholder="email">
      <input form="newsletter" type="submit" value="Submit">
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
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1436.9916346492685!2d33.797899779408006!3d-13.963030539844777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smw!4v1727950318550!5m2!1sen!2smw" class="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<?php include './Template/footer.php' ?>
<script>
  const popupHTML = `<div class="popup-overlay" id="popup">
    <div class="popup-content success-popup">
        <button class="close-button" onclick="closePopup()">&times;</button>
        <p class="popup-message">Your email has been received, we will send you feedback as soon as possible</p>
    </div>
</div>`;

  document.body.insertAdjacentHTML('beforeend', popupHTML);


  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const phoneNumber = document.getElementById('phoneNumber').value;
  const message = document.getElementById('message').value;
  console.table(message, email, phoneNumber, message);

  function showPopup() {
    if (![name, email, phoneNumber, message].every(field => field.trim() !== '')) {
      console.table(message, email, phoneNumber, message);
      const popup = document.getElementById('popup');
      popup.classList.add('show');

      // Auto-hide after 5 seconds
      setTimeout(() => {
        closePopup();
      }, 5000);
    } else {
      document.querySelector('.popup-content').className = 'popup-content error-popup';
      document.querySelector('.popup-message').textContent = 'Please fill in all fields appropriately';
      popup.classList.add('show');

      // Auto-hide after 5 seconds
      setTimeout(() => {
        closePopup();
      }, 3000);
    }
  }

  function closePopup() {
    const popup = document.getElementById('popup');
    popup.classList.remove('show');
  }

  // Add click event to submit button
  document.getElementById('submit').addEventListener('click', function(e) {
    e.preventDefault();
    const policybox = document.getElementById('policybox');
    console.log('Policybox element:', policybox);
    
    if (!policybox) {
        console.error('Policybox element not found!');
        return;
    }
    
    const checked = policybox.checked;
    console.log('Checkbox checked:', checked);
    
    if (checked) {
      showPopup();
    } else {
      document.getElementById('policyError').textContent = 'Please accept our privacy policy to proceed';
      policybox.classList.add('error');
      policybox.addEventListener('change', function() {
        policybox.classList.remove('error');
        document.getElementById('policyError').textContent = '';
      });
    }
  });

  // Close popup when clicking outside
  document.getElementById('popup').addEventListener('click', function(e) {
    if (e.target === this) {
      closePopup();
    }
  });

  // Close popup with Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closePopup();
    }
  });
</script>
<script src="Template/JS/routes.js"></script>
<script src="./Template/JS/Javascript.js"></script>
<script>
  activityHistory();
  customCursor();
  subscribeNewsletter(event);
</script>