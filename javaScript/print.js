let printButton = document.querySelector('.printBtn');

function printScreen() {
  window.print();
}

printButton.addEventListener('click', printScreen);
