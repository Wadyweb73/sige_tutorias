# Sistema de Gestão de Tutorias
Este é um projecto de desenvolvimento de um Sistema de Gestão de Tutorias para o Centro de Ensino à Distância da Universidade Pedagógica de Maputo
### Descrição e Objectivo do Sistema
O sistema a ser desenvolvido tem como objectivo auxiliar os docentes e discentes do Ensino à distância da UP Maputo no processo de ensino e aprendizagem. 
O sistema deverá permitir que, ao final de cada tutoria presencial, os tutores possam escrever um relatório sobre o evento, indicando o número da tutoria (se é a primeira, segunda, terceira ou outra), o local (Centro e Recursos), os assuntos abordados e quantos o estudantes se fizeram presentes.


## Documentação da API e Fluxo do Programa
## 1. **Login**
- **Rota**: `/sige_tutorias`
  - Exibe a página de login (`login.html`).
- **POST**: `/sige_tutorias/login`
  - Controlador: `UserController`
  - Verifica credenciais do usuário e autentica.
- **POST**: `/sige_tutorias/entrar`
  - Dados no corpo da requisição: `email`, `password`.
  - Controlador: `DocenteController`
  - Retorna uma resposta JSON com o resultado da autenticação.

---

## 2. **Registo de Usuário**
- **GET**: `/sige_tutorias/registar`
  - Exibe o formulário de registo de usuário (`signup.html`).
- **POST**: `/sige_tutorias/signup`
  - Controlador: `UserController`
  - Regista um novo usuário com as informações fornecidas.

---

## 3. **Faculdades**
### Registo de Faculdade
- **POST**: `/sige_tutorias/faculdade/registar`
  - Dados enviados via `POST`: `nome_faculdade`, `endereco`.
  - Controlador: `FaculdadeController`
  - Redireciona para a página de lista de faculdades.

### Listagem e Visualização
- **GET**: `/sige_tutorias/faculdades`
  - Lista todas as faculdades.
- **GET**: `/sige_tutorias/faculdade/{id}`
  - Exibe os detalhes de uma faculdade específica.

### Atualização
- **POST**: `/sige_tutorias/faculdade/{id}/actualizar`
  - Atualiza as informações de uma faculdade.

### Exclusão
- **DELETE**: `/sige_tutorias/faculdade/{id}/apagar`
  - Apaga uma faculdade.

---

## 4. **Tutores (Docentes)**
### Registo de Tutor
- **POST**: `/sige_tutorias/docente/registar`
  - Dados enviados via `POST`: `id_faculdade`, `id_curso`, `id_disciplina`, `nome`.
  - Controlador: `DocenteController`
  - Regista um novo tutor e redireciona para a lista de tutores.

### Listagem e Visualização
- **GET**: `/sige_tutorias/docentes`
  - Lista todos os tutores.
- **GET**: `/sige_tutorias/docente/{id}`
  - Exibe os detalhes de um tutor específico.

### Atualização
- **POST**: `/sige_tutorias/docente/{id}/actualizar`
  - Atualiza as informações de um tutor.

### Exclusão
- **DELETE**: `/sige_tutorias/docente/{id}/apagar`
  - Apaga um tutor.

---

## 5. **Cursos**
### Registo de Curso
- **POST**: `/sige_tutorias/curso/registar`
  - Dados enviados via `POST`: `id_faculdade`, `nome`.
  - Controlador: `CursoController`
  - Regista um novo curso e redireciona para a lista de cursos.

### Listagem e Visualização
- **GET**: `/sige_tutorias/cursos`
  - Lista todos os cursos.
- **GET**: `/sige_tutorias/curso/{id}`
  - Exibe os detalhes de um curso específico.

### Atualização
- **POST**: `/sige_tutorias/curso/{id}/actualizar`
  - Atualiza as informações de um curso.

### Exclusão
- **DELETE**: `/sige_tutorias/curso/{id}/apagar`
  - Apaga um curso.

---

## 6. **Tutorias**
### Registo de Tutoria
- **POST**: `/sige_tutorias/tutoria/registar`
  - Dados enviados via `POST`: `id_disciplina`, `id_docente`, `hora_inicio`, `hora_termino`, `data_registo`, `descricao`.
  - Controlador: `TutoriaController`
  - Regista uma nova tutoria e redireciona para a lista de tutorias.

### Atualização
- **POST**: `/sige_tutorias/tutoria/{id}/actualizar`
  - Atualiza as informações de uma tutoria.

---

## 7. **Disciplinas**
### Registo de Disciplina
- **POST**: `/sige_tutorias/disciplina/registar`
  - Dados enviados via `POST`: `nome_disciplina`, `id_curso`.
  - Controlador: `DisciplinaController`
  - Regista uma nova disciplina.

### Listagem e Visualização
- **GET**: `/sige_tutorias/disciplinas`
  - Lista todas as disciplinas.
- **GET**: `/sige_tutorias/disciplina/{id}`
  - Exibe os detalhes de uma disciplina específica.

### Atualização
- **POST**: `/sige_tutorias/disciplina/{id}/actualizar`
  - Atualiza as informações de uma disciplina.

### Exclusão
- **DELETE**: `/sige_tutorias/disciplina/{id}/apagar`
  - Apaga uma disciplina.

---

## 8. **Avaliações**
### Registo de Avaliação
- **POST**: `/sige_tutorias/avaliacao/registar`
  - Dados enviados via `POST`: `id_disciplina`, `id_docente`, `teste_numero`, `supervisor`, `data_realizacao`, `hora_inicio`, `hora_fim`, `local`, `modalidade`, `tipo_avaliacao`.
  - Controlador: `AvaliacaoController`
  - Regista uma nova avaliação.

### Visualização
- **GET**: `/sige_tutorias/avaliacao/visualizar/{id}`
  - Exibe os detalhes de uma avaliação específica.

### Atualização
- **POST**: `/sige_tutorias/avaliacao/actualizar/{id}`
  - Atualiza as informações de uma avaliação.

### Exclusão
- **DELETE**: `/sige_tutorias/avaliacao/apagar/{id}`
  - Apaga uma avaliação.

---

## Observações Finais
- Todas as requisições são geridas por um sistema de rotas utilizando a classe `Router`.
- A estrutura do programa está separada em **Models**, **Controllers** e **Views**, garantindo organização e legibilidade.
- Os redirecionamentos utilizam páginas HTML específicas para exibir os resultados das operações (ex.: `FaculdadeLista.html`, `TutorLista.html`).
