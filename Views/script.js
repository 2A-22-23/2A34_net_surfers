function verif() {

    var nom = document.forms["Form"]["nom"].value;
    var telephone = document.forms["Form"]["telephone"].value;
    var adresse = document.forms["Form"]["adresse"].value;
    var prix = document.forms["Form"]["prix"].value;
    
    
    var errornom = document.getElementById('errornom');
    var errortelephone = document.getElementById('errortelephone');
    var erroradresse = document.getElementById('erroradresse');
    var errorprix = document.getElementById('errorprix');
    var er1 = 1;
    var er2 = 1;
    var er3 = 1;
    var er4 = 1;
    
    var letters = /^[A-Za-z]+$/;
    

    if (nom == "") {
        errornom.innerHTML = "Veuillez entrer votre nom!";

    }
    else if (!(nom.match(letters) && nom.charAt(0).match(/^[A-Z]+$/))) {
        errornom.innerHTML = "Veuillez entrer un nom valid!";
    } else {
        errornom.innerHTML = "";
        er1 = 0;
    }

   

    if (telephone == "") {
        errortelephone.innerHTML = "Veuillez entrer numero de telephone!";

    }
    else if (!(telephone.match(/[1-9]/) 
        &&
        telephone.length >= 8)){
        errortelephone.innerHTML = "Le mot de telephone doit contenir 8 numbers";

    }
    else {
        errortelephone.innerHTML = "";
        er2 = 0;
    }

    if (adresse == "") {
        erroradresse.innerHTML = "Veuillez entrer votre adress!";

    }
    else if (!adresse.match(",tunis")) {
        erroradresse.innerHTML = "Veuillez entrer une adress qui se termine avec ,tunis";
    }
    else {
        erroradresse.innerHTML = "";
        er3 = 0;
    }

    if (prix == "") {
        errorprix.innerHTML = "Veuillez entrer votre prix!";

    }
    else if (!prix.match(/[0-9]/)) {
        errorprix.innerHTML = "Veuillez entrer prix";
    }
    else {
        errorprix.innerHTML = "";
        er4 = 0;
    }

    


    if (er1 == 1 || er2 == 1 || er3 == 1 || er4 == 1 ) {
        return 1;
    } else {
        return 0;
    }


}

function validateForm(e) {
    if (verif() == 1) {
        e.preventDefault();
    }

};