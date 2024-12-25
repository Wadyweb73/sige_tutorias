
document.addEventListener('DOMContentLoaded', () => {
    const tutorData = JSON.parse(localStorage.getItem('editTutorData'));

    if (tutorData) {
        document.getElementById('nome').value = tutorData.nome_docente;
        document.getElementById('faculdade').value = tutorData.nome_facul;
        document.getElementById('disciplina').value = tutorData.nome_disciplina;
    }

    document.getElementById('edit-tutor-form').addEventListener('submit', async (event) => {
        event.preventDefault();

        const updatedTutor = {
            nome_docente: document.getElementById('nome').value,
            faculdade: document.getElementById('faculdade').value,
            disciplina: document.getElementById('disciplina').value,
        };

        // Chamada para salvar os dados atualizados
        const response = await fetch(`/sige_tutorias/docente/${tutorData.id_docente}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(updatedTutor)
        });

        if (response.ok) {
            alert('Dados do tutor atualizados com sucesso!');
            window.location.href = './TutorLista.html';
        } else {
            alert('Erro ao atualizar os dados do tutor.');
        }
    });
});
