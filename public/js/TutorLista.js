import { getDisciplinaById } from "./DisciplinaLista.js";
import { applyEvents } from "./CursoLista.js";
import { getFaculdadeById } from "./FaculdadeLista.js";

function applyEvents() {
    const addNewTutorButton  = document.querySelector('.js-add-new-tutor-button');
    const deleteTutorButtons = document.querySelectorAll('.js-delete-button');

    addNewTutorButton.addEventListener('click', () => {
        window.location.pathname = "/sige_tutorias/app/Views/TutorForm.html";
    });

    deleteTutorButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const tutorId = button.datasest;
            
            console.log(tutorId)
        });
    });

}

export async function listarTutores() {
    const response = await fetch('/sige_tutorias/docentes', {
        method: 'GET'
    });
 
    if(!response.ok) {
        return false;
    }

    return await response.json();
}

export async function getTutorById(id) {

    const response = await fetch(`/sige_tutorias/docente/${id}`, {
        method: 'GET'
    });
    
    if (!response.ok) {
        return false;
    }

    return await response.json(); 
}

async function updatePageContent() {
    const response    = await listarTutores();
    var table_content = "";

    if (response === false || response.length === 0) {
        table_content = `
            <tr>
                <td colspan=10 style="text-align: center; color: red;"><h1>Sem tutores registados</h1></td>
            </tr> 
        `;
    }
    else {
        for (const  tutor of response) {
            const [disciplina_res, faculdade_res] = await Promise.all([
                getDisciplinaById(tutor.id_disciplina),
                getFaculdadeById(tutor.id_faculdade)
            ]);      

            const html = `
                <tr>
                    <td>${tutor.nome_docente}</td>    
                    <td>${faculdade_res.nome_facul}</td>
                    <td>${disciplina_res.nome_disciplina}</td>
                    <td class="actions mini-column">
                        <i class="fas fa-trash-alt delete-icon js-delete-button" data-tutor-id="${tutor.id_docente}"></i>
                    </td>
                </tr>
            `;

            table_content += html;
        };
    }

    document.querySelector('.js-table-body')
        .innerHTML = `${table_content}`;

    applyEvents();
}

document.addEventListener('DOMContentLoaded', () => {

    if (window.location.pathname === "/sige_tutorias/app/Views/TutorLista.html")
        updatePageContent();
    
})

