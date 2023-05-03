function validateNom() {
    const nom = document.getElementById("nom").value;
    const nomMessage = document.getElementById("nom-message");

    if (nom === "") {
    nomMessage.textContent = "Le nom est obligatoire";
    } else {
    nomMessage.textContent = "Correct";
    }
    validateForm();
}

function validatePrenom() {
    const prenom = document.getElementById("prenom").value;
    const prenomMessage = document.getElementById("prenom-message");

    if (prenom === "") {
    prenomMessage.textContent = "Le prénom est obligatoire";
    } else {
    prenomMessage.textContent = "Correct";
    }
    validateForm();
}

function validateAge() {
    const age = document.getElementById("age").value;
    const ageMessage = document.getElementById("age-message");

    if (age === "" || age < 18) {
    ageMessage.textContent = "L'âge doit être supérieur ou égal à 18 ans";
    } else {
    ageMessage.textContent = "Correct";
    }
    validateForm();
}

function validateMail() {
    const mail = document.getElementById("mail").value;
    const mailMessage = document.getElementById("mail-message");

    if (mail === "" || !mail.includes("@")) {
    mailMessage.textContent = "Le mail doit être valide";
    } else {
    mailMessage.textContent = "Correct";
    }
    validateForm();
}

function validateRole() {
    const role = document.getElementById("role").value;
    const roleMessage = document.getElementById("role-message");

    if (role === "") {
    roleMessage.textContent = "Le rôle est obligatoire";
    } else {
    roleMessage.textContent = "Correct";
    }
    validateForm();
}

function validateMdp() {
    const mdp = document.getElementById("mdp").value;
    const mdpMessage = document.getElementById("mdp-message");

    if (mdp === "" || mdp.length < 8) {
    mdpMessage.textContent = "Le mot de passe doit contenir au moins 8 caractères";
    } else {
    mdpMessage.textContent = "Correct";
    }
    validateForm();
}

function validateMdp2() {
    const mdp2 = document.getElementById("mdp2").value;
    const mdp2Message = document.getElementById("mdp2-message");
    const mdp = document.getElementById("mdp").value;

    if (mdp2 === "" || mdp !== mdp2) {
    mdp2Message.textContent = "Les mots de passe doivent correspondre";
    } else {
    mdp2Message.textContent = "Correct";
    }
    validateForm();
}

function validateForm() {
    const nom = document.getElementById("nom").value;
    const prenom = document.getElementById("prenom").value;
    const age = document.getElementById("age").value;
    const mail = document.getElementById("mail").value;
    const role = document.getElementById("role").value;
    const mdp = document.getElementById("mdp").value;
    const mdp2 = document.getElementById("mdp2").value;
    const submitButton = document.querySelector("input[type='submit']");

    if (
    nom !== "" &&
    prenom !== "" &&
    age !== "" &&
    age >= 18 &&
    mail !== "" &&
    mail.includes("@") &&
    role !== "" &&
    mdp !== "" &&
    mdp.length >= 8 &&
    mdp2 !== "" &&
    mdp === mdp2
    ) {
    submitButton.disabled = false;
    } else {
    submitButton.disabled = true;
    }
}
