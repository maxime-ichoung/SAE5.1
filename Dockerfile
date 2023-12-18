FROM php:7.4-cli

WORKDIR src/

COPY . /src/myapp

EXPOSE 80


CMD ["php", "./home.php"]
