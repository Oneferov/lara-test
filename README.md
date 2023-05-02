1  Клонируем репозиторий в любую папку

git clone https://github.com/Oneferov/lara-test.git

2  Заходим в эту папку из любого терминала

3  копируем файл .env.example, переименовываем в .env

4  В .env указываем адрес электронной почты, которую хотим видеть отправителем писем

MAIL_FROM_ADDRESS=

Указываем адрес хоста для документации swagger (если отличается от используемого по-умолчанию http://127.0.0.1:8000)

L5_SWAGGER_CONST_HOST=

5  При установленных docker и docker-compose, выполняем сборку контейнеров

docker-compose up -d —build

6  Устанавливаем composer и зависимости

docker-compose exec app composer install

7  Генерируем ключ приложения

docker-compose exec app php artisan key:generate

8  Генерируем документацию swagger

docker-compose exec app php artisanl5-swagger:generate

9  Запускаем миграции и сиды

docker-compose exec app php artisan migrate:fresh --seed


Регистрация доступна по адресу:
http://127.0.0.1:8000/register

Вход в личный кабинет:
http://127.0.0.1:8000/login 

PhpMyAdmin доступен по адресу с доступами базы данных из .env:
http://127.0.0.1:8081

Документация swagger доступна по адресу:
http://127.0.0.1:8000/api/documentation

Кабинет MailHog доступен по адресу:
http://127.0.0.1:8025