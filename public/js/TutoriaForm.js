document.addEventListener('DOMContentLoaded', () => {

    function listarCursos() {
        fetch('/sige_tutorias/cursos', {
            method: 'GET'
        })
        .then((response) => {
            if(!response.ok) {
                throw new Error('Erro na requisição: ' + response.status);
            }
    
            return response.json();
        })
        .then((response) => {
            var content = `<option value="">Seleccionar Curso</option>`;

            response.forEach((curso) => {
                console.log(curso);

                const html = `
                    <option value="${curso.id_curso}">${curso.nome_curso}</option>
                `;

                content += html;
            });

            document.querySelector('.js-select-curso')
                .innerHTML = `${content}`;
        })
        .catch((error) => {
            console.error(error);
        })
    }

    listarCursos();
    
})

