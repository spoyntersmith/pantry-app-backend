# Pantry App Bakend

## Dev environment setup instructions

To start using the repository follow these steps:

1. Clone the respository by running

    `git clone git@github.com:alvarezskinner/pantry-app-backend.git`

2. Once you have the repository cloned install dependencies by running

    `composer install`

3. After that you will need to create the `.env` file you can start with the `.env.example` present in this repository, customize to meet your environment.

4. Once done you will need to generate a new application key by running

    `php artisan key:generate`

With this your project should be up and running, you might need to play with folder permissions depending on wether you are using Mac, Windows or Linux.
