// Connexion à la base de données
const serveur = "localhost";
const utilisateur = "root";
const mot_de_passe = "";
const base_de_donnees = "fitzone";

const connexion = mysqli_connect(serveur, utilisateur, mot_de_passe, base_de_donnees);

// Requête SQL pour effectuer une jointure entre les deux tableaux
const sql = "SELECT coach.prenom, coaching.date, coaching.heure, coaching.seance, coaching.likes, coaching.dislikes FROM coaching INNER JOIN coach ON coaching.id_coach = coach.id";

// Exécution de la requête
const resultat = mysqli_query(connexion, sql);

// Affichage des résultats
const coach = document.createElement("td");
coach.innerText = ligne["prenom"];
tr.appendChild(coach);

const date = document.createElement("td");
date.innerText = ligne["date"];
tr.appendChild(date);

const heure = document.createElement("td");
heure.innerText = ligne["heure"];
tr.appendChild(heure);

const seance = document.createElement("td");
seance.innerText = ligne["seance"];
tr.appendChild(seance);

const likes = document.createElement("td");
const likesButton = document.createElement("button");
likesButton.classList.add("like-button");
likesButton.innerText = ligne["likes"];
likes.appendChild(likesButton);
tr.appendChild(likes);

const dislikes = document.createElement("td");
const dislikesButton = document.createElement("button");
dislikesButton.classList.add("dislike-button");
dislikesButton.innerText = ligne["dislikes"];
dislikes.appendChild(dislikesButton);
tr.appendChild(dislikes);

coachingSchedule.appendChild(tr);