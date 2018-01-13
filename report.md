# STI Rapport étude de menaces #

## Introduction ##

## Description du système ##

### Objectifs ###
Le système a pour objectif de permettre aux employés de communiqués entre eux en s’envoyant des messages. Cela contribue au bon fonctionnement de l’entreprise en permettant aux informations de circuler correctement. La qualité du système contribue à la réputation de l’entreprise du point de vue des employés. Plus le système est adéquat et solide, plus les employés comprennent que la société prend en compte leurs besoins.
Hypothèses de sécurité
Afin de garantir la sécurité, le système est uniquement utilisé par des employés de l’entreprise (aucune personne externe ne peut avoir un compte dessus). Les utilisateurs sont donc être créés par un administrateur. L’entreprise s’assure que les administrateurs sont des personnes de confiance.

### Exigences ###

**Informations des utilisateurs:** Tout d’abord, aucune action ne doit être possible sans être authentifié. Les fonctionnalités liées à la gestion des utilisateurs doivent être réservées aux administrateurs. Ils devraient être les seuls à pouvoir créer un nouvel utilisateur, modifier les informations d’un utilisateur ou supprimer un utilisateur. Ils devraient également être les seuls à pouvoir consulter les informations des utilisateurs. Les mots de passe des utilisateurs ne doivent pas être accessibles, même par un administrateur. 

**Messages:** Les messages reçus par les autres utilisateurs ne doivent pas pouvoir être consultés, modifiés ou supprimés. Un utilisateur ne doit pas pouvoir modifier ou supprimer (de la base de données) un message après l’avoir envoyé. Il ne doit pas être possible d’envoyer des messages en se faisant passer pour un autre employé.

Finalement, le système doit pouvoir garantir une disponibilité d’au moins 99%. S’il est acceptable d’avoir des interruptions pour maintenance car le système sera principalement utilisé pendant les heures de bureau, il est important qu’il garantisse une certaine disponibilité afin de ne pas impacter le fonctionnement de l’entreprise.

### Constituants ###

Les deux principaux éléments du système sont l’application et la base de données, qui contient les informations des utilisateurs et les messages. 

Les utilisateurs du système peuvent les deux rôles suivants :

* **Employé:** est autorisé à lire, écrire et supprimer des messages.
* **Administrateur:** en plus de ce que peut faire un employé, est autorisé à gérer les utilisateurs (ajout, modification, suppression).

Les utilisateurs peuvent également être inactifs, peu importe leur rôle, ce qui signifie qu’ils ne peuvent plus avoir accès aux fonctionnalités de l’application.

## Enumération des actifs ##
On peut considérer principalement trois actifs : les messages, les données des utilisateurs et l’infrastructure elle-même.

### Messages ###
Les aspects à protéger sont :

* L’intégrité
* La confidentialité
* La disponibilité

Un incident pourrait résulter en :

* une perte de confiance en l’entreprise de la part des employés 
* un dysfonctionnement partiel de l’entreprise


### Données ###

Actuellement les seules données stockées sont les login/password, mais dans la réalité d’autres informations pourraient être ajoutés. 

Les aspects à protéger sont :

* La confidentialité
* L’intégrité 

Un incident pourrait résulter en :

* Une perte de confiance en l’entreprise de la part des employés
* Une perte d’argent pour l’entreprise (amende pour ne pas avoir protégé les données)

### Infrastructure ###

L’aspect à protéger est :

* La disponibilité

Un incident pourrait résulter en :

* Un grand dysfonctionnement de l’entreprise

## Data Flow Diagram ##

![](images/dfd.png)

**TODO: A commenter**

## Périmètre de sécurisation ##

**TODO: A remplir, pas bien compris ce qu'il doit y avoir dedans**
 
# Sources de menaces #

**TODO: A rédiger mieux que ça!**

### Employés / utilisateurs malins ###

**Motivation :** vengeance, espionnage industriel, curiosité

**Cible :** messages des autres utilisateurs

**Potentialité :** haute

### Concurrent ###

**Motivation :** espionnage industriel

**Cible :** Les messages présents dans la base de données (secrets industriels)

**Potentialité :** Moyenne

### Hackers, script-kiddies ###

