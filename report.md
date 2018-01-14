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

Etant donné qu’il est nécessaire d’être authentifié pour avoir accès aux fonctionnalités de l’application, ce scénario est une première étape permettant ensuite de pouvoir lancer d’autres attaques. Les scénarios 2 et 3 présentent d’autres manières de s’authentifier illégalement.

**Catégorie STRIDE:** S (Spoofing)

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

### Scénario 2 : Bruteforce de mot de passe ###

Cette attaque permet, comme la précédente, d'accéder aux fonctionnalités de l'application, mais elle demande plsu de compétences.

**Catégorie:** S (Spoofing)

**Impact:** Haut (permet d'effectuer d'autres attaques) 

**Source de menace:** Hackers, Concurrents, Cybercrime. Les employés peuvent également être une source de menace s'ils ont plus de compétences qu'un utilisateur standard.

**Motivations:** 
* Pour les hackers, cela peut être un défi en soi ou un moyen d'accéder à plus de défis.
* Pour des cybercriminels ou des concurrents, l'intérêt est d'avoir accès au système de messagerie.
* Pour les employés, le but peut être de se faire passer pour quelqu'un d'autre, de lire les messages de quelqu'un d'autre ou d'utiliser des fonctionnalités réservées aux administrateurs.

**Element(s) du système attaqué:** Informations des utilisateurs (login/password)

**Faille(s) permettant l'attaque:** 

* Une tentative de login prend très peu de temps, il est donc possible d'en faire beaucoup très rapidement.
* Le nombre de tentatives n'est pas limité.
* Le login est fait en une seule étape, très simple à automatiser.

**Scénario d'attaque:**

Une personne malveillante peut utiliser un outil pour tenter de se connecter en testant un grand nombre de combinaisons de caractères avec un outil approprié. Le fait que le nombre de tentatives ne soit pas limité et que le processus de login est très simple permet de faire cette attaque facilement. 

Ici, la puissance de cette attaque est renforcée par les failles présentées dnas le scénario précédent. Plus les mots de passe sont longs, plus le bruteforce prendra de temps.

**Contre-mesures:**

* Limiter le nombre de tentatives par adresse IP

### Scénario 3: Vol de mot de passe (interception) ###

Comme dans les scénarios précédents, cette attaque permet de se connecter à l'application.

**Catégorie:** S (Spoofing)

**Impact:** Haut (permet d'autres attaques)

**Source de menace:** Employés capables d'utiliser Wireshark ou autres personnes ayant accès au reéseau interne de l'entreprise.

**Motivations:**

* Pour les employés, le but peut être de se faire passer pour quelqu'un d'autre, de lire les messages de quelqu'un d'autre ou d'utiliser des fonctionnalités réservées aux administrateurs.
* Pour des cybercriminels ou des concurrents, l'intérêt est d'avoir accès au système de messagerie.

**Element(s) du système attaqué:** Informations des utilisateurs (login/password)

**Faille(s) permettant l'attaque:**

* La page de login utilise http pour envoyer les requêtes qui contiennent les login/mot de passe de l'utilisateur.

**Scénario d'attaque:**

Les informations de login transitent en clair sur le réseau. Lorsqu'un utilisateur se connecte à son compte, une autre personne sur le même réseau peut sniffer le trafic et trouver le mot de pase de cet utilisateur en clair. L'outil *Wrieshark* peut être utilisé dans ce but. 


**Contre-mesures:**

* Utiliser SSL/TLS pour sécuriser la page de login.

### Scénario 4 : Vol de session ###

Cette attaque permet d'utiliser la session d'un autre utilisateur mais contient plus d'étapes que les scénarios précédents. Elle nécessite notamment d'être déjà connecté à l'application.

**Catégorie:** S (Spoofing), E (Elevation of privilege)

**Impact:** Haut (permet d'autres attaques)

**Source de menace:** Hackers, Concurrents, Employés avec suffisamment de compétences

**Motivations:**

* Pour les hackers, cela constitue un deuxième défi après s'être connecté au site, qui le permet de devenir admin.
* Pour les concurrents, cela permet de voler la session d'un administrateur et de lire ses messages, mais ce n'est pas très discret.
* Pour les employés, cela peut leur permettre d'accéder à des fonctionnalités réservées aux administrateurs (en prennant beaucoup de risques). Cela peut aussi leur permettre de se faire passer pour quelqu'un d'autre et de lire leurs messages.

**Element(s) du système attaqué:** Utilisateurs, messages des utilisateurs, et potentiellement les informations des utilisateurs.

**Faille(s) permettant l'attaque:**

* Cross-site scripting (XSS) possible dans la fonction d'écriture de messages.
* Cookies de session PHP utilisées avec la configuration de base.

**Scénario d'attaque:**

Il s'agit ici d'exploiter la faille XSS en envoyant un message à un autre utilisateur et en y introduisant le code qui nous permettra de voler sa session. Du code javascript peut simplement être placé dans le sujet ou le corps d'un message:

![](images/xss1.png)

On voit que la faille XSS est présente car lorsque le destinataire ouvre le message, il obtient le résultat suivant:

![](images/xss2.png)

Il s'agit ensuite d'utiliser cette faille pour récupérer le cookie de l'administrateur. Avec Javascript, un cookie peut être affiché d'une manière très simple: 

![](images/xss3.png)

Comme on le voit, lorsque l'utilisateur ouvre ce message, son cookie est affiché:

![](images/xss4.png)

Finalement, l'attaquant n'a qu'à envoyer ce cookie sur une page qu'il contrôle afin de l'afficher. Cela peut être fait avec une ligne de javascript:

![](images/xss5.png)

Comme on le voit, lorsque l'administrateur ouvre le message, il effectuera automatiquement la requête suivante:

![](images/xss6.png)

L'attaquant aura donc reçu la requête contenant le cookie de l'administrateur. Il n'aura donc ensuite plus qu'à remplacer la valeur de son propre cookie par celle du cookie de l'administrateur et il aura accès à sa session. Evidemment, un bon attaquant, fera en sorte que l'administraateur ne se rende pas compte que cette requête a été envoyée, mais nous ne rentrerons pas dans ces détails ici. 

Le fait que le cookie de l'administrateur puisse être utilisé aussi facilement une fois récupérer vient du fait que les cookies de session PHP sont ici utilisés avec leur configuration de base. Ils ne sont donc jamais modifiés avant la fin de la session et il est possible de fournir un identifiant de session sans qu'il ait été initialisé.

**Contre-mesures:**

* Contrôler le contenu des champs "Sujet" et "Message", pour empêcher l'injection de code. 
* Refuser les id de session qui n'ont pas été initialisés avant (strict mode).
* Régénerer l'id de session régulièrement (par exemple, lorsqu'un utilisateur se connecte).


### Scénario 5 : Mapping de l'application ###

Cette attaque ne permet aucune action directe, mais elle permet d'avoir accès à des informations qui devraient être cachées.

**Catégorie:** I (Information disclosure)

**Impact:** bas

**Source de menace:** Hackers, Concurrents, Cybercrime

**Motivations:**

* Pour tous, c'est un moyen de savoir quels fichiers existent sur le site, pour prévoir une autre attaque. Ce scénario est surtout intéressant pour les personnes externes à l'entreprise, ne connaissant pas le contenu du site.

**Element(s) du système attaqué:**

* Architecture de l'application

**Faille(s) permettant l'attaque:**

* Répertoires accessibles

**Scénario d'attaque:**

Il suffit d'entrer la bonne URL pour accéder directement à la liste de fichiers contenus dans les différents répertoires. Cela fonctionne avec les URL suivants: 

* localhost/includes
* localhost/models
* localhost/utils
* localhost/views

Lorsque l'on entre une de ces URL, ont obtient le résultat suivant: 

![](images/repertoire.png)

Les autres dossiers, contenant des fichiers définissant l'aspect du site (css, js, vendor) sont également accessibles.

L'attaquant peut ensuite utiliser ces éléments pour se représenter l'architecture du site, et voir quels éléments il aimerait attaquer.

**Contre-mesures:**

* Ajouter un fichier .htaccess à la racine des dossiers qui ne doivent pas être accessibles

### Scénario 6 : Hameçonnage ###

Ce scénario nécessite d'être déjà connecté à l'application.

**Catégorie:** ? (revenir dessus après) S/I/

**Impact:** moyen (dépend du niveau d'information des emplyés)

**Source de menace:** Cybercriminels

**Motivations:** 

* Leurs motivations sont principalement financières, le but est d'obtenir des informations qu'ils pourront revendre ou utiliser pour obtenir de l'argent.

**Element(s) du système attaqué:** Les utilisateurs, leur informations de connexion ou autre (en fonction de l'objectif de l'attaquant)

**Faille(s) permettant l'attaque:**

* Cross-site scripting (XSS) lors de l'écriture des messages
* Bêtise des utilisateurs

**Scénario d'attaque:**

En utilisant la faille XSS comme cela a été décrit dnas le scénario 4, un attaquant peut ajouter du code dans un message dans le but d'afficher à celui qui l'ouvrira une fenêtre lui demandant d'entrer certaines informations (informations de connexion, numéro de carte de crédit ou autre). Plus la fenêtre affichée est crédible, plus l'utilisateur sera susceptible d'y croire et de donner des informations personnelles. 

**Contre-mesures:**

* Contrôler le contenu des champs "Sujet" et "Message", pour empêcher l'injection de code. 
* Informer les employés pour le permettre de reconnaître ce genre d'attaques.

### Scénario 7 : Suppression de messages envoyés ###
Petite phrase pour expliquer ce que permet cette attaque.

**Catégorie:**

**Impact:** 

**Source de menace:**

**Motivations:**

**Element(s) du système attaqué:**

**Faille(s) permettant l'attaque:**

**Scénario d'attaque:**

**Contre-mesures:**

### Scénario 8 : Ralentissement de l'application ###
Petite phrase pour expliquer ce que permet cette attaque.

**Catégorie:**

**Impact:** 

**Source de menace:**

**Motivations:**

**Element(s) du système attaqué:**

**Faille(s) permettant l'attaque:**

**Scénario d'attaque:**

**Contre-mesures:**

### Scénario 9 : Suppression des utilisateurs ###
Petite phrase pour expliquer ce que permet cette attaque.

**Catégorie:**

**Impact:** 

**Source de menace:**

**Motivations:**

**Element(s) du système attaqué:**

**Faille(s) permettant l'attaque:**

**Scénario d'attaque:**

**Contre-mesures:**

### Scénario 10: Récupération des mots de passe à partir des hash ###
Petite phrase pour expliquer ce que permet cette attaque.

**Catégorie:**

**Impact:** 

**Source de menace:**

**Motivations:**

**Element(s) du système attaqué:**

**Faille(s) permettant l'attaque:**

**Scénario d'attaque:**

**Contre-mesures:**

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