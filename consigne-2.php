<?php

// *******************************
// ÉTAPE 1 : MODIFIER LA TABLE BDD
// - Ajoute une colonne 'password' dans la table 'user'.
//   ALTER TABLE user ADD COLUMN password VARCHAR(255) NOT NULL;
// *******************************

// *******************************
// ÉTAPE 2 : FICHIER register.php (INSCRIPTION)
// - Crée un formulaire : nom, email, password.
// - À la soumission du formulaire :
//    1) Récupère les données du POST.
//    2) Hash le mot de passe avec password_hash().
//       Exemple : $hashed_password = password_hash($password, PASSWORD_DEFAULT);
//    3) INSERT INTO user (nom, email, password) VALUES (...)
// - Pense à utiliser prepare() et bindParam() pour sécuriser l’insertion.
// *******************************

// *******************************
// ÉTAPE 3 : FICHIER login.php (CONNEXION)
// - Crée un formulaire : email, password.
// - À la soumission du formulaire :
//    1) Récupère les données du POST (email et password).
//    2) SELECT password FROM user WHERE email = :email
//       (récupère le hash du mot de passe stocké pour cet email).
//    3) Utilise password_verify() pour comparer le password fourni et le hash stocké.
//       Exemple : if (password_verify($password_saisi, $hashed_password_bdd)) { ... }
// - Si OK, démarre une session et stocke l’état connecté (ex. $_SESSION['email']).
// - Sinon, affiche un message d’erreur.
// *******************************

// *******************************
// ÉTAPE 4 : LOGOUT.PHP (DÉCONNEXION)
// - Crée un bouton ou un lien de déconnexion.
// - Quand on clique :
//    1) Lance session_start().
//    2) session_destroy() pour supprimer la session et déconnecter l’utilisateur.
// - Redirige vers la page de login ou d’accueil.
// *******************************

// *******************************
// BONUS : BONNES PRATIQUES
// - Toujours utiliser prepare() et bindParam() pour éviter les injections SQL.
// - Ne jamais stocker les mots de passe en clair dans la BDD.
// - Ne pas indiquer si c’est “email invalide” ou “password invalide” pour éviter les attaques.
// - Tu peux aussi afficher un message “Bienvenue, [utilisateur]” quand connecté.
// - Sinon, propose un lien “S’inscrire” ou “Se connecter” si pas connecté.
// *******************************
