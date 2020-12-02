# Nuit Info 2020
[www.nuitdelinfo.com](https://www.nuitdelinfo.com)

## Install

```sh
# run server
$ docker-compose up -d

# Install php vendor
$ docker-compose exec php composer install

# Recreate database and load fixtures
$ docker-compose exec php composer db
```

- Server at http://localhost:8080 to access the projet through your web browser
- Adminer at http://localhost:8081 to manage the database through a web browser
- MySQL at http://localhost:8082 to use any database client

> uncomment `command: watch` in `docker-compose.yml` to start the encore webpack watch server

## IDE and env Config

Have Php locally is useful to run quality tools through your IDE and run the git hook

Use PhpStorm is recommended

Required PhpStorm plugin
- Symfony support
- Php annotation
- Php toolbox
- GitToolBox
- Git Extender (Use `alt + t` will update and pull all your branches)

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
- Keymap (set your personal keyboard shortcuts like those)
    - Move line
    - Go to end of line
    - Duplicate line
    - Remove line
    - Search into files
    - Search a file/class


## Notice

- A git hook prevent commit of any `dump()` / `die()` / etc and any Php class that do not respect the PSR-12 ruleset
- Target your pull request into `dev`
- Avoid to push into `master` and `dev`


## Prod

use `docker-compose.prod.yml`