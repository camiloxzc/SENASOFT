function numeros(objeto) {
    objeto.value = objeto.value.replace(/[^\d,]/g, '');
  }
function cuatro(objeto) {
    objeto.value = objeto.value.replace(/^[\d]/g, '');
}
function letras(objeto) {
  objeto.value = objeto.value.replace(/[^\a-zA-Z,]/g,' ');
}