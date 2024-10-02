function typer(){
function fetchTextContent() {
  const sourceElement = document.getElementById("content-source");
  const paragraphs = sourceElement.querySelectorAll('p');
  console.log(paragraphs);
  return Array.from(paragraphs).map(p => p.textContent.trim());
}

const lines = fetchTextContent();
let lineIndex = 0;
let charIndex = 0;
const typingSpeed = 50; // Milliseconds between each character
const lineDelay = 1000; // Milliseconds between each line

// Function to type out one line at a time
function typeLine() {
  const textElement = document.getElementById("typed-text");

  if (lineIndex < lines.length) {
    const currentLine = lines[lineIndex];

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
}
document.addEventListener('DOMContentLoaded', () => {
  typeLine();
});
}

// ---------Custom Cursor-------------


function customCursor() {
   let cursor, pointer;

  document.addEventListener('DOMContentLoaded', () => {
    cursor = document.createElement('div');
    cursor.classList.add('custom-cursor');
    document.body.appendChild(cursor);

    pointer = document.createElement('div');
    pointer.classList.add('custom-pointer');
    document.body.appendChild(pointer);

    document.addEventListener('mousemove', handleMouseMove);
    document.addEventListener('mouseover', handleMouseOver);

    document.body.style.cursor = 'none';

    // Start observing the document body for changes
    observer.observe(document.body, { childList: true, subtree: true });
  });

  function handleMouseMove(e) {
    cursor.style.left = e.clientX + 'px';
    cursor.style.top = e.clientY + 'px';
    pointer.style.left = e.clientX + 'px';
    pointer.style.top = e.clientY + 'px';
    
    updateCursorColor(e.target);
  }

  function handleMouseOver(e) {
    if (e.target.matches('a, button, [role="button"], input[type="submit"], input[type="button"], .clickable')) {
      pointer.style.opacity = '1';
      cursor.style.opacity = '0';
    } else {
      pointer.style.opacity = '0';
      cursor.style.opacity = '1';
    }
    
    updateCursorColor(e.target);
  }

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

  function updateCursorColor(element) {
    const bgColor = getComputedStyle(element).backgroundColor;
    const rgb = bgColor.match(/\d+/g);
    
    if (rgb) {
      const [r, g, b] = rgb.map(Number);
      
      // Check if the background is black (or very dark)
      if (r <= 10 && g <= 10 && b <= 10) {
        setCursorColor('green');
      }
      // Check if the background is white (or very light)
      else if (r >= 245 && g >= 245 && b >= 245) {
        setCursorColor('black');
      }
      else {
        // For other colors, use the brightness calculation
        const brightness = (r * 299 + g * 587 + b * 114) / 1000;
        setCursorColor(brightness < 128 ? 'white' : 'black');
      }
    } else {
      // Default to black if unable to determine background color
      setCursorColor('black');
    }
  }

  function setCursorColor(color) {
    cursor.style.borderColor = color;
    pointer.style.backgroundColor = color;
  }

  function updateCursorStyle(element) {
    element.addEventListener('mouseover', () => {
      pointer.style.opacity = '1';
      cursor.style.opacity = '0';
      updateCursorColor(element);
    });

    element.addEventListener('mouseout', () => {
      pointer.style.opacity = '0';
      cursor.style.opacity = '1';
      updateCursorColor(document.body);
    });
  }
  html
}

const video = document.getElementById('background-video');
const btn = document.getElementById('video-control');

function toggleVideo() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}

function drawSearchIcon() {
    const canvas = document.getElementById('searchIcon');
    const ctx = canvas.getContext('2d');

    // Clear canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Draw circle
    ctx.beginPath();
    ctx.arc(20, 20, 12, 0, 2 * Math.PI);
    ctx.strokeStyle = '#fff';
    ctx.lineWidth = 3;
    ctx.stroke();

    // Draw handle
    ctx.beginPath();
    ctx.moveTo(28, 28);
    ctx.lineTo(45, 45);
    ctx.strokeStyle = '#fff';
    ctx.lineWidth = 3;
    ctx.stroke();
}

// Call the function when the page loads
window.onload = drawSearchIcon();

function drawContactIcon() {
    const canvas = document.getElementById('contactIcon');
    const ctx = canvas.getContext('2d');

    // Clear canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Set the color and line width
    ctx.strokeStyle = '#fff';
    ctx.fillStyle = '#fff';
    ctx.lineWidth = 2;

    // Draw head (circle)
    ctx.beginPath();
    ctx.arc(25, 15, 10, 0, 2 * Math.PI);
    ctx.fill();
// 
    // Draw body (trapezoid)
    ctx.beginPath();
    ctx.moveTo(10, 28);
    ctx.lineTo(8, 45);
    ctx.lineTo(42, 45);
    ctx.lineTo(40, 28);
    ctx.fill();

    // Draw shoulders (arcs)
    ctx.beginPath();
    ctx.moveTo(10, 28);
    ctx.quadraticCurveTo(25, 20, 40, 28);
    ctx.fill();
}
// Call the function when the page loads
window.onload = drawContactIcon();

// Function to fetch text content from paragraphs
