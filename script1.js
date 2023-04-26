function validatenom() {
    const nom = document.getElementById("nom");
    const nomError = document.getElementById("nom-error");
    if (nom.value.length < 3) {
        nomError.innerHTML = "nom doit avoir au moins 3 caractères";
    } else {
        nomError.innerHTML = "Correcte";
    }
}

function validateidEvent() {
    const idEvent = document.getElementById("idEvent");
    const idEventError = document.getElementById("idEvent-error");
    if (idEvent.value < 1) {
    idEventError.innerHTML = "Le idEventéro doit être supérieur à 0";
    } else {
    idEventError.innerHTML = "Correcte";
    }
}


function validateForm() {
    const nom = document.getElementById("nom");
    const idEvent = document.getElementById("idEvent");
    const nomError = document.getElementById("nom-error");
    const idEventError = document.getElementById("idEvent-error");
    validatenom();
    validateidEvent();
    if (
    nomError.innerHTML === "Correcte" &&
    idEventError.innerHTML === "Correcte"
    ) {
    alert("Le formulaire est valide");
    return true;
    } else {
    alert("Le formulaire contient des erreurs");
    return false;
    }
}