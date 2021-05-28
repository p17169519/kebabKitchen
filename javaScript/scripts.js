
menuToggler.addEventListener('click', ev => {
  myBasket.classList.toggle('open');
  menuToggler.textContent = menuToggler.textContent === "x" ? "≡" : "x";
});
