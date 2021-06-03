function verimagen1(principal) {
    copiaren = document.getElementById("contenimag");
    copiaren.src = principal;
}
// OTRA Manera
var imagenes = ["../imgs/galeria/fotoGaleria1.jpg", "../imgs/galeria/fotoGaleria2.jpg", "../imgs/galeria/fotoGaleria3.jpg", "../imgs/galeria/fotoGaleria4.jpg", "../imgs/galeria/fotoGaleria5.jpg", "../imgs/galeria/fotoGaleria6.jpg",
    "../imgs/galeria/fotoGaleria7.jpg", "../imgs/galeria/fotoGaleria8.jpg", "../imgs/galeria/fotoGaleria9.jpg", "../imgs/galeria/fotoGaleria10.jpg", "../imgs/galeria/fotoGaleria11.jpg",
    "../imgs/galeria/fotoGaleria12.jpg", "../imgs/galeria/fotoGaleria13.jpg", "../imgs/galeria/fotoGaleria14.jpg", "../imgs/galeria/fotoGaleria15.jpg",
    "../imgs/galeria/fotoGaleria16.jpg", "../imgs/galeria/fotoGaleria17.jpg", "../imgs/galeria/fotoGaleria19.jpg", "../imgs/galeria/fotoGaleria20.jpg", "../imgs/galeria/fotoGaleria21.jpg",
    "../imgs/galeria/fotoGaleria22.jpg"
];
var largo = imagenes.length;

i = 0;

function clickdelante() {

    var foto = document.getElementById("contenimag");

    i++;

    if (i == largo) i = 0;
    foto.src = imagenes[i];
}

function clickatras() {

    var foto = document.getElementById("contenimag");
    i--;
    if (i < 0) i = largo - 1;
    foto.src = imagenes[i];
}