**Motivation :** défi, ego, s’amuser

**Cible :** Tout le système

**Potentialité :** Moyenne

### Cybercrime ###

**Motivation :** financières

**Cible :** Informations des utilisateurs, spam/phishing

**Potentialité :** Moyenne

## Scénarios d'attaques ##

Petite intro

Remarque: les contre-mesures pour les différents scénarios sont nommées ici et seront décrites plsu en détail dans le chapitre suivant.

### STRIDE ###

Expliquer STRIDE et comment on va l'utiliser pour catégoriser les attaques.

### Scénario 1 : Guessing de mot de passe ###

Etant donné qu’il est nécessaire d’être authentifié pour avoir accès aux fonctionnalités de l’application, ce scénario est une première étape permettant ensuite de pouvoir lancer d’autres attaques. Les scénarios 2, 3 et 4 présentent d’autres manières de s’authentifier illégalement.

**Catégorie STRIDE:** S

**Impact:** Haut (permet d’effectuer d’autres attaques)

**Source de menace:** Hacker, Cybercrime, Concurrents, Employés

**Motivations:** 

* Pour les hackers, cela peut être un défi en soi ou un moyen d'accéder à plus de défis.
* Pour des cybercriminels ou des concurrents, l'intérêt est d'avoir accès au système de messagerie.
* Pour les employés, le but peut être de se faire passer pour quelqu'un d'autre, de lire les messages de quelqu'un d'autre ou d'utiliser des fonctionnalités réservées aux administrateurs.

**Element(s) du système attaqué:** Informations des utilisateurs (login/password)

**Faille(s) permettant l'attaque:**
* Aucune vérification sur les mots de passe choisis 
* Mots de passe définis par l’admin

**Scénario d'attaque:**
Lorsqu’on crée un utilisateur ou que l’on change son mot de passe, il n’est pas demandé de fournir un nombre minimum de caractères ou d’utiliser des chiffres et des signes de ponctuation. Il n’y a pas non plus d’avertissement rappelant à l’utilisateur de ne pas choisir un mot de passe trop simple. Il est donc fort possible qu’un grand nombre d’utilisateur choisissent comme mot de passe leur login ou quelque chose comme 1234. Dans la situation actuelle, tester les mots de passe suivants permet d’accéder à tous les comptes :
-	Login (p. ex : admin ou lucie)
-	1234
-	12345678
-	Abcd
Une autre faiblesse actuelle est que seuls les administrateurs peuvent créer des nouveaux utilisateurs. L’avantage est que cela empêche des personnes externes de se créer un compte, mais l’inconvénient est que les administrateurs doivent mettre un mot de passe par défaut, que les utilisateurs sont censés modifier par la suite. Dans la réalité, le mot de passe par défaut sera souvent quelque chose de simple, pour simplifier la tâche à l’administrateur. Il peut s’agir par exemple du login, du nom de famille, ou d’une combinaison du prénom et du nom de famille. En ajoutant à ça le fait que plusieurs utilisateurs ne changeront pas très rapidement, voire jamais, tenter différentes combinaisons basées sur le nom des employés peut donner beaucoup de résultats. Les employés de l’entreprise sont ceux qui peuvent le mieux exploiter cette faiblesse, étant donné qu’ils connaissent la logique de choix des mots de passe.

**Contre-mesures:**

* Forcer les utilisateurs à choisir un mot de passe fort (au moins 8 caractères, lettres et chiffres, maj/min, ponctuation)
* Ajouter une recommendation (« Le mot de passe ne doit pas contenir votre login, votre nom ou prénom, le nom de l’entreprise ou de l’application. Si possible, choisissez un mot de passe qui n’a pas de sens. »)
* Pour les administrateurs : Générer un mot de passe aléatoire pour les nouveaux utilisateurs et le leur communiquer de manière sécurisée.

### Scénario 1 : Titre ###
Petite phrase pour expliquer ce que permet cette attaque.

**Catégorie:**

**Impact:** 

**Source de menace:**

**Motivations:**

**Element(s) du système attaqué:**

**Faille(s) permettant l'attaque:**

**Scénario d'attaque:**

**Contre-mesures:**


## Contre-mesures ##

## Conclusion ##