export async function listarTutorias() {
    const response = await fetch('/sige_tutorias/cursos', {
        method: 'GET'
    });
 
    if(!response.ok) {
        throw new Error("There was an error trying to fetch Lista de Cursos");
    }

    return await response.json();
}

async function updatePageContent() {
    const response    = await listarTutorias();
    var table_content = "";
    
    response.forEach((curso) => {
        const html = `
            <tr>
            <td>${curso.id_curso}</td>
            <td>${curso.nome_curso}</td>    
                <td>${curso.id_faculdade}</td>
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

