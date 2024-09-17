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