async function getSeiju(id) {
    // On requête l'API pour récupérer le seiju
    let api_seiju = await fetch("./API/api.php?id="+id)
    let seiju = await api_seiju.json()
    if (seiju[0] != undefined) {
        document.getElementById("seiju"+id).innerHTML += seiju[0].nom
    } else {
        document.getElementById("seiju"+id).innerHTML += "Aucun"
    }
}