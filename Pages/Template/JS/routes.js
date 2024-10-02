function toHome() {
  window.location.href = "index.php";
}
function toSignUp() {
  window.location.href = "auth/register.php";
}

function toLogin() {
  window.location.href = "auth/login.php";
}
function toContact() {
  window.location.href = "contact.php";
}

function toInfo() {
  window.location.href = "information.php";
}

function toLegislation() {
  window.location.href = "legislation.php";
}

function toLive() {
  window.location.href = "liveStreaming.php";
}
function toMostPop() {
  window.location.href = "mostPopular.php";
}
function toParents() {
  window.location.href = "parentsHelp.php";
}
function toLogin() {
  window.location.href = "auth/login.php";
}



function toAboutus() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "controls/checkLogin.php?action=checkLoginStatus", true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.loggedIn) {
            window.location.href = navigateToPage(primaryUrl, fallbackUrl);
            const primaryUrl = 'Pages/Aboutus.php';      // The primary URL you want to navigate to
            const fallbackUrl = 'Aboutus.php'; // The fallback URL
        } else {
          window.location.href = "Pages/auth/login.php";
        }
      } else {
        alert("Error checking login status");
      }
    };
    xhr.onerror = function() {
      alert("Error checking login status");
    };
    xhr.send();
  }
  function toContact() {
    window.location.href = "contact.php";
  }

  function navigateToPage(primaryUrl, fallbackUrl){
    async()=>{
    try {
      const response = await fetch(primaryUrl, {
        method: 'HEAD', // Check if the primary URL exists
      });
  
      if (response.ok) {
        window.location.href = primaryUrl;  // Navigate to the primary URL
      } else {
        console.log("Primary URL not found, redirecting to fallback URL.");
        window.location.href = fallbackUrl; // Redirect to the fallback URL
      }
    } catch (error) {
      console.error("Error occurred, using fallback URL:", error);
      window.location.href = fallbackUrl; // If there's an error, go to the fallback URL
    }
  };
}

 