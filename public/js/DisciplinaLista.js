    import { getCursoById } from "./CursoLista.js";

function applyEvents() {
    const addButton    = document.querySelector('.add-button');

    addButton.addEventListener('click', function() {
        window.location.pathname = "/sige_tutorias/app/Views/DisciplinaForm.html" ;
    })
}

    export async function listarDisciplinas() {
        const response = await fetch('/sige_tutorias/disciplinas', {
            method: 'GET'
        });
    
        if(!response.ok) {
            throw new Error("There was an error trying to fetch Lista de Cursos");
        }

        return await response.json();
    }

    export async function getDisciplinaById(id) {
        const response = await fetch(`/sige_tutorias/disciplina/${id}`, {
            method: 'GET'
        });

        if (!response.ok) {
            throw new Error('There was an error trying to fetch disciplina');
        }

        return await response.json();
    }

    async function updatePageContent() {
        const response = await listarDisciplinas();
        var content = "";

        for (const disciplina of response) {
            const curso_res = await getCursoById(disciplina.id_curso);
            
            const html = `
                <tr>
                    <td>${disciplina.nome_disciplina}</td>
                    <td>${curso_res.nome_curso}</td>
                    <td class="actions mini-column">
                        <i class="fas fa-trash-alt delete-icon"></i>
                    </td>
                </tr>
            `;

            content += html;
        }

        document.querySelector('.js-table-body')
            .innerHTML = content;

        applyEvents();
    }

    document.addEventListener('DOMContentLoaded', () => {

        if (window.location.pathname === "/sige_tutorias/app/Views/DisciplinaLista.html")
            updatePageContent();
        
    }); 
