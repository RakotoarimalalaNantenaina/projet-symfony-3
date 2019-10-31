function rechercher() {
    var todo = document.getElementById("search");
    if (document.getElementById('search').value == "") {
        erreur.innerHTML = "Veuillez remplir le champ";
        return;
    }
}

function valider() {
    document.getElementById("pay").innerHTML = "Votre paiement est en cours d'execution";
}