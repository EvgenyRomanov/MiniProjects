### Описание инфраструктуры в docker-compose
    Включает в себя:
    - nginx (обрабатывает статику, пробрасывает выполнение скриптов в fpm)
    - php-fpm (соединяется с nginx через unix-сокет)
    - redis (соединяется с php по порту)
    - memcached (соединяется с php по порту)
    - БД  


Справка
```
docker compose up --build
```