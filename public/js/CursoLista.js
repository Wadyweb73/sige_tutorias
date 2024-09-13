document.addEventListener('DOMContentLoaded', () => {

    function listarTutorias() {
        fetch('/sige_tutorias/', {
            method: 'GET'
        })
        .then((response) => {
            if(!response.ok) {
                throw new Error('Erro na requisição: ' + response.status);
            }
    
            return response.json();
        })
        .then((response) => {
                var table_content = "";
    
                response.forEach((curso) => {
                    console.log(curso);
                    const html = `
                        <tr>
                        <td>${curso.id_curso}</td>
                            <td>${curso.id_faculdade}</td>
                            <td>${curso.nome_curso}</td>
                        </tr>
                    `;
    
                    table_content += html;
                });
    
                document.querySelector('.js-table-body')
                    .innerHTML = `${table_content}`;
        })
        .catch((error) => {
            console.error(error);
        })
    }

    listarTutorias();
    
})

