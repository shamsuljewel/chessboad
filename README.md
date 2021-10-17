
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
```

## Setup Database
Now create a database into mysql and put it into the .env

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


<img src="https://github.com/shamsuljewel/chessboad/tree/master/public/img/application.png" />
