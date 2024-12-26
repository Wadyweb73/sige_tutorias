import { applyEvents } from "./CursoLista.js";
import { getDisciplinaById } from "./DisciplinaLista.js";
import { getTutorById } from "./TutorLista.js";

export async function listarTutorias() {
    const response = await fetch('/sige_tutorias/tutorias', {
        method: 'GET'
    });

    if (!response.ok) {
        throw new Error("An error occurred when trying to fetch tutorias");
    }

    return await response.json();
}

async function updatePageContent() {
    const response =  await listarTutorias();
    var content = "";

    for (const tutoria of response) {
        const disciplina_res = await getDisciplinaById(tutoria.id_disciplina);
        // const tutor_res      = await getTutorById(tutoria.id_docente);
        // console.log(tutoria)

        console.log()

        const html = `
            <tr>
                <td class="mini-column"><input type="checkbox" class="single-checkbox" name="id-curso" data-curso-id="${tutoria.id_tutoria}"></td>
                <td>${disciplina_res.nome_disciplina}</td>
                <td>${tutoria.descricao}</td>
                <td>${tutoria.data_realizacao}</td>
                <td class="actions mini-column">
                    <i class="fas fa-trash-alt delete-icon"></i>
                </td>
            </tr>
        `;

        content += html;
    };

    document.querySelector('.js-table-body')
        .innerHTML = `${content}`;  

    applyEvents();

    document.querySelector('.add-button').addEventListener('click', () => {
        window.location.href = '../../app/Views/TutoriaForm.html';
    })
    document.querySelector('.edit-button').addEventListener('click', () => {
        window.location.href = '../../app/Views/TutoriaForm.html';
    })
}

document.addEventListener('DOMContentLoaded', () => {

    if (window.location.pathname === "/sige_tutorias/app/Views/TutoriaLista.html")
        updatePageContent();
    
})

