window.onload = function() {
    const id_seance = document.getElementById("id_seance");
    const date = document.getElementById("date");
    const heure = document.getElementById("heure");
    const nb_participant = document.getElementById("nb_participant");
    const seance = document.getElementById("seance");

    const regexId = /^[0-9]{8}$/;
    const regexDate = /^\d{4}-\d{2}-\d{2}$/;
    const regexTime = /^\d{2}:\d{2}$/;
    const regexNumber = /^[0-9]+$/;
    const regexName = /^[a-zA-Z\s]+$/;

    id_seance.addEventListener('input', function () {
      if (!regexId.test(id_seance.value)) {
        id_seance.setCustomValidity("L'identifiant de séance doit contenir 8 chiffres");
      } else {
        id_seance.setCustomValidity("");
      }
    });

    date.addEventListener('input', function () {
      if (!regexDate.test(date.value)) {
        date.setCustomValidity("La date doit être au format 'yyyy-mm-dd'");
      } else {
        date.setCustomValidity("");
      }
    });

    heure.addEventListener('input', function () {
      if (!regexTime.test(heure.value)) {
        heure.setCustomValidity("L'heure doit être au format 'hh:mm'");
      } else {
        heure.setCustomValidity("");
      }
    });

    nb_participant.addEventListener('input', function () {
      if (!regexNumber.test(nb_participant.value)) {
        nb_participant.setCustomValidity("Le nombre de participants doit être un nombre entier positif");
      } else {
        nb_participant.setCustomValidity("");
      }
    });

    seance.addEventListener('input', function () {
      if (!regexName.test(seance.value)) {
        seance.setCustomValidity("Le nom de la séance doit contenir seulement des caractères alphabétiques");
      } else {
        seance.setCustomValidity("");
      }
    });
};