## Installation

  

Suivre les instructions:

  

1) cloner le dépôt repasDomicile

2) Créer une base de données.

3) dupliquer le fichier .env.exemple et renomer le en .env

4) Configurer le fichier .env pour connecter la base de données
     - DB_DATABASE=[nom de la base de donné]
     - DB_USERNAME=[root]
     - DB_PASSWORD=[par défaut vide]

4) exécuter les commandes suivantes
     - composer install
     - php artisan key:generate
     - npm install
     - npm run dev
     - php artisan migrate --seed

5) demarrer un serveur local

     - php artisan serve

6) Rendez-vous a l'adresse du serveur local. eg : 127.0.0.1:8000

7) Accedez a la partie administration du site via. eg : 127.0.0.1:8000/admin/login
     - username : demo
     - password : password
