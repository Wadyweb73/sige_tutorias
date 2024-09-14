export async function listarDisciplinas() {
    const response = await fetch('/sige_tutorias/disciplinas', {
        method: 'GET'
    });
 
    if(!response.ok) {
        throw new Error("There was an error trying to fetch Lista de Cursos");
    }

    return await response.json();
}

async function updatePageContent() {
    const response = await listarDisciplinas();
    var content = "";

    console.log(response);
    
    response.forEach((disciplina) => {
        const html = `
            <tr>
                <th>${disciplina.id_disciplina}</th>
                <th>${disciplina.nome_disciplina}</th>
                <th>${disciplina.id_curso}</th>
            </tr>
        `;

        content += html;
    })

    document.querySelector('.js-table-body')
        .innerHTML = content;
}

document.addEventListener('DOMContentLoaded', () => {

    updatePageContent();
    
});