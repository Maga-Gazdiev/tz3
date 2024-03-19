# Описание сервиса RESTful API для управления записными книгами

## Настройка и запуск

1. Установите Docker и Docker Compose, если они еще не установлены.
2. Склонируйте репозиторий: `https://github.com/Maga-Gazdiev/tz3`.
3. Перейдите в каталог проекта: `cd tz3`.
4. Найдите файл `docker-compose.yml` и измените под себя настройки mysql  
5. Запустите сервис с помощью Docker Compose: `docker compose up --build`.
6. Запустите команду `docker ps` в командной строке. После ввода этой команды вам выведется все запущенные контейнеры, из них находим тот контейнер который называется `example-app-server` и копируем его id
7. Далее запустите эту команду `docker exec -u root -it "ваш id" /bin/bash`.
8. В открышимся терминале запускаем миграции `php artisan migrate`.

Сервис будет запущен и будет доступен по адресу `http://localhost:9000/api/v1/notebook`.