## Install

```sh
# Install composer
docker run --rm -it -v "$PWD"/app:/app composer install
# run server
docker-compose up -d
```

Server at http://localhost:8080
Adminer at http://localhost:8081
MySQL on port 8082

> uncomment `command: watch` in `docker-compose.yml` for encore watch

### reset db
```sh
docker run --rm -it -v "$PWD"/app:/app composer db
```

## Prod

> TODO: config docker for prod