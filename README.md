# Co.Chat - README

👋📱 Bem-vindo ao Co.Chat! 👋📱

![Co.Chat](https://img.freepik.com/vetores-premium/conceito-de-conversa-homem-e-mulher-conversando-no-chat-ilustracao-vetorial-plano_186332-928.jpg)

## Sumário

- [Introdução](#introdução)
- [Recursos](#recursos)
- [Pré-requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Uso](#uso)
- [Validação de Cadastro](#validação-de-cadastro)
- [Configuração do Banco de Dados](#configuração-do-banco-de-dados)
- [Contribuições](#contribuições)
- [Licença](#licença)

## Introdução

Este é o Co.Chat, um chat individual desenvolvido em PHP, MySQL e Bootstrap. O Co.Chat permite que os usuários busquem outros usuários, vejam se estão online, visualizem quando foram vistos pela última vez, adicionem fotos de perfil e tenham contas de login para entrar no chat.

## Recursos

- 💬 Chat individual em tempo real.
- 🔍 Buscar e adicionar outros usuários.
- 🟢 Indicador de status online dos usuários.
- ⏱️ Visualização do horário da última visualização.
- 📷 Adicionar fotos de perfil (opcional).
- 🔐 Validação de contas de login.

## Pré-requisitos

Antes de executar o Co.Chat, você precisará ter o seguinte instalado em seu sistema:

- PHP (versão 7 ou superior)
- Banco de dados MySQL
- Servidor web (por exemplo, Apache ou Nginx)
- Navegador web moderno

## Instalação

1. Clone o repositório do GitHub:

```
git clone https://github.com/DiasEllen26/co.chat
```

2. Mova os arquivos do projeto para o diretório raiz do seu servidor web.

## Uso

1. Abra o navegador web e acesse o Co.Chat.

2. Faça login usando suas credenciais de usuário.

3. Busque outros usuários e inicie conversas individuais em tempo real.

4. Adicione uma foto de perfil, se desejar.

## Validação de Cadastro

Antes de criar uma nova conta de usuário, o sistema realiza uma validação para garantir que o nome de usuário escolhido não esteja cadastrado no banco de dados. Além disso, é obrigatório fornecer um nome, senha e nome de usuário para o cadastro. A adição de uma foto de perfil é opcional.

## Configuração do Banco de Dados

1. Crie um novo banco de dados MySQL para o Co.Chat.

2. Importe o arquivo `users.sql` localizado no diretório principal para configurar as tabelas necessárias.

3. Atualize as configurações de conexão com o banco de dados no arquivo `config.php` com suas credenciais do MySQL.

```php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'cochat_db';
```

4. O Co.Chat agora está conectado ao seu banco de dados MySQL.

## Contribuições

Agradecemos as contribuições para melhorar o Co.Chat. Se você deseja contribuir, siga os passos abaixo:

1. Faça um fork do repositório.

2. Crie um novo branch para sua funcionalidade ou correção de bug.

3. Faça as alterações e as confirme.

4. Envie as alterações para o seu repositório forkado.

5. Crie uma pull request no repositório original.

## Licença

O Co.Chat possui a Licença MIT. Você pode encontrar o texto completo da licença no arquivo `LICENSE`.

👋 Divirta-se no Co.Chat! 👋

Esperamos que este projeto seja útil para suas necessidades de comunicação. Se encontrar algum problema ou tiver sugestões, sinta-se à vontade para abrir uma issue no GitHub. Obrigado por usar nosso chat! 😊
