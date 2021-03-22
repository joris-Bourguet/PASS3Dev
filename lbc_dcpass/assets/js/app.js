//Fermer la fenetre d'erreur

let closeError = document.querySelector('#js-close-error');
let errorDiv = document.querySelector('.errorDiv');

closeError.addEventListener('click', (e) => {
    errorDiv.style.display = "none";
})