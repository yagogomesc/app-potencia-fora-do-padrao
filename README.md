<h3>Sistema de potencia fora do padrão</h3>

<h5>Sistema simples a ser utilizado para registro de tentativas de contato com clientes em que apresentam potencia óptica fora de seu padrão ideal em provedores de conexão a internet que utilizam esta técnologia. A aplicação serve de apoio para sistemas ERP de provedores para que seja feito o registro de tentativa de conexão com clientes de forma simplificada em que armazenará no banco de dados apenas as informações do tipo de contato, ocorrencia e potencia após reparo.</h5>

<h5>Para funcionamento correto da aplicação, é necessario criar um modo de receber os dados da potencia dos clientes, podendo ser por meio de ajax ou pelo PHP por algum banco de dados caso seja o meio de armazenamento dos dados.</h5>

O sistema foi criada utilizando PHP, Laravel, Bootstrap e JQuery.

- Após clonar o repositório é necessário primeiramente rodar o comando "composer install" no diretório base (No linux pode ser necessário rodar o comando com sudo).

- Criar uma cópia do arquivo ".env.example" e renomea-lo para ".env".

- Utilizar na pasta base o comando "php artisan key:generate" para gerar a chave de aplicação do laravel.

- Acessar a pasta "resources" e utilizar dentro dela o comando "npm install" e depois "npm run dev". (Caso apresente erro com o --cross-env, apague a pasta node_modules e utilize 'npm install' novamente)

Utilizando um banco de dados MySQL(MariaDB)

- Necessário criar um banco de dados com o nome "potencia".

- Na pasta base, utilizar o comando "php artisan migrate" para criar tabela utilizada pela aplicação (No linux pode ser necessário rodar o comando com sudo).

