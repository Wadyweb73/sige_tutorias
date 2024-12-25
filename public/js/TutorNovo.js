document.getElementById('novoTutorForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    
    const nome = document.getElementById('nome').value;
    const idFaculdade = document.getElementById('id_faculdade').value;
    const idCurso = document.getElementById('id_curso').value;
    const idDisciplina = document.getElementById('id_disciplina').value;

    const tutorData = {
        nome: nome,
        id_faculdade: idFaculdade,
        id_curso: idCurso,
        id_disciplina: idDisciplina
    };

    try {
        const response = await fetch('/sige_tutorias/docente', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(tutorData)
        });

        if (!response.ok) {
            throw new Error('Erro ao cadastrar o tutor');
        }

        alert('Tutor cadastrado com sucesso!');
        window.location.href = 'TutorLista.html'; // Redireciona para a lista de tutores
    } catch (error) {
        console.error(error);
        alert('Erro ao cadastrar o tutor: ' + error.message);
    }
});