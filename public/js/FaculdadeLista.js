

export async function listarFaculdades() {
    const response = await fetch('/sige_tutorias/faculdades')

    if(!response.ok) {
        return false;
    }
    
    // console.log(response);
    return response.json();
}

export async function getFaculdadeById(id) {
    const response =  await fetch(`/sige_tutorias/faculdade/${id}`, {
        method: 'GET'
    });

    if (!response.ok) {
        return false;
    }

    return await response.json();
}

async function applyEvents() {
    const deleteButtons    = document.querySelectorAll('.js-delete-button');
    const editCursoButtons = document.querySelectorAll('.js-edit-button'); 

    for (const button of deleteButtons) {
        button.addEventListener('click', async () => {
            const id_faculdade = button.dataset.faculId;
            const deleteResponse = await fetch(`/sige_tutorias/faculdade/${id_faculdade}/apagar`, {
                method: 'DELETE'
            });
        });
    };

    editCursoButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const faculId = button.dataset.faculId;
            
         window.location.href = `/sige_tutorias/app/Views/FaculdadeUpdate.php?v=${faculId}`;
        });
    })

    document.querySelector('.add-button').addEventListener('click', () => {
        window.location.href = '../../app/Views/FaculdadeForm.html';
    });

    document.querySelector('.edit-button').addEventListener('click', () => {
        window.location.href = '../../app/Views/FaculdadeForm.html';
    });
}

async function updatePageContent() {
    const faculdades = await listarFaculdades();
    var table_content = "";

    if (faculdades === false || faculdades.length === 0) {
        table_content = `
            <tr>
                <td colspan=10 style="text-align: center; color: red;"><h1>Sem faculdades registadas!</h1></td>
            </tr>
        `;
    }
    else {
        faculdades.forEach((faculdade) => {
            const html = `
                <tr>
                    <td class="mini-column"><input type="checkbox" class="single-checkbox" name="id-curso" data-curso-id="${faculdade.id_faculdade}"></td>
                    <td>${faculdade.nome_facul}</td>
                    <td>${faculdade.endereco}</td>
                    <td class="actions mini-column">
                        <div class="js-action-buttons-container">
                            <i class="fas fa-trash-alt delete-icon js-delete-button" data-facul-id=${faculdade.id_faculdade}></i>
                            <i class="fa-solid fa-pen-to-square js-edit-button" data-facul-id="${faculdade.id_faculdade}"></i>
                        </div>
                    </td>
                </tr>
            `;

            table_content += html;
        });
    }

    document.querySelector(`.js-table-body`).innerHTML = `${table_content}`;
    applyEvents();
}

document.addEventListener('DOMContentLoaded', () => {

    if (window.location.pathname === "/sige_tutorias/app/Views/FaculdadeLista.html")
        updatePageContent();
    
})

