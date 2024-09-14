export async function listarCursos() {
    const response = await fetch('/sige_tutorias/cursos', {
        method: 'GET'
    });
 
    if(!response.ok) {
        throw new Error("There was an error trying to fetch Lista de Cursos");
    }

    return await response.json();
}