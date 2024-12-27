import {listarFaculdades} from "./FaculdadeLista.js";

async function updatePageContent() {
    await updateSelectFaculdadeInput();
}

function appyEvents(quant_faculdades) {
    const input = document.querySelector(".js-select-faculdade");

    input.addEventListener('change', () => {
        if (quant_faculdades !== 0) {
            return; 
        }

        window.location.pathname = "/sige_tutorias/app/Views/FaculdadeForm.html";
    });
}

async function updateSelectFaculdadeInput() {
    const input      = document.querySelector(".js-select-faculdade");
    const faculdades = await listarFaculdades();
    var htmlContent  = `<option value="" selected>Escolher Faculdade</option>`;


    for (const faculdade of faculdades) {
        const html = `
            <option value="${faculdade.id_faculdade}">${faculdade.nome_facul}</option>
        `;

        htmlContent += html;
    } 

    input.innerHTML = htmlContent;
    appyEvents(faculdades.length);
}

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname === "/sige_tutorias/app/Views/CursoForm.html") {
        updatePageContent();
    }
})
