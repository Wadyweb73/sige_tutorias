
# Sistema de Gestão de Tutorias
Este é um projecto de desenvolvimento de um Sistema de Gestão de Tutorias para o Centro de Ensino à Distância da Universidade Pedagógica de Maputo
### Descrição e Objectivo do Sistema
O sistema a ser desenvolvido tem como objectivo auxiliar os docentes e discentes do Ensino à distância da UP Maputo no processo de ensino e aprendizagem. 
O sistema deverá permitir que, ao final de cada tutoria presencial, os tutores possam escrever um relatório sobre o evento, indicando o número da tutoria (se é a primeira, segunda, terceira ou outra), o local (Centro e Recursos), os assuntos abordados e quantos o estudantes se fizeram presentes.


## Documentação da API

## Faculdade

### 1. Registrar Faculdade
**Endpoint:**
```
POST /faculdade/registar
```
**Request Body:**
```json
{
    "nome_faculdade": "string",
    "endereco": "string"
}
```
**Response:**
```json
{
    "status": "success",
    "message": "Faculdade registrada com sucesso."
}
```

---

### 2. Visualizar Faculdade
**Endpoint:**
```
GET /faculdade/{id}
```
**Path Parameters:**
- `id` (int): ID da faculdade

**Response:**
```json
{
    "id": "int",
    "nome_faculdade": "string",
    "endereco": "string"
}
```

---

### 3. Listar Faculdades
**Endpoint:**
```
GET /faculdades
```
**Response:**
```json
[
    {
        "id": "int",
        "nome_faculdade": "string",
        "endereco": "string"
    },
    ...
]
```

---

### 4. Atualizar Faculdade
**Endpoint:**
```
POST /faculdade/{id}/actualizar
```
**Path Parameters:**
- `id` (int): ID da faculdade

**Request Body:**
```json
{
    "nome_faculdade": "string",
    "endereco": "string"
}
```
**Response:**
```json
{
    "status": "success",
    "message": "Faculdade atualizada com sucesso."
}
```

---

### 5. Apagar Faculdade
**Endpoint:**
```
DELETE /faculdade/{id}/apagar
```
**Path Parameters:**
- `id` (int): ID da faculdade

**Response:**
```json
{
    "status": "success",
    "message": "Faculdade apagada com sucesso."
}
```

---

## Docente

### 1. Registrar Docente
**Endpoint:**
```
POST /docente/registar
```
**Request Body:**
```json
{
    "id_faculdade": "int",
    "id_curso": "int",
    "id_disciplina": "int",
    "nome": "string"
}
```
**Response:**
```json
{
    "status": "success",
    "message": "Docente registrado com sucesso."
}
```

---

### 2. Visualizar Docente
**Endpoint:**
```
GET /docente/{id}
```
**Path Parameters:**
- `id` (int): ID do docente

**Response:**
```json
{
    "id": "int",
    "nome": "string",
    "id_faculdade": "int",
    "id_curso": "int",
    "id_disciplina": "int"
}
```

---

### 3. Listar Docentes
**Endpoint:**
```
GET /docentes
```
**Response:**
```json
[
    {
        "id": "int",
        "nome": "string",
        "id_faculdade": "int",
        "id_curso": "int",
        "id_disciplina": "int"
    },
    ...
]
```

---

### 4. Atualizar Docente
**Endpoint:**
```
POST /docente/{id}/actualizar
```
**Path Parameters:**
- `id` (int): ID do docente

**Request Body:**
```json
{
    "id_faculdade": "int",
    "id_curso": "int",
    "id_disciplina": "int",
    "nome": "string"
}
```
**Response:**
```json
{
    "status": "success",
    "message": "Docente atualizado com sucesso."
}
```

---

### 5. Apagar Docente
**Endpoint:**
```
DELETE /docente/{id}/apagar
```
**Path Parameters:**
- `id` (int): ID do docente

**Response:**
```json
{
    "status": "success",
    "message": "Docente apagado com sucesso."
}
```

### 6. Autenticar Docente
**Endpoint:**
```
POST /docente/autenticar
```
**Request Body:**
```json
{
   
    "email": "string",
    "password": "string"
}
```
**Response:**
```json
{
    "status": "success",
    "message": "Docente registrado com sucesso."
}
```

---

## Curso

### 1. Registrar Curso
**Endpoint:**
```
POST /curso/registar
```
**Request Body:**
```json
{
    "id_faculdade": "int",
    "nome": "string"
}
```
**Response:**
```json
{
    "status": "success",
    "message": "Curso registrado com sucesso."
}
```

---

### 2. Visualizar Curso
**Endpoint:**
```
GET /curso/{id}
```
**Path Parameters:**
- `id` (int): ID do curso

**Response:**
```json
{
    "id": "int",
    "nome": "string",
    "id_faculdade": "int"
}
```

---

### 3. Listar Cursos
**Endpoint:**
```
GET /cursos
```
**Response:**
```json
[
    {
        "id": "int",
        "nome": "string",
        "id_faculdade": "int"
    },
    ...
]
```

---

### 4. Atualizar Curso
**Endpoint:**
```
POST /curso/{id}/actualizar
```
**Path Parameters:**
- `id` (int): ID do curso

**Request Body:**
```json
{
    "id_faculdade": "int",
    "nome": "string"
}
```
**Response:**
```json
{
    "status": "success",
    "message": "Curso atualizado com sucesso."
}
```

---

### 5. Apagar Curso
**Endpoint:**
```
DELETE /curso/{id}/apagar
```
**Path Parameters:**
- `id` (int): ID do curso

**Response:**
```json
{
    "status": "success",
    "message": "Curso apagado com sucesso."
}
```

---
