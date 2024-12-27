import { getFaculdadeById } from "./FaculdadeLista.js";

export async function listarCursos() {
    const response = await fetch('/sige_tutorias/cursos', {
        method: 'GET'
    });
 
    if(!response.ok) {
        return false;
    }

    return await response.json();
}

export async function getCursoById(id) {
    const response = await fetch(`/sige_tutorias/curso/${id}`, {
        method: 'GET'
    });

    if (!response.ok) {
        return false;
    }

    return await response.json();
}

async function updatePageContent() {
    const table  = document.querySelector('.js-table-body');
    const cursos = await listarCursos();
    var table_content = "";

    if (cursos === false || cursos.length === 0) {
        table_content = `
            <tr>
                <td colspan=10 style="text-align: center; color: red;"><h1>Sem cursos registados!</h1></td>
            </tr> 
        `;
    }
    else {
        for (const curso of cursos) {
            const faculdade_res = await getFaculdadeById(curso.id_faculdade);
            
            const html = `
                <tr>
                    <td class="mini-column"><input type="checkbox" class="single-checkbox" name="id-curso" data-curso-id="${curso.id_curso}"></td>
                    <td>${curso.nome_curso}</td>    
                    <td>${faculdade_res.nome_facul}</td>
                    <td class="actions mini-column">
                        <i class="fas fa-trash-alt delete-icon"></i>
                    </td>
                </tr>
            `;

            table_content += html;
        };
    }

    table.innerHTML = table_content;
    applyEvents();
}

export function applyEvents() {
    const addCursoButton  = document.querySelector('.add-button');
    const editCursoButton = document.querySelector('.edit-button'); 
    const checkboxes      = document.querySelectorAll('.single-checkbox');
    
    addCursoButton.addEventListener('click', () => {
        window.location.href = "../../app/Views/CursoForm.html";
    })

    editCursoButton.addEventListener('click', () => {
        window.location.href = '../../app/Views/CursoForm.html';
    })

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            checkboxes.forEach((cb) => {
                if (cb !== this) {
                    cb.checked = false;
                }
            });
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {

    if (window.location.pathname === "/sige_tutorias/app/Views/CursoLista.html")
        updatePageContent();    
    
})

