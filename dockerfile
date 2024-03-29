# Utiliser l'image webdevops/php-apache-dev:latest comme base car elle contient un server Apache et de quoi executer du PHP
FROM webdevops/php-apache-dev:latest

# Installation de la commande ping
RUN apt-get update && apt-get install -y iputils-ping

# Copie des sources
COPY src/ /app/

# Droit d'accès
RUN chown -R root:application /app
RUN chmod -R 755 /app

# Exposer le port 80
EXPOSE 80
