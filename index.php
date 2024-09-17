<?php include 'Template/navbar.php' ?>
<div class="video-wrapper">
  <video autoplay muted loop id="background-video">
    <source class="vid" src="./media/720pFH.mp4" type="video/mp4">
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

</head>

<body>


  <!-- Example dynamic content -->


  <script>
    let typingSpeed = 100; // Speed of typing each character
    let lineDelay = 1000; // Delay between lines
    let lineIndex = 0;
    let charIndex = 0;

    // Function to fetch dynamic content from another element (e.g., from #content-source)
    function fetchTextContent() {
      const sourceElement = document.getElementById("content-source");
      const paragraphs = sourceElement.querySelectorAll('p');
      return Array.from(paragraphs).map(p => p.textContent.trim());
    }

    // Get the dynamic text lines
    const lines = fetchTextContent();

    // Function to type out one line at a time
    function typeLine() {
      const currentLine = lines[lineIndex];
      const textElement = document.getElementById("typed-text");

      if (charIndex < currentLine.length) {
        textElement.textContent += currentLine.charAt(charIndex);
        charIndex++;
        setTimeout(typeLine, typingSpeed);
      } else {
        charIndex = 0;
        lineIndex++;
        if (lineIndex < lines.length) {
          setTimeout(() => {
            textElement.textContent += "\n"; // Add new line
            typeLine();
          }, lineDelay);
        }
      }
    }

    // Start the typing animation
    typeLine();
  </script>
</body>

</html>



<?php include './Template/preview.php' ?>
<script src="./Template/JS/Javascript.js">

</script>