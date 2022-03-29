Installation du projet :

1) Installation des dépendances :

A la racine, lancez :

composer install

2) Installation de la base de données

Le fichier qoaq.sql contient la base de données à utiliser. Importez-le
dans la base à utiliser (créez celle-ci si nécessaire)

2) Configuration

- Copiez application/config/config.php.example vers application/config/config.php
- Editez application/config/config.php (suivre les indications en commentaires)

3) Lancement

En fonction de ce que vous avez indiqué dans config.php, lancez le site avec
php -S ou en l'hébergeant
