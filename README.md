В корне проекта нужно набрать следующие команды:<br>
$<code>composer install</code><br>
$<code>npm install</code><br>
$<code>npm run dev</code><br>
$<code>docker-compose build</code><br>
$<code>docker-compose up -d</code><br>
После этого на порту 8181 снаружи появится веб-сервер
На главной находится список key-value
$<code>docker-compose exec web /bin/bash</code>
Теперь внутри контейнера:
$<code>./cli/bin/cache redis add key value</code>
$<code>./cli/bin/cache redis delete key</code>
