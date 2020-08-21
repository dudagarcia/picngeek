// Pause and play the video, and change the button text
function myFunction() {
    var video = document.getElementById("myVideo");// Get the video
    var btn = document.getElementById("myBtn");// Get the button
    if (video.paused) {
        video.play();
        btn.innerHTML = "Pause";
    } else {
        video.pause();
        btn.innerHTML = "Play";
    }
}
