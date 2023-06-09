$(document).ready(function () {
    $("#home").hide();
    $("#home").fadeIn("slow");
  });


window.addEventListener('scroll', reveal);

function reveal() {
    console.log('reveal run');
    var reveals = document.querySelectorAll('.reveal');
    for (var i = 0; i < reveals.length; i++) {
        var windowheight = window.innerHeight;
        
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 0;

        if (revealtop < windowheight - revealpoint) {
            reveals[i].classList.add('active');
        }
        else {
            reveals[i].classList.remove('active');
        }
    }
}