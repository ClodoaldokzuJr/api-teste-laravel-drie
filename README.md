# API de Documentos - Teste Doutor - IE

Este projeto é uma API simples desenvolvida com Laravel 12 para teste de trabalho gerencia textos com as operações de **listar, criar e editar**.

---

## Requisitos *

- PHP 8.2+
- Composer
- MySQL ou SQLite
- Laravel 12 

---

## Instalação ~

# Clone o repositório
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio

# Instale as dependências
composer install

# Copie o .env
cp .env.example .env

# Gere a chave
php artisan key:generate

# Configure seu banco de dados no .env
DB_CONNECTION=mysql
DB_DATABASE=nome_do_banco
DB_USERNAME=root
DB_PASSWORD= (eu geralmente deixo sem senha apenas para testes)



# Rode as migrations
php artisan migrate

# Inicie o servidor
php artisan serve