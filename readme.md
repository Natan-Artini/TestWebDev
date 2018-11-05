-----------------> Criar migration
php artisan make:migration nomemigration

-----------------> Criar Model
php artisan make:model Contato

-----------------> Criar Factory, para povoação automatica do banco
php artisan make:factory TabelaFactory

-----------------> Crear Seeder, semeador dos dados
php artisan make:seeder TabelaSeeder

-----------------> Rodar Seeder, roda o que esta descrito no seeder
php artisan db:seed

-----------------> Atualizar o composer caso de mensagem de class não existe
composer dump-autoload

-----------------> Usar quando der erro Access denied for user 'homestead'@'localhost'
php artisan config:cach


-----------------> Comandos Banco
Se der problema remover tudo e instalar novamente
sudo apt-get remove --purge mysql-server
sudo apt-get remove --purge mysql-cliente
sudo apt-get remove --purge mysql-common

sudo apt-get install mariadb-server

se pedir senha colocar a senha no projeto

mysql -uroot -proot
create database nome;
show databases;
use Nome_Base
show tables;
