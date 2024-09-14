document.addEventListener("DOMContentLoaded", () => {   

    const activatePup  = document.querySelector('.js-choose-docente-button');
    const quitButton   = document.querySelector('.js-quit-pop-up-button');
    const popUp        = document.querySelector('.js-pop-up');

    activatePup.addEventListener('click', () =>  {
        popUp.style.display = 'block';
    });

    document.addEventListener('keydown', (e) => {
        if (e.key == "Escape") {
            hidePopUp();
        }
    })
    
    quitButton.addEventListener("click", () => {
        hidePopUp();
    });

    function hidePopUp() {
        popUp.style.display = 'none';
    }
    
})
