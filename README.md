## Install

```sh
# run server
docker-compose up -d
# Install php vendor
docker-compose exec php composer install
# reacreate database and load fixtures
docker-compose exec php composer db
```

Server at http://localhost:8080
Adminer at http://localhost:8081
MySQL on port 8082

> uncomment `command: watch` in `docker-compose.yml` for encore watch

## IDE and env Config

Use PhpStorm is recommended

Required PhpStorm plugin
- Symfony support
- Php annotation
- Php toolbox

Theme plugin
- Material theme ui
- Atom material icon

PhpStorm Configuration
- Language and frameworks
    - Javascript > ECMAScript 6+
    - Php > Language level : 7.4 / Set your interpreter (*can be between 7.2 and 8*)
        - Quality Tool > Set file path for cs fixer and code sniffer
        - Symfony > enable
- Editor
    - Inspection
        - Php
            - CS Fixer : ruleset Symfony
            - Code sniffer : ruleset PSR-12



## Prod

use `docker-compose.prod.yml`