# base-symfony-4
Base de projet pour Symfony 4 avec WebpackEncore (SCSS, TS) et Une base d'authentification

## Installation

Ajout des dépendances composer
```
composer install
```

Ajout des dépendances npm
```
npm install
```

Création de la BDD et fixtures  
```
php bin/console doc:sche:update --force
php bin/console doc:fix:load --force
```

Build des assets 
```
npm run watch //Lors du développement
npm run build //Pour le déploiement en prod
```

Lancer le webserver Symfony (https://symfony.com/download) 
```
symfony serve
```
