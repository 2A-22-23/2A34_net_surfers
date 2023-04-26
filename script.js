function validateTitre() {
    const titre = document.getElementById("titre");
    const titreError = document.getElementById("titre-error");
    if (titre.value.length < 3) {
        titreError.innerHTML = "Titre doit avoir au moins 3 caractères";
    } else {
        titreError.innerHTML = "Correcte";
    }
}

function validateDate() {
    const debut = document.getElementById("debut");
    const fin = document.getElementById("fin");
    const debutError = document.getElementById("debut-error");
    constfinError = document.getElementById("fin-error");
    if (debut.value > fin.value) {
        debutError.innerHTML = "La date de début doit être antérieure à la date de fin";
        finError.innerHTML = "La date de fin doit être postérieure à la date de début";
    } else {
        debutError.innerHTML = "Correcte";
        finError.innerHTML = "Correcte";
    }
}

function validateAdresse() {
    const adresse = document.getElementById("adresse");
    const adresseError = document.getElementById("adresse-error");
    if (adresse.value.length < 5) {
    adresseError.innerHTML = "L'adresse doit avoir au moins 5 caractères";
    } else {
    adresseError.innerHTML = "Correcte";
    }
}

function validateNum() {
    const num = document.getElementById("num");
    const numError = document.getElementById("num-error");
    if (num.value < 1) {
    numError.innerHTML = "Le numéro doit être supérieur à 0";
    } else {
    numError.innerHTML = "Correcte";
    }
}

function validateOrganisme() {
    const organisme = document.getElementById("organisme");
    const organismeError = document.getElementById("organisme-error");
    if (organisme.value.length < 5) {
    organismeError.innerHTML = "L'organisme doit avoir au moins 5 caractères";
    } else {
    organismeError.innerHTML = "Correcte";
    }
}

function validateGratuit() {
    const gratuitOui = document.getElementById("gratuit-oui");
    const montant = document.getElementById("montant");
    const gratuitError = document.getElementById("gratuit-error");
    if (gratuitOui.checked) {
    montant.disabled = true;
    gratuitError.innerHTML = "Correcte";
    } else {
    montant.disabled = false;
    validateMontant();
    }
}

function validateMontant() {
    const montant = document.getElementById("montant");
    const montantError = document.getElementById("montant-error");
    if (montant.value < 0) {
    montantError.innerHTML = "Le montant doit être positif";
    } else {
    montantError.innerHTML = "Correcte";
    }
}

function validateForm() {
    const titre = document.getElementById("titre");
    const debut = document.getElementById("debut");
    const fin = document.getElementById("fin");
    const adresse = document.getElementById("adresse");
    const num = document.getElementById("num");
    const organisme = document.getElementById("organisme");
    const montant = document.getElementById("montant");
    const gratuitOui = document.getElementById("gratuit-oui");
    const titreError = document.getElementById("titre-error");
    const debutError = document.getElementById("debut-error");
    const finError = document.getElementById("fin-error");
    const adresseError = document.getElementById("adresse-error");
    const numError = document.getElementById("num-error");
    const organismeError = document.getElementById("organisme-error");
    const montantError = document.getElementById("montant-error");
    const gratuitError = document.getElementById("gratuit-error"); 
    validateTitre();
    validateDate();
    validateAdresse();
    validateNum();
    validateOrganisme();
    validateGratuit();
    validateMontant();

    if (
    titreError.innerHTML === "Correcte" &&
    debutError.innerHTML === "Correcte" &&
    finError.innerHTML === "Correcte" &&
    adresseError.innerHTML === "Correcte" &&
    numError.innerHTML === "Correcte" &&
    organismeError.innerHTML === "Correcte" &&
    montantError.innerHTML === "Correct"
    ) {
    alert("Le formulaire est valide");
    return true;
    } else {
    alert("Le formulaire contient des erreurs");
    return false;
    }
}