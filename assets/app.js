import './stimulus_bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

// console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');


document.addEventListener('turbo:load', function () {
    
    const buttons = document.querySelectorAll('.reservation');
    const fenetre = document.querySelector('#fenetreReservation');

    if (fenetre && fenetre.dataset.invalid === 'true') {
        
        fenetre.showModal();
}
    
    if (buttons.length) {
        
        buttons.forEach(function (button) {
            button.addEventListener("click", function () {
    
                fenetre.showModal();
                document.querySelector('#rendez_vous_Prestation').value = button.dataset.id;
                document.querySelector('#nomPrestation').textContent = button.dataset.nom;
                
            });
            
        });
    } 
    
    const fermeture = document.querySelector('#fermer');
    
    if (fermeture && fenetre) {
        
        fermeture.addEventListener("click", function () {
            
            fenetre.close();
        });
        
    } 
})


document.addEventListener('turbo:load', function () {

const flashes = document.querySelector('.flash-success');
    
    if (flashes) {


        setTimeout(() => { flashes.remove();
            
        }, 4000);
        
    }

});