## Install

```sh
# run server
docker-compose up -d
# Install composer
docker-compose exec php composer install
# load db
docker-compose exec php composer db
```

Server at http://localhost:8080
Adminer at http://localhost:8081
MySQL on port 8082

> uncomment `command: watch` in `docker-compose.yml` for encore watch

## Prod

> TODO: config docker for prod