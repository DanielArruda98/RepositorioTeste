var diretorio = "pages/";

function redirecionar(e, pagina, titulo) {
    e.preventDefault();
    var conteudo = $("#conteudo");
    document.title = titulo;
    conteudo.load(diretorio + pagina);
}

$("#p1").click(function(e) {
    redirecionar(e, "pagina1.html", "Página 1");
});

$("#p2").click(function(e) {
    redirecionar(e, "pagina2.html", "Página 2");
});