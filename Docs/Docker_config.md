<h1 align="center"> Docker Config </h1>

<h3> Install docker </h3>

Cette documentation est fonctionnel sous CentOS. \
Dans un premiers temps il vous faut désinstaller l'ensembles des packages lié à docker.

sudo yum remove docker \
docker-client \
docker-client-latest \
docker-common \
docker-latest \
docker-latest-logrotate \
docker-logrotate \
docker-engine


Une fois cela fait, vérifiez que docker ai bien été désinstallé, pour cela il vous suffit 
d'aller chercher le document /var/lib/docker. Si ce fichier est bien inexistant, félicitation vous avez bien désinstallé docker.

Maintenant il nous faut le repo de docker engine. Pour l'installer vous devez d'abord installer yum-util qui vous permettra d'installer manuellement un repo.

sudo yum install -y yum-utils

Maintenant installez le repo docker engine.

sudo yum-config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo

Félicitation vous avez installer Docker Engine.