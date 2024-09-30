<script>
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../controls/checkLogin.php?action=checkLoginStatus", true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (!response.loggedIn) {
            window.location.href = "auth/login.php";
        }
      } else {
        alert("Error checking login status");
      }
    };
    xhr.onerror = function() {
      alert("Error checking login status");
    };
    xhr.send();
</script>
<?php include('Template/navbar.php') ?>
  <script src="Template/JS/routes.js"></script>
  <script src="Template/JS/Javascript.js"></script>
<h1>here</h1>
