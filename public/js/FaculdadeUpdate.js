import { getFaculdadeById } from "./FaculdadeLista.js";

async function updatePageContent() {
    updateFormContent();
}

async function updateFormContent() {
    const mainContent = document.querySelector('main');
    const queryParam  = new URLSearchParams(window.location.search).get('v');
    const faculdade   = await getFaculdadeById(queryParam);

    const html = `
        <form action="/sige_tutorias/faculdade/${faculdade.id_faculdade}/actualizar" method="post" class="main-content">
            <div class="field-components-container">
                <span class="field_title">Nome da Faculdade:</span>
                <input class="" name="nome_faculdade" value="${faculdade.nome_facul}" type="text" required>
            </div>
            <div class="field-components-container">
                <span class="field_title">Localização:</span>
                <input class="" name="endereco" value="${faculdade.endereco}" type="text" required>
            </div>
            <button class="submit-button" type="submit">Cadastrar</button>
        </form>
    `;

    mainContent.innerHTML += html;
}

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname === "/sige_tutorias/app/Views/FaculdadeUpdate.php") {
        updatePageContent();
    }
})
