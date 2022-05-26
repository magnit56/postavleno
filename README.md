В папке cli нужно набрать следующие команды:<br>
$<code>composer install</code><br>
В папке laravel нужно набрать следующие команды:<br>
$<code>composer install</code><br>
$<code>npm install</code><br>
$<code>npm run dev</code><br>
В корне проекта набрать:<br>
$<code>docker-compose build</code><br>
$<code>docker-compose up -d</code><br>
После этого на порту 8181 снаружи появится веб-сервер<br>
На главной странице находится список key-value<br>
$<code>docker-compose exec web ./cli/bin/cache redis add key value</code><br>
$<code>docker-compose exec web ./cli/bin/cache redis delete key value</code><br>
Команда memcached - это обычная заглушка для расширения<br>
$<code>docker-compose exec web ./cli/bin/cache memcached add key value</code><br>
$<code>docker-compose exec web ./cli/bin/cache memcached delete key value</code><br>
