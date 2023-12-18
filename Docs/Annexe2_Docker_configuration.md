# Docker dans notre projet

La configuration de notre projet peut-être assez longue avec l'installation est la configuration d'Apache. 
On souhaite que la réinstallation de toute l'achitecture du projet avec les différents composants logiciel soit simple rapide, ni demander trop de reflexion. 
Pour cela, nous allons utiliser la contersation avec Docker. Au final pour lancer notre projet il suffira d'installer Docker et de lancer quelque commande qui vont être expliciter dans ce document. 

## Installation de docker sur une distribution linux

Cette documentation est fonctionnel sous CentOS. \
Dans un premiers temps il vous faut désinstaller l'ensembles des packages lié à docker.

```bash
sudo yum remove docker \
docker-client \
docker-client-latest \
docker-common \
docker-latest \
docker-latest-logrotate \
docker-logrotate \
docker-engine
```

Pour l'installation de docker sur CentOS il faudras dans un second temps ajouter le repos de docker pour être sur d'installer la bonne version de docker. Pour ce la il faudrat taper la commande suivante :

```bash
sudo yum-config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo
```

Une fois le repos ajouter on lance l'installation des bonnes versions des outils necessaire avec la commande :

```bash
sudo yum install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
```

Après l'installation il suffira de lancer le service :

```bash
sudo systemctl start docker
```
Félicitation vous avez installer Docker Engine. 

## Initialisation du serveur web
Mainstenant pour lancer le conteneur il faut vous placer à la racine du projet dnas un invite de commande, taper la commande suivante pour l'installation de l'image de notre projet :

```bash
sudo docker pull webdevops/php-apache-dev
```

Puis il faut lancer le docker compose comme ceci :

```bash
sudo docker-compose up -d
```

Et vous avez plus qu'à vous connecter au serveur Web via un navigateur avec l'adresse : localhost:8080.

## Conception du conteneur
Pour ce projet nous devons faire une interface Web et pour réaliser les différents modules nous avons décidé d'utiliser du PHP.
Donc nous allons avoir besoin d'une image docker avec un serveur web ainsi que PHP pour l'exécution des pages. Il existe une image qui contient les 2 composant dont nous avons besoin `webdevops/php-apache-dev`.

Pour 
