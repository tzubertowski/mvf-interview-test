# Prerequirements

This setup uses docker to spin up php 7.3 container

Requirements:

- [Docker + docker-compose installed](https://docs.docker.com/install/)

## Setting up

### 1. Building the app

This step will:

- build images for php container
- install dependencies for the PHP app

Execute:

```bash
./run.sh install
```

### 2. Running the app

Execute:

```bash
./run.sh dev
```


# Accessing the APP
If All containers are running simply:s
- [Webapp can be accessed here ](http://localhost:8080)
- [API can be accessed here ](http://localhost:8000)

## Running API Tests
Make sure the docker container is running, then simply:

1. SSH into the container
```
docker exec -it awin-service /bin/bash
```
2. Execute the command
```
./vendor/bin/phpunit
```


# About

This repository contains solutions for technical tasks for MVF interview.

## API
API was built using PHP and Lumen + widely supported Github API v3 client:
- **Why Lumen**: it's a micro HTTP framework. I chose to go with HTTP in order to build a small RESTful endpoint accessible by the webapp.

This test is for a PHP heavy engineer position, thus PHP was chosen for the solution.

You can find the API Swagger docs in [here](mvf-api/api.yml) 

## Frontend
It's a widely community supported framework, I was also considering Vue but I assume React is more in use with MVF.

