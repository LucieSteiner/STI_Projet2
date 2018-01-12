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

### STRIDE ###

### Scénario 1 : Titre ###

**Impact:** 

**Source de menace:**

**Motivations:**

**Element(s) du système attaqué:**

**Scénario d'attaque:**

Eventuellement ajouter ici comment contrer ça puis faire un résumé des contremesures dans le chapitre suivant

## Contre-mesures ##

## Conclusion ##