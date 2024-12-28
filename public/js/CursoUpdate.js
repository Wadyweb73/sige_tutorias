import { listarCursos } from "./CursoLista.js";
import { listarFaculdades } from "./FaculdadeLista.js";

async function updatePageContent() {
    updateFormContent();
}

async function updateFormContent() {
    var selectFaculdadeContent = "";
    var queryParams = new URLSearchParams(window.location.search);
    const mainContent = document.querySelector('main');
    const [cursos, faculdades] = await Promise.all([
        listarCursos(),
        listarFaculdades()
    ]);

    const cursoId    = queryParams.get('v');
    const _curso     = cursos.find(curso => Number(curso.id_curso) === Number(cursoId));
    const _faculdade = faculdades.find(faculdade => faculdade.id_faculdade === _curso.id_faculdade);

    faculdades.forEach((faculdade) => {
        if (faculdade.id_faculdade === _faculdade.id_faculdade) {
            selectFaculdadeContent += `<option value="${_faculdade.id_faculdade}" selected>${_faculdade.nome_facul}</option>`
        }
        else {
            selectFaculdadeContent += `<option value="${faculdade.id_faculdade}">${faculdade.nome_facul}</option>`
        }
    });

    const html = `
        <form action="/sige_tutorias/curso/{_curso.id_curso}/actualizar" method="post" class="main-content">
            <div class="field-components-container">
                <span class="field_title">Nome do Curso:</span>
                <input class="" name="nome" type="text" value="${_curso.nome_curso}" required>
            </div>

            <div class="field-components-container">
                <select class="js-select-faculdade" name="id_faculdade">
                    ${selectFaculdadeContent}
                </select>
            </div>

            <button class="submit-button" type="submit">Cadastrar</button>
        </form>
    `;

    mainContent.innerHTML += html;
}

document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname === "/sige_tutorias/app/Views/CursoUpdate.php") {
        updatePageContent();
    }
})
