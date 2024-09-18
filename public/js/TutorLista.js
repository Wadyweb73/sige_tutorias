import { getDisciplinaById } from "./DisciplinaLista.js";
import { getFaculdadeById } from "./FaculdadeLista.js";

function applyEvents() {
    const addNewTutorButton = document.querySelector('.js-add-new-tutor-button');

    addNewTutorButton.addEventListener('click', () => {
        window.location.pathname = "/sige_tutorias/app/Views/TutorForm.html";
    });

}

export async function listarTutores() {
    const response = await fetch('/sige_tutorias/docentes', {
        method: 'GET'
    });
 
    if(!response.ok) {
        throw new Error("There was an error trying to fetch Lista de Cursos");
    }

    return await response.json();
}

export async function getTutorById(id) {

    const response = await fetch(`/sige_tutorias/docente/${id}`, {
        method: 'GET'
    });
    
    if (!response.ok) {
        throw new Error('There was an error trying to get tutor data!!');
    }

    return await response.json(); 
}

async function updatePageContent() {
    const response    = await listarTutores();
    var table_content = "";

    for (const  tutor of response) {
        const disciplina_res = await getDisciplinaById(tutor.id_disciplina);
        const faculdade_res  = await getFaculdadeById(tutor.id_faculdade);

        const html = `
            <tr>
                <td class="mini-column"><input class="single-checkbox" type="checkbox" name="id-curso" data-curso-id="${tutor.id_docente}"></td>
                <td>${tutor.nome_docente}</td>    
                <td>${faculdade_res.nome_facul}</td>
                <td>${disciplina_res.nome_disciplina}</td>
                <td class="actions mini-column">
                    <i class="fas fa-trash-alt delete-icon"></i>
                </td>
            </tr>
        `;

        table_content += html;
    };

    document.querySelector('.js-table-body')
        .innerHTML = `${table_content}`;

    applyEvents();
}

document.addEventListener('DOMContentLoaded', () => {

    if (window.location.pathname === "/sige_tutorias/app/Views/TutorLista.html")
        updatePageContent();
    
})

