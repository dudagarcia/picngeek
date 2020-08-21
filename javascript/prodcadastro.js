const arquivoIn = document.getElementById('arquivo');
const imgUp = document.getElementById('imagemUp');
const hid = document.getElementById('hidImg');
var blob;
var r = new FileReader();
r.onload = function(){ blob = r.result; imgUp.src = blob; hid.value = blob; };
    
arquivoIn.addEventListener('change', function(e)
{
    var arquivos = arquivoIn.files;
    var uso = arquivos[0];
    var bin = r.readAsDataURL(uso);
});