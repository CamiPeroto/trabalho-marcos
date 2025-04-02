## Requisitos

-   PHP 8.2 ou superior
-   Composer
-   GIT

## Como rodar o projeto baixado

Duplicar o arquivo ".env.example" e renomear para ".env".<br>
Alterar no arquivo .env as credenciais do banco de dados<br>
Para a funcionalidade recuperar senha funcionar, necessário alterar as credenciais do servidor de envio de e-mail no arquivo .env.<br>

Instalar as dependências do PHP

```
composer install
```

Instalar as dependências do Node.js

```
npm install
```

Gerar a chave

```
php artisan key:generate
```

Executar as migration

```
php artisan migrate
```

Executar as seed

```
php artisan db:seed
```

Iniciar o projeto criado com Laravel

```
php artisan serve
```

Acessar o conteúdo padrão do Laravel

```
http://127.0.0.1:8000
```
