# Docker dans notre projet

La configuration de notre projet peut-être assez longue avec l'installation est la configuration d'Apache. 
On souhaite que la réinstallation de toute l'achitecture du projet avec les différents composants logiciel soit simple rapide, ni demander trop de reflexion. 
Pour cela, nous allons utiliser la contersation avec Docker. Au final pour lancer notre projet il suffira d'installer Docker et de lancer quelque commande qui vont être expliciter dans ce document. 

## Conception du conteneur
Pour ce projet nous devons faire une interface Web avec plusieurs modules distinct.
Donc nous allons avoir besoin d"une image docker avec un serveur web ainsi que php.


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

Félicitation vous avez installer Docker Engine.
