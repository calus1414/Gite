### Instalation

- Git clone https://github.com/calus1414/Gite.git
- composer update
- npm install
- Vérifier fichier .env faire les modification si nécessaire (DATABASE_URL)
- php bin/console doctrine:database:create
- php bin/console doctrine:migration:migrate
- php bin/console doctrine:fixtures:load

### Lancer le site

- php -S localhost:8000 -t public
- npm run dev-server

### Lancer le server SMTP

- maildev