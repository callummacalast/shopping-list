## Getting Started

Clone the repo, run this command for laravel sail installation - 
`docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs`

REF: https://laravel.com/docs/10.x/sail#installing-sail-into-existing-applications

Once that has been successfully installed you're then going to want to `cp .env.example .env` and run `sail artisan key:generate` to set the application key. Once done, run `sail npm i && npm run dev` and you should be able to access the /login page. You won't be able to login as there is no user set yet. 

From here run `sail art migrate --seed` to seed the database with two cities and an admin user for the api backend.