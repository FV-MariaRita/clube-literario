function Entrar() {
  var x = document.getElementById("x7");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

// função de sidebar do menu! //
function openNav() {
document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
document.getElementById("mySidenav").style.width = "0px";
}

// função sidbar da página de perfil //

function openNav2() {
document.getElementById("mySidenav2").style.width = "300px";
}

function closeNav2() {
document.getElementById("mySidenav2").style.width = "0px";
}

// função para o adm adicionar livros ao sistema
function AdicionarLivros() {
var x = document.getElementById("cadLivro");
if (x.style.display === "none") {
  x.style.display = "block";
} else {
  x.style.display = "none";
}
}

// função para o adm atualizar os livros no sistema 
function AlterarLivros() {
var x = document.getElementById("updateLivro");
if (x.style.display === "none") {
  x.style.display = "block";
} else {
  x.style.display = "none";
}
}

// função para o adm excluir os livros do sistema 
function ExcluirLivros() {
  var x = document.getElementById("ExcluirLivros");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
  }
