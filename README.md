# Desafio Fullstack Automaticket
O objetivo deste desafio é avaliar o domínio do candidato no desenvolvimento fullstack. Será avaliado boas práticas de code style, organização do projeto, criação de APIs, conhecimento de frameworks e tecnologias.

## Instruções gerais
- Faça um fork deste repositório para realizar o desafio.
- Não esqueça de nos ensinar como rodar o seu desafio. Utilize o arquivo HOWTORUN.md para as instruções.
- Após o término do desafio, envie um e-mail para [rh@crmall.com.br](mailto:rh@crmall.com.br) com o assunto *Desafio Fullstack Automaticket - {Seu nome}* e o link do repositório forkado (não é necessário criar Pull Request).

O desafio consiste em um CRUD de usuários.<br>
Esperamos que o projeto tenha duas páginas. Uma para a **listagem de usuários** e outra com **formulário de cadastro/edição**.<br>
O usuário deverá ter informações de dados pessoais básicos, endereço e parentesco, onde os *dados pessoais* e *endereço* são obrigatórios.

## Front-end
- Nós utilizamos Vue.js e React.js, mas fique a vontade para utilizar o que você achar a melhor solução para o desafio.
- A página de listagem de usuários deverá ser paginada e ordenada por data de alteração.
- Se as informações de algum usuário forem alteradas, a página de listagem deverá ser atualizada sem a necessidade do recarregamento da página.
- No formulário, o campo `Cep` deve ser integrado com a API da [ViaCEP](https://viacep.com.br/) para preenchimento automático dos campos de endereço.  

## Back-end
- Nós utilizamos Laravel, mas fique a vontade para utilizar o que você achar a melhor solução para o desafio.
- Crie uma API REST para o CRUD de usuários, fazendo uso das boas práticas.
- As requisições do CRUD de usuários na API deverão ser autenticadas.
- Utilize MySQL para a persistência dos dados dos usuários cadastrados.
- Pedimos que crie o Dockerfile e docker-compose.yml do projeto.

Bom desafio 😎
