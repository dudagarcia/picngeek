var slideMarcador = 1;
var timer;

function mudaSlide(n = 1) {
  clearInterval(timer);
  slideTimer();
  mostraSlide(slideMarcador += n); //envia número (maior ou menor)
}

function mostraSlide(n) {
  var i; //contador
  var slide = document.getElementsByClassName("slide");
  if (n > slide.length) //não ir pra imagem não existente
    slideMarcador = 1;
  if (n < 1)
    slideMarcador = slide.length;
  for (i = 0; i < slide.length; i++)
    slide[i].style.display = "none"; //imagem anteriores desaparecem
  slide[slideMarcador - 1].style.display = "block"; //imagem nova aparece
}

function slideTimer() {
  timer = setInterval(mudaSlide, 4000);
}
