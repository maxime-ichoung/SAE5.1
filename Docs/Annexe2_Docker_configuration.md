# Configuration de Docker

La configuration de notre docker peut-être assez longue avec l'installation et la configuration d'Apache. 
Nous souhaitons que l'installation de toute l'architecture de notre projet avec les différents composants logiciels soit simple,rapide et utilisable sur tout type de machine. 
Pour lancer notre projet, il suffira d'installer Docker et de lancer quelques commandes qui seront explicitées dans ce document. 

## Installation de docker sur une distribution linux

Cette documentation est fonctionnelle sous Debain 12. (Inspiré de la documentation Docker. [Lien](https://docs.docker.com/engine/install/debian/)) \
Dans un premier temps, il vous faut désinstaller l'ensemble des packages lié à Docker.

```bash
for pkg in docker.io docker-doc docker-compose podman-docker containerd runc; do sudo apt-get remove $pkg; done
```

Pour l'installation de Docker sur CentOS il faudra dans un second temps ajouter le dépôt depuis Docker pour être sur d'installer la bonne version de docker. Pour cela il faudra utiliser la commande suivante :

```bash
## TODO
```

Une fois le dépôt ajouté on lance l'installation des bonnes versions des outils nécessaires avec la commande :

```bash
## TODO
```

Après l'installation il suffira de lancer le service :

```bash
sudo systemctl start docker
```
Félicitation vous avez installé Docker Engine. 

## Lancement du serveur web
Maintenant pour lancer le conteneur il faut vous placer à la racine du projet dans une invite de commande, taper la commande suivante :

```bash
sudo docker-compose up -d
```

Il vous suffit de vous connecter au serveur Web via un navigateur avec l'adresse : localhost:8080.