export async function listarTutores() {
    const response = await fetch('/sige_tutorias/docentes', {
        method: 'GET'
    });
 
    if(!response.ok) {
        throw new Error("There was an error trying to fetch Lista de Cursos");
    }

    return await response.json();
}

async function updatePageContent() {
    const response    = await listarTutores();
    var table_content = "";

    response.forEach((tutor) => {
        const html = `
            <tr>
                <td>${tutor.id_docente}</td>
                <td>${tutor.nome_docente}</td>    
                <td>${tutor.id_faculdade}</td>
                <td>${tutor.id_disciplina}</td>
            </tr>
        `;

        table_content += html;
    });

    document.querySelector('.js-table-body')
        .innerHTML = `${table_content}`;
}

document.addEventListener('DOMContentLoaded', () => {

    updatePageContent();
    
})

