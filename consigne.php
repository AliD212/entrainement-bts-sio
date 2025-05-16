<?php


// ===========================================
// ** Étapes à suivre pour les ajouts de fonctionnalités **
// ===========================================

// 1. **Suppression d'un utilisateur :**
//    - Ajouter un bouton de suppression pour chaque utilisateur dans la liste.
//    - Quand ce bouton est cliqué, l'utilisateur est supprimé du tableau (session).
//    - Utiliser la fonction `unset()` pour retirer l'élément du tableau en session.
//    - Il faudra aussi ajouter un mécanisme pour vérifier quel utilisateur est supprimé (par exemple, via l'ID ou l'email).
//
// Exemple de modification :
//   - Ajouter un bouton "Supprimer" à chaque utilisateur dans `users.php`
//   - Créer une page `delete.php` ou un appel AJAX pour effectuer la suppression en arrière-plan.
//
//    // Code pour ajouter un bouton de suppression à chaque utilisateur
//    echo "<a href='delete.php?id=" . $user['email'] . "'>Supprimer</a>";
//
//    // Dans `delete.php`, tu récupères l'email de l'utilisateur à supprimer et tu fais un `unset()` pour le retirer du tableau en session.


// 2. **Modification d'un utilisateur :**
//    - Permettre à l'utilisateur de modifier son nom ou son e-mail.
//    - Ajouter un formulaire dans `users.php` pour modifier les informations de chaque utilisateur.
//    - Quand l'utilisateur soumet le formulaire, mettre à jour les informations dans la session.
//    - Peut-être créer une page `edit.php` qui récupère l'email de l'utilisateur, puis un formulaire pré-rempli avec les informations actuelles.
//
// Exemple de modification :
//   - Créer un formulaire de modification dans `users.php`
//   - Lorsque le formulaire est soumis, utiliser un bouton ou un lien pour rediriger l'utilisateur vers `edit.php` où les informations sont mises à jour dans la session.
//   - Assurer que l'utilisateur peut modifier le nom et l'email.

// 3. **Recherche d'un utilisateur par e-mail :**
//    - Ajouter un champ de recherche dans `index.php` ou `users.php`.
//    - Quand un e-mail est saisi et soumis, afficher uniquement l'utilisateur correspondant dans la liste.
//    - Effectuer une recherche dans le tableau des utilisateurs en utilisant la fonction `array_search()` ou une boucle `foreach()`.
//
// Exemple de modification :
//   - Créer un formulaire de recherche avec un champ d'email.
//   - En soumettant ce formulaire, rechercher l'utilisateur dans la session en utilisant `array_filter()` pour filtrer le tableau des utilisateurs.
//   - Afficher les résultats correspondant à l'email dans `users.php`.


// 4. **Stockage des utilisateurs dans une base de données :**
//    - Au lieu de stocker les utilisateurs dans la session, les stocker dans une base de données (par exemple, MySQL ou SQLite).
//    - Créer une table "users" dans la base de données avec des colonnes pour le nom et l'email.
//    - Remplacer les sessions par des appels SQL pour insérer, mettre à jour, supprimer et récupérer les utilisateurs.
//
// Exemple de modification :
//   - Créer une base de données `users.db` avec une table `users` qui a des colonnes `id`, `name`, et `email`.
//   - Remplacer l'ajout d'utilisateurs en session par une requête SQL `INSERT INTO users (name, email)`.
//   - Faire une mise à jour des utilisateurs avec une requête SQL `UPDATE`.
//   - Ajouter un formulaire pour saisir les informations des utilisateurs et les stocker en base.


// 5. **Gestion des erreurs :**
//    - Ajouter une gestion d'erreurs pour vérifier si l'email d'un utilisateur existe déjà avant d'ajouter un nouvel utilisateur.
//    - Si l'email est déjà utilisé, afficher un message d'erreur au lieu d'ajouter l'utilisateur.
//    - Cette gestion d'erreur peut être réalisée en vérifiant l'email dans la base de données ou dans le tableau des utilisateurs en session.
//
// Exemple de modification :
//   - Avant d'ajouter un nouvel utilisateur, vérifier si son e-mail existe déjà dans la session ou la base de données.
//   - Si l'email existe déjà, afficher un message d'erreur et ne pas ajouter l'utilisateur.
//   - Pour une base de données, tu peux faire une requête SQL `SELECT * FROM users WHERE email = '$email'` avant d'ajouter l'utilisateur.

// ===========================================
// Fin des étapes à implémenter
// ===========================================
