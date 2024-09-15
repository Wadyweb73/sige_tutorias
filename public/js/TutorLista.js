import { getDisciplinaById } from "./DisciplinaLista.js";

export async function listarTutores() {
    const response = await fetch('/sige_tutorias/docentes', {
        method: 'GET'
    });
 
    if(!response.ok) {
        throw new Error("There was an error trying to fetch Lista de Cursos");
    }

    return await response.json();
}

async function getTutorById(id) {

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
        const res = await getDisciplinaById(tutor.id_disciplina);

        const html = `
            <tr>
                <td>${tutor.id_docente}</td>
                <td>${tutor.nome_docente}</td>    
                <td>${tutor.id_faculdade}</td>
                <td>${res.nome_disciplina}</td>
            </tr>
        `;

        table_content += html;
    };

    document.querySelector('.js-table-body')
        .innerHTML = `${table_content}`;
}

document.addEventListener('DOMContentLoaded', () => {

    updatePageContent();
    
})

