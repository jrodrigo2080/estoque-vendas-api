🧾 API de Controle de Estoque e Vendas

Descrição

API REST em Laravel 10 para gerenciar controle de estoque e vendas de um ERP simplificado.

Funcionalidades:

Registrar entrada de produtos no estoque com quantidade e preço de custo.

Consultar estoque atual com valores totais e lucro projetado.

Registrar vendas com diversos itens, calculando valor total e margem de lucro.

Atualizar automaticamente o estoque ao finalizar uma venda.

Requisitos

PHP 8.1+

Composer

Banco de dados: MySQL, PostgreSQL ou SQLite

Git

Instalação

Clonar o repositório:

git clone https://github.com/jrodrigo2080/estoque-vendas-api.git
cd estoque-vendas-api


Instalar dependências:

composer install


Copiar arquivo de ambiente:

cp .env.example .env


Configurar .env:

APP_NAME=InventoryAPI
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha


Gerar chave da aplicação:

php artisan key:generate


Rodar migrations e seeders (opcional):

php artisan migrate --seed

Executando a aplicação
php artisan serve


API disponível em: http://127.0.0.1:8000

Endpoints
Estoque
Método	Endpoint	Descrição	Exemplo de JSON
POST	/api/inventory	Registrar entrada de produtos no estoque	{"product_id":1,"quantity":10,"cost_price":50.00}
GET	/api/inventory	Obter situação atual do estoque	—
Vendas
Método	Endpoint	Descrição	Exemplo de JSON
POST	/api/sales	Registrar uma nova venda	{"items":[{"product_id":1,"quantity":2,"amount":100}]}
GET	/api/sales/{id}	Obter detalhes de uma venda

Eventos e Listeners

Evento: SaleFinalized disparado ao finalizar uma venda.

Listener: UpdateStock atualiza automaticamente o estoque.

Testes

Rodar testes automatizados:

php artisan test


O banco de testes utiliza SQLite em memória (:memory:).

Boas práticas aplicadas

Arquitetura Repository + Service para lógica de negócio.

Recursos (Resources) retornam JSON padronizado.

Transactions para consistência ao registrar vendas.

Eventos e listeners desacoplados para escalabilidade.

Testes automatizados cobrindo principais funcionalidades.

Exemplos de uso no Postman

Registrar entrada de estoque:

POST http://127.0.0.1:8000/api/inventory
Content-Type: application/json

{
  "product_id": 1,
  "quantity": 10,
  "cost_price": 50.00
}


Registrar venda:

POST http://127.0.0.1:8000/api/sales
Content-Type: application/json

{
  "items": [
    {
      "product_id": 1,
      "quantity": 2,
      "amount": 100
    }
  ]
}


Obter estoque atual:

GET http://127.0.0.1:8000/api/inventory


Obter detalhes de venda:

GET http://127.0.0.1:8000/api/sales/1