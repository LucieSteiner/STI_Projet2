# STI Projet 2 #
### Yann Mahmoudi et Lucie Steiner, 15.01.2018 ###

## Lancement de l'application ## 

1. Placer les fichiers

- Copier le contenu du dossier html dans /var/www/html
- Copier le contenu du dossier database dans /var/www/databases
- Vérifier que le dossier databases appartient au groupe apache
- Vérifier que le fichier databases/database.sqlite a les permissions rw pour tous les utilisateurs

2. Créer la base de données

- Effectuer la commande: php /var/www/html/create_db.php 
- La base de données est initialisée avec un utilisateur administrateur (login: admin, password: admin)

3. Mettre en place la suppression quotidienne des tentatives de connexion de la base de données

- Taper la commande suivante: `mv /var/www/html/remove_connections.php /home/sti/remove_connections.php`
- Taper la commande `crontab -e`, qui ouvrira un fichier dans l'éditeur Vi
- Ajouter la ligne `00 00 * * * php /home/sti/remove_connections.php` et enregistrer le fichier

4. Modifier la configuration pour utiliser HTTPS

- Ajouter les lignes suivantes dans le fichier /etc/httpd/conf/httpd.conf dans la balise <Directory "/var/www/html">

	RewriteEngine On
	RewriteCond %{HTTPS} off
	RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI}

5. Lancer le service httpd

- Effectuer la commande: sudo systemctl start httpd

6. Accéder à l'application

- Accéder à http://localhost dans un navigateur
- La première fois, le navigateur affiche "This Connection is Untrusted". Sélectionner "I Understand the Risks", puis "Add Exception..." et enfin "Confirm Security Exception".
