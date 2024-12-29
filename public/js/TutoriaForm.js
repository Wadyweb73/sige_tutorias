import { listarCursos } from "./CursoLista.js";
import {listarDisciplinas} from "./DisciplinaLista.js";

async function updatePageContent() {
    updateSelectInputs();
}

async function updateSelectInputs() {
    const [cursos, disciplinas] = await Promise.all([
        listarCursos(),
        listarDisciplinas()
    ]);

    var cursoContent = `<option value="">Seleccionar Curso</option>`;
    var disciplinaContent = `<option value="">Seleccionar Disciplina</option>`;

    cursos.forEach((curso) => {
        cursoContent += `
            <option value="${curso.id_curso}">${curso.nome_curso}</option>
        `;
    });

    disciplinas.forEach((disciplina) => {
        disciplinaContent += `
            <option value=${disciplina.id_disciplina}>${disciplina.nome_disciplina}</option>
        `;
    });

    document.querySelector('.js-select-curso').innerHTML = cursoContent;
    document.querySelector('.js-select-disciplina').innerHTML = disciplinaContent;
}

document.addEventListener('DOMContentLoaded', () => {

    updatePageContent();
    
});

