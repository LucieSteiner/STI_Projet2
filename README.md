# STI Projet 1 #
### Yosra Harbaoui et Lucie Steiner, 24.10.2017 ###

## Lancement de l'application ## 

1. Placer les fichiers

- Copier le contenu du dossier html dans /var/www/html
- Copier le contenu du dossier database dans /var/www/databases

2. Créer la base de données

- Effectuer la commande: php /var/www/html/create_db.php 
- La base de données est initialisée avec un utilisateur administrateur (login: admin, password: admin)

3. Lancer le service httpd

- Effectuer la commande: sudo systemctl start httpd

4. Accéder à l'application

- Accéder à http://localhost dans un navigateur
