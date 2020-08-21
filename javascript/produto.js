var setTamanho;

$(function() {
  setTamanho = function() {
    var altura = $('#shop').height();
    if(altura < 600)altura = '100%';
    $('.rodape').css({
      top: altura + 100,
      position: 'absolute'
    });
  };

  $(window).resize(function() {
    setTamanho();
  });
});

$(function() {
  var produto = document.getElementsByClassName('produto');

  $('.menuOption').change(function() {
    for (i = produto.length - 1; i >= 0; i--) {
      produto[i].parentNode.removeChild(produto[i]);
    }

    var radios = document.getElementsByName('category');
    for (var i = 0, length = radios.length; i < length; i++) {
      if (radios[i].checked) {
        categoria = radios[i].value;
        break;
      }
    }

    $.ajax({ //com data para categorias
      url: 'buscaProduto.php',
      method: 'POST',
      data: {categoria: categoria},
      dataType: 'json',
      success: function(data) {
        for (i = 0; i < data[0].length; i++) {
          criaProduto(data[0][i], data[1][i], data[2][i], data[3][i]);
        }
        setTamanho();
      }
    });
  });
});

$(function pegaProdutos() { //sem parametros
  $.ajax({
    url: 'buscaProduto.php',
    method: 'POST',
    dataType: 'json',
    success: function(data) {
      for (i = 0; i < data[0].length; i++) {
        criaProduto(data[0][i], data[1][i], data[2][i], data[3][i]);
      }
      setTamanho();
    }
  });
});

function criaProduto(descricao, preco, imagem, id) {
  newProduto = document.createElement('a');
  newProduto.setAttribute('class', 'produto');
  newProduto.setAttribute('id',id);
  newProduto.setAttribute('href','maisdetalhes_prod.php?id_prod='+id)
  newImagem = document.createElement('img');
  newImagem.setAttribute('src', imagem);
  newTexto = document.createElement('p');
  newTexto.setAttribute('class', 'descricao');
  newTexto.innerHTML = descricao + " - " + preco + " R$";
  newProduto.appendChild(newImagem);
  newProduto.appendChild(newTexto);
  document.getElementById('shop').appendChild(newProduto);
}

$(function() {
  $('#shop').on('click', '.btnCarrinho', function(e) {
    $id = $(event.target).attr('id');
    $.ajax({
      url: 'carrinho.php',
      data: $id,
      success: function(data) {
        adicionado();
      }
    });
  });

  $('#shop').on('click', '.produto', function() {
    $id = $(event.target).attr('id');
    $.ajax({
      url: 'maisdetalhes_prod.php',
      data: $id,
      success: function(data) {
      }
    });
  });
});
