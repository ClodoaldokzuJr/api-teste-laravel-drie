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

git clone https://github.com/ClodoaldokzuJr/api-teste-laravel-drie.git
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

# Criacao de Token

php artisan tinker

Dentro do cmd tinker execute:


use Illuminate\Support\Str;

$user = \App\Models\User::create([
    'name' => 'TesteNovo',
    'email' => 'testeNovo@example.com',
    'password' => bcrypt('123456')
]);

$user = \App\Models\User::first();
$user->api_token = Str::random(60);
$user->save();
$user->api_token;

São exemplos os codigos acima para auxilio, caso ja tenham usuario etc apenas gerem o token.

Com o token gerado com auxilio de um post ou via curl apenas adicione os headers:
Autorizathion SEU_TOKEN

# Ps: Caso tenha problemas com o json (não foi o meu caso)

Coloque também no header:

Accept : application/json

# Rodar teste unitario

php artisan test tests/Feature/LivroTest.php