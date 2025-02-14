# Projet PHP : Développement d'un Portfolio en PHP
## Présentation du projet

Le projet est une application web permettant de gérer les utilisateurs, leurs compétences, ainsi que leurs projets. 

L'application permet à un administrateur d'ajouter et de supprimer des compétences, tandis que les utilisateurs peuvent créer et gérer leurs projets en ajoutant des compétences associées.

 L'application est construite avec une architecture MVC (Modèle-Vue-Contrôleur) pour séparer clairement la logique métier, l'affichage, et la gestion des données. 

## Liste des fonctionnalités implémentées 

- **Authentification des utilisateurs** : Inscription, connexion, et déconnexion des utilisateurs. 
-  **Gestion des profils** : Affichage des informations personnelles de l'utilisateur (nom, email, projets). 
- **Gestion des projets** : Création, consultation, et suppression de projets par les utilisateurs.
- **Gestion des compétences** : L'administrateur peut ajouter, lister et supprimer des compétences. 
-  **Tableau de bord** : Les utilisateurs ont accès à un tableau de bord contenant leurs projets, avec des compétences associées. 
- **Liaison des compétences aux projets** : Chaque projet peut être associé à une ou plusieurs compétences via une table intermédiaire. 
- **Rôles utilisateurs** : L'administrateur peut effectuer des actions réservées (ajouter/supprimer des compétences), tandis que les utilisateurs ont des permissions limitées aux projets.


## Instructions d'installation et d'utilisation
 ### Prérequis
  - PHP 7.x ou supérieur 
  - Serveur web (Apache ou Nginx) 
  - MySQL ou MariaDB pour la gestion de la base de donnée

## Installation
**1. Clonez le dépôt** : 

``git clone https://github.com/votre-utilisateur/projetb2.git``

``cd projetb2``

**2. Créez la base de données** :

 Exécutez les requêtes SQL du fichier suivant dans votre client MySQL ou PHPMyAdmin pour créer la base de données `projetb2` et ses tables.
 
``/sql/create_db.sql``

**2.1. Ajoutez les données de test dans la base de données** :

 Exécutez les requêtes SQL du fichier suivant dans votre client MySQL ou PHPMyAdmin pour ajouter les données de test dans la base de données `projetb2`
 
``/sql/insert_datas.sql``

**2.2. Modifier la configuration du client SQL** :

Modifiez les variables du fichier suivant afin d'utiliser les bonnes configurations pour votre base de données

``/config/database.sql``

**3.  Lancez le serveur web** :

 A la racine du projet, vous pouvez utiliser la commande suivante afin de lancer le serveur web sur le port ``8000``
 
``php -S localhost:8000``


## Utilisation

**1. Accédez à l'application** :
-   Ouvrez votre navigateur et allez sur http://localhost:8000 ou l'URL de votre serveur.
-   Vous serez redirigé vers la page de connexion.

**2. Se connecter** : 

-   Utilisez les informations d'identification des comptes de test (voir plus bas).

**3. Navigation** :

-   Une fois connecté, vous pouvez accéder au tableau de bord de l'utilisateur, gérer vos projets, ajouter des compétences, etc.

## Accès aux comptes de test

### Utilisateur administrateur

-   **Email** : `admin@example.com`
-   **Mot de passe** : `password`

### Utilisateur standard

-   **Email** : `user@example.com`
-   **Mot de passe** : `password`

### Autre utilisateur

-   **Email** : `user2@example.com`
-   **Mot de passe** : `password`

**Note** : L'administrateur peut ajouter, supprimer et modifier les compétences à partir de la section "Administration" trouvable dans le profil de l'utilisateur.

## Technologies utilisées

-   **Backend** :
    
    -   PHP 7.x ou supérieur
    -   MySQL pour la base de données
-   **Frontend** :
    
    -   HTML5
    -   CSS3 (pour la mise en forme et la présentation)

-   **Sécurité** :
    
    -   Utilisation de mots de passe hashés avec bcrypt pour une sécurité accrue.
    -   Protection des routes par des vérifications de rôle (admin vs user).
-   **Architecture** :
    
    -   Architecture MVC (Modèle-Vue-Contrôleur)
-   **Gestion des dépendances** :
    
    -   Le projet utilise des outils PHP natifs.

## Auteurs

-   **Corindpz** - Développeur - [Corindpz](https://github.com/Corindpz/)
-   **romaingdr** - Développeur - [romaingdr](https://github.com/romaingdr)