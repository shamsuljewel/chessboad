
## FEN Display Tool

FEN display tool shows the chess board from a FEN notation string. The string only considered until the first space.

Steps to run the application

- Install
- Setup database
- Migration and seeder
- Run Web Server

## Install

Clone the repository with the command
```
git clone git@github.com:shamsuljewel/chessboad.git
cd chessboad
composer update
```

## Setup Database
Now create a database into mysql and put it into the .env, so that application can connect to the database.

## Run migration and seeding
Run migration and seeders
```
    php artisan migrate:refresh --seed
```

## Run Web Server
Now it's time to run the application by running the webserver.
```
    php artisan serve
```

once it's run visit the browser url, http://127.0.0.1:8000

![Screen shoot](https://user-images.githubusercontent.com/2234477/137647731-85faab13-f13f-48a0-b417-7addab5130a2.png)
