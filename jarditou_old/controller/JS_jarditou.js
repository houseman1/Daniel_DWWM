//form
let formContact = document.getElementById("formContact");
//nom
let errorNom = document.getElementById("errorNom");
let valueNom = document.getElementById("valueNom");
//prénom
let errorPrenom = document.getElementById("errorPrenom");
let valuePrenom = document.getElementById("valuePrenom");
//date de naissance
let errorDdn = document.getElementById("errorDdn");
let valueDdn = document.getElementById("valueDdn");
//code postal
let errorCode = document.getElementById("errorCode");
let valueCode = document.getElementById("valueCode");
let regexCode = /\d{2}[ ]?\d{3}/;
//email
let errorEmail = document.getElementById("errorEmail");
let valueEmail = document.getElementById("valueEmail");
let regexEmail = /(^[\w.-]+@[a-z]+[.]{1}[a-z]{2,3}$)/;
//select
let errorSelect = document.getElementById("errorSelect");
let valueSelect = document.getElementById("valueSelect");
//question
let errorQuestion = document.getElementById("errorQuestion");
let valueQuestion = document.getElementById("valueQuestion");
//checkbox
let errorCheckbox = document.getElementById("errorCheckbox");
let valueCheckbox = document.getElementById("valueCheckbox");

//alert for invalid inputs
let alertNom = " votre nom\n";
let alertPrenom = " votre prénom\n";
let alertDdn = " votre date de naissance\n";
let alertCode = " votre code postal (5 nombres)\n";
let alertEmail = " votre adresse e-mail avec un symbole @\n";
let alertSelect = " un sujet\n";
let alertQuestion = " votre question\n";
let alertCheckbox = " il faut accepter le traitment de ce formulaire\n";
let alertArray = ["Entrez:\n"];
let arrayIndex = 0;




//validate inputs
formContact.addEventListener("submit", function(event) {

   //nom
    if (valueNom.value.length < 1) {
        event.preventDefault();
        errorNom.innerHTML = "non-validé";
        if (!alertArray.includes(alertNom)) {
            alertArray.push(alertNom);
            } 
    } else {
        errorNom.innerHTML = "";
        if (alertArray.includes(alertNom)) {
            arrayIndex = alertArray.indexOf(alertNom);
            alertArray.splice(arrayIndex, 1);
        }
    }
    //prénom
    if (valuePrenom.value.length < 1) {
        event.preventDefault();
        errorPrenom.innerHTML = "non-validé";
        if (!alertArray.includes(alertPrenom)) {
            alertArray.push(alertPrenom);
            } 
    } else {
        errorPrenom.innerHTML = "";
        if (alertArray.includes(alertPrenom)) {
            arrayIndex = alertArray.indexOf(alertPrenom);
            alertArray.splice(arrayIndex, 1);
        }
    }
    //date de naissance
    if (valueDdn.value.length < 1) {
        event.preventDefault();
        errorDdn.innerHTML = "non-validé";
        if (!alertArray.includes(alertDdn)) {
            alertArray.push(alertDdn);
            } 
    } else {
        errorDdn.innerHTML = "";
        if (alertArray.includes(alertDdn)) {
            arrayIndex = alertArray.indexOf(alertDdn);
            alertArray.splice(arrayIndex, 1);
        }
    }
    //code postal
    if ( (!regexCode.test(valueCode.value))) {
        event.preventDefault();
        errorCode.innerHTML = "non-validé";
        if (!alertArray.includes(alertCode)) {
            alertArray.push(alertCode);
            } 
    } else {
        errorCode.innerHTML = "";
        if (alertArray.includes(alertCode)) {
            arrayIndex = alertArray.indexOf(alertCode);
            alertArray.splice(arrayIndex, 1);
        }
    }
    //email
    if ( (!regexEmail.test(valueEmail.value))) {
        event.preventDefault();
        errorEmail.innerHTML = "non-validé";
        if (!alertArray.includes(alertEmail)) {
            alertArray.push(alertEmail);
            } 
    } else {
        errorEmail.innerHTML = "";
        if (alertArray.includes(alertEmail)) {
            arrayIndex = alertArray.indexOf(alertEmail);
            alertArray.splice(arrayIndex, 1);
        }
    }
    //select
    if (valueSelect.value <1) {
        event.preventDefault();
        errorSelect.innerHTML = "non-validé";
        if (!alertArray.includes(alertSelect)) {
            alertArray.push(alertSelect);
            } 
    } else {
        errorSelect.innerHTML = "";
        if (alertArray.includes(alertSelect)) {
            arrayIndex = alertArray.indexOf(alertSelect);
            alertArray.splice(arrayIndex, 1);
        }
    }
    //question
    if (valueQuestion.value <1) {
        event.preventDefault();
        errorQuestion.innerHTML = "non-validé";
        if (!alertArray.includes(alertQuestion)) {
            alertArray.push(alertQuestion);
            } 
    } else {
        errorQuestion.innerHTML = "";
        if (alertArray.includes(alertQuestion)) {
            arrayIndex = alertArray.indexOf(alertQuestion);
            alertArray.splice(arrayIndex, 1);
        }
    }
    //checkbox
    if (!valueCheckbox.checked) {
        event.preventDefault();
        errorCheckbox.innerHTML = "non-validé";
        if (!alertArray.includes(alertCheckbox)) {
            alertArray.push(alertCheckbox);
            } 
    } else {
        errorCheckbox.innerHTML = "";
        if (alertArray.includes(alertCheckbox)) {
            arrayIndex = alertArray.indexOf(alertCheckbox);
            alertArray.splice(arrayIndex, 1);
        }
    }   
    //alert
    if (alertArray.length > 1) {
        let a = alertArray.join(" ");
        console.log(alertArray);
        alert(a);
    }
});