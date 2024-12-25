import { getDisciplinaById } from "./DisciplinaLista.js";
import { applyEvents } from "./CursoLista.js";
import { getFaculdadeById } from "./FaculdadeLista.js";

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
        try {
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
        } catch (error) {
            console.error('Erro ao buscar dados da faculdade ou disciplina:', error);
        }
    };

    document.querySelector('.js-table-body')
        .innerHTML = `${table_content}`;

    applyEvents();
}


document.addEventListener('DOMContentLoaded', () => {

    if (window.location.pathname === "/sige_tutorias/app/Views/TutorLista.html") {
        updatePageContent();
    }

    document.querySelector('.edit-button').addEventListener('click', async () => {
        const selectedCheckbox = document.querySelector('.single-checkbox:checked');
        if (selectedCheckbox) {
            const tutorId = selectedCheckbox.getAttribute('data-curso-id');
            const tutorData = await getTutorById(tutorId);
            localStorage.setItem('editTutorData', JSON.stringify(tutorData));
            window.location.href = './TutorEditar.html';
        } else {
            alert('Por favor, selecione um tutor para editar.');
        }
    });

    document.querySelector('.add-button').addEventListener('click', () => {
        window.location.href = './TutorNovo.html';
    });
});


