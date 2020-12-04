# Nuit Info 2020
[www.nuitdelinfo.com](https://www.nuitdelinfo.com)


Voici le site que nous avons réalisé durant cette édition 2020 de la nuit de l'info. 
Nous avons essayé de nous mettre dans la peau d'un pratiquant de sport notique ainsi que dans la peau des différentes associations afin de rendre l'application la plus intuitive et facile d'utilisation.
Nous avons décidé de divisé en 2 parties notre application :

 	- Une partie accessible aux pratiquants (surfeur, nageur,...), ou ces derniers peuvent observer les données métérologiques afin de plannifier au mieux leurs sorties.
	  A la fin de chaque sortie, ils peuvent rédiger un formulaire afin de faire remonter tous les anomalies rencontrés.

	- Une partie accessible aux associations (surfider,...), qui va ainsi leur permettre d'accèder à une map qui regroupe tous les endroits signalés par les surfeurs ainsi que toutes les informations récupérées via différentes sources.


Le site est disponible à cette adresse : https://segfault.ovh
Notre repertoire est disponible sur gitHub : https://github.com/tomdubraw/nuitinfo2020/

Vous pouvez nous contacter à cette adresse mail: guillaumesol17@gmail.com

En espérant que notre code vous satisfera ! :) 

PS : Nous avons caché une fonctionnalitée leet speek sur notre site, qui comporte 2 niveaux différents. Pour les curieux, vous pouvez la cherché (même si elle reste bien cachée ;) ).
Pour les autres voici la façon de l'activer :

 - ?leet à la fin de l'url
 - ?leet&full à la fin de l'url pour avoir la version hardcore.

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


## Production

First usage
```sh
docker-compose -f docker-compose.prod.yml up -d
# wait the databse initialisation
docker-compose -f docker-compose.prod.yml exec php composer db-prod
```

Server listen on http://localhost:8080

> You can change port inside `docker-compose.prod.yml`

> A [traefik](https://doc.traefik.io/traefik/) template is provided in `docker-compose.prod.yml`

Update
```sh
docker-compose -f docker-compose.prod.yml build
docker-compose -f docker-compose.prod.yml down && docker-compose -f docker-compose.prod.yml up -d
```
