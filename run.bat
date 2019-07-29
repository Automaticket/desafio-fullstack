echo Subindo container docker 
docker-compose up -d

echo instalando dependencias
docker exec -it php composer install

echo Copiando .env
docker exec -it php cp .env.example .env

echo Executando as migrations
docker exec -it php php artisan migrate:refresh

echo criando usuario padrao
docker exec -it php php artisan db:seed --class=UserTableSeeder

echo Containers em execucao
docker ps -a 