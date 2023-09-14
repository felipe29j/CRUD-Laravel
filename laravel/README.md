# API desenvolvida com PHP e Framework Laravel

Esta API foi construída usando o PHP com o framework Laravel. Ela permite a interação com um banco de dados e fornece endpoints para diversas funcionalidades.

## Pré-requisitos

## Passo 1

Certifique-se de ter o [Composer](https://getcomposer.org/) instalado. Caso contrário, baixe e instale-o.

## Passo 2
Crie uma base de dados com as seguintes configurações:
   - Host: mariadb
   - Usuário: felipesilva-lv
   - Senha: zwZLzVgmHJfhajd
   - Nome do banco de dados: recruitment
   Isso é necessário para a integração com o projeto.


## Passo 3
Dentro do diretório do projeto abra o terminal cmd ou no próprio vs code, execute o seguinte comando para executar as migrações do banco de dados:
php artisan migrate

Isso criará automaticamente a tabela com as colunas necessárias na base de dados.

## Passo 4
Ainda no mesmo terminal, inicie o servidor Laravel com o seguinte comando:
php artisan serve

Isso permite que o servidor Laravel esteja disponível para testes em:
https://felipesilva-lv.eu1.alfasoft.pt/recruitments

