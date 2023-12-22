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

Pour l'installation de Docker sur Debian, il faudra, dans un second temps, ajouter le dépôt depuis Docker pour être sûr d'installer la bonne version de Docker. Pour cela, il faudra utiliser les commandes suivantes :

Ajout de la clé GPG officielle de Docker :
```bash
sudo apt-get update
sudo apt-get install ca-certificates curl gnupg
sudo install -m 0755 -d /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/debian/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
sudo chmod a+r /etc/apt/keyrings/docker.gpg
```

Ajout du répertoire dans les sources apt :
```bash
echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/debian \
  $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | \
  sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update
```

Une fois le dépôt ajouté, lancez l'installation des bonnes versions des outils nécessaires avec la commande :

```bash
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
```

Après l'installation, il suffira de lancer le service :

```bash
sudo systemctl start docker
```
Félicitations, vous avez installé Docker Engine.

## Lancement du serveur web
Le lancement du conteneur se fera en deux étapes : la construction de l'image à l'aide du Dockerfile, puis le lancement de cette image.

Pour la construction de l'image, placez-vous dans le même dossier que le `Dockerfile`, c'est-à-dire à la racine de notre dépôt Git, puis lancez la commande :

```bash
sudo docker build -t sae5 .
```

Une fois l'exécution terminée, vous pouvez lancer la dernière commande, toujours dans le même répertoire, qui va lancer notre image :

```bash
sudo docker run -p 8080:80 sae5
```

Il vous suffit de vous connecter au serveur Web via un navigateur avec l'adresse : `localhost:8080/Home.php`.
