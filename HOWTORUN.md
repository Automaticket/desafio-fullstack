# How to run
Para executar o projeto você irá precisar ter ter o docker instalado em sua maquina.

Com o docker instalado, va até a raiz do prejeto, acesse a pasta **docker** e rode o seguinte comando:

- ``` docker-compose up --build ``` (Esse comando irá buildar e executar as images do docker.)

Após finalizar a execução do camando anterior, execute o comando:

- ``` docker-compose exec php-fpm sh ./install.sh ``` (Este comando irá instalar as dependencias da API e configura-la.)

Após finalizar a execução do camando, a api deverá estar pronta.

**Obs:** eu não tenho muita habilidade com docker ainda, e não sei por qual razão meu containar para rodar a aplicação web não funcionou, então para conseguir executar a mesma, suguro seguir o seguinte procedimento:

Para esta etapa, será preciso ter instalado em sua máquina o node e o npm.

Com a máquina preparada, acesse a pasta **web**, e rode ```npm install``` e depois ```npm run dev```.

Após compilação, à aplicação pode ser acessada em http://localhost:8080.

Os dados para acesso, estão na tela de login.
