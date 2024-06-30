Assessment README\_
\_REQUIRED
1.php v8
2.composer
3.xammp laragon etc

_Installation_
NAVIGATE TO YOUR TERMINAL

1. Clone the repository: `git clone https://github.com/Zinaxy/Propertybook_assessment-.git
2. Install dependencies:
    - Composer: `composer install`
    - npm: `npm install` (for Bootstrap, jQuery, and Bootstrap Icons)
3. Set up the database:
    - SQLite: update the .env file to sqlite
    - MYSQL: create a new database in phpmyadmin called propertybook
    - Run migrations: `php artisan migrate`

_Running the Project_

1. Build bootstrap assets: `npm run dev
2. Start the development server: `php artisan serve`
3. Access the project in your browser: `http://localhost:8000`

_Dependencies_

-   Laravel
-   Bootstrap
-   jQuery
-   Bootstrap Icons
-   SQLite

    _ADMIN LOGIN_
    To manage website

    -   Click the admin Link on the navbar

_Deployment process_
This project is deployed on github

-   Configure Git
    git config --global user.name "Your Name"
    git config --global user.email "your.email@example.com"

-   Initialize Git repository
    cd path/to/your/project
    git init

-   Add and commit files
    git add .
    git commit -m "Initial commit"
-   Add remote and push to GitHub
    git remote add origin https://github.com/Zinaxy/Propertybook_assessment-.git
    git push -u origin master
