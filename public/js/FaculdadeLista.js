document.addEventListener('DOMContentLoaded', () => {

    fetch('/sige_tutorias/faculdades', {
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

            response.forEach((faculdade, index) => {
                console.log(faculdade);
                const html = `
                    <tr>
                    <td>${faculdade.id_faculdade}</td>
                        <td>${faculdade.nome_facul}</td>
                        <td>${faculdade.endereco}</td>
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
    
})

