var aberto = false;
var logado = false;
var admin = false;

function abreLogin() {
    verificaLogin();
    var menuLogin = document.getElementById("loginPopUp");
    if (!aberto) {
        menuLogin.style.animationName = "vemPraTela";
        menuLogin.style.WebkitAnimationName = "vemPraTela";
        aberto = true;
        menuLogin.style.display = "block";
    } else {
        menuLogin.style.display = "none";
        menuLogin.style.display = "block";
        menuLogin.style.animationName = "saiDaTela";
        menuLogin.style.WebkitAnimationName = "saiDaTela";
        aberto = false;
    }
}

function verificaLogin() {
    if (logado) {
        document.getElementById('frmLogin').style.display = 'none';
        document.getElementById('divLogado').style.display = 'block';
    } else {
        document.getElementById('divLogado').style.display = 'none';
        document.getElementById('frmLogin').style.display = 'block';
        document.getElementById('nomeLogin').innerHTML = "";
    }
}

function logar(msg) {
    var popup = document.getElementById('LoggedPopup');
    document.getElementById('msgLog').innerHTML = msg;
    popup.style.animationName = "chegaLog";
    popup.style.WebkitAnimationName = "chegaLog";
    popup.style.display = "block"; //atribuiu e subiu
    setTimeout(function () {
        popup.style.animationName = "saiLog";
        popup.style.WebkitAnimationName = "saiLog";
        popup.style.display = "none"; //desceu e reinicia
        popup.style.display = "block";
    }, 2500);
    setTimeout(function () {
        popup.style.display = "none" //espera o tempo de espera + tempo de animaÃ§Ã£o e some
    }, 3000);
}

/*$(function () {
    $('#frmLogin').bind('submit', function () {
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: 'login.php',
            data: $('#frmLogin').serialize(),
            success: function (data) {
                if (data == 'senha') {
                    msg = 'Senha incorreta!';
                } else if (data == 'login') {
                    msg = 'Usuário não foi cadastrado!';
                } else if (data == 'admin') {
                    msg = 'Bem vindo, administrador' + data + '!';
                    admin = true;
                } else {
                    msg = 'Bem vindo, ' + data + '!';
                    abreLogin();
                    logado = true;
                    document.getElementById('nomeLogin').innerHTML = data;
                }
                logar(msg);
            }
        });
        return false;
    });
});*/

$(function () {
    $('#btnSair').on("mousedown", function () {
        //event.preventDefault();
        $.ajax({
            url: 'sair.php',
            success: function () {
                logado = false;
                verificaLogin();
            }
        });
    });
});

function check() {
    if (window.location.href.indexOf("index") > -1) {
        documen.getElementById('btnHome').classList.add('atual');
    } else if (window.location.href.indexOf("produtos") > -1) {
        documen.getElementById('btnProdutos').classList.add('atual');
    } else if (window.location.href.indexOf("nossaempresa") > -1) {
        documen.getElementById('btnSobre').classList.add('atual');
    }
}
