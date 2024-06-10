# Test App

This repository contains a Laravel application with Docker setup

## Requirements

- Docker
- Docker Compose

## Setup


1. Build the Docker containers:
```
make build
```

2. Start the Docker containers:
```
make start
```

3. Copy the .env.example file to .env:
```
cp .env.example .env
```

4. Update the database credentials in the .env file:
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```

5. Generate the application key:
```
docker-compose exec backend php artisan key:generate
```

6. Run the database migrations:
```
docker-compose exec backend php artisan migrate
```

7. Process Queue Jobs:
```
make work
```


## Accessing the Application

Open your browser and go to http://localhost:8000


## Makefile commands
```
make start - Start the Docker containers
make stop - Stop the Docker containers
make restart - Restart the Docker containers
make logs - View the logs of the Docker containers
make build - Build the Docker containers
make ps - List the running Docker containers
make work - Start the Laravel queue worker
```
