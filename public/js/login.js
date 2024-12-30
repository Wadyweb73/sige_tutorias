async function login() {
  
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (!email || !password) {
        alert("Por favor, preencha todos os campos!");
        return;
    }

    try {
        const response = await fetch("/sige_tutorias/entrar", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ email, password }),
        });

        if (response.ok) {
            // window.location.href = "../Views/home.html";

            const result = await response.json(); 

            console.log(result);
            if (result === true) {
               
                window.location.href = "../Views/home.html";
            } else {
                alert("Credenciais inválidas. Por favor, tente novamente.");
            }
        } else {
         
            const errorMessage = await response.text();
            alert("Erro no login: " + errorMessage);
        }
    } catch (error) {
        console.error("Erro ao realizar login:", error);
        alert("Não foi possível conectar ao servidor. Tente novamente.");
    }
}
