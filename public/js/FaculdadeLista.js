import { applyEvents } from "./CursoLista.js";

export async function listarFaculdades() {
    const response = await fetch('/sige_tutorias/faculdades', {
        method: 'GET'
    })

    if(!response.ok) {
        throw new Error("There was an error trying to fetch Lista de Faculdades");
    }
    
    return response.json();
}

export async function getFaculdadeById(id) {
    const response =  await fetch(`/sige_tutorias/faculdade/${id}`, {
        method: 'GET'
    });

    if (!response.ok) {
        throw new Error('There was an error trying to fetch Faculdade');
    }

    return await response.json();
}

async function updatePageContent() {
    const response = await listarFaculdades();
    var table_content = "";

    response.forEach((faculdade, index) => {
        const html = `
            <tr>
                <td class="mini-column"><input type="checkbox" class="single-checkbox" name="id-curso" data-curso-id="${faculdade.id_faculdade}"></td>
                <td>${faculdade.nome_facul}</td>
                <td>${faculdade.endereco}</td>
                <td class="actions mini-column">
                    <i class="fas fa-trash-alt delete-icon"></i>
                </td>
            </tr>
        `;

        table_content += html;
    });

    document.querySelector(`.js-table-body`)
        .innerHTML = `${table_content}`;

    applyEvents();

    document.querySelector('.add-button').addEventListener('click', () => {
        window.location.href = '../../app/Views/FaculdadeForm.html';
    })
    document.querySelector('.edit-button').addEventListener('click', () => {
        window.location.href = '../../app/Views/FaculdadeForm.html';
    })
}

document.addEventListener('DOMContentLoaded', () => {

    if (window.location.pathname === "/sige_tutorias/app/Views/FaculdadeLista.html")
        updatePageContent();
    
})

