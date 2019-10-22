# Codeception - Projeto básico


## Requisitos do sistema
1. Servidor Apache 2.0+ e PHP 5.6+
    1.   Recomendado usar XAMPP para melhores resultados
    1.   [Download](https://www.apachefriends.org/pt_br/index.html/)

1. git 2+
    1.   Este tutorial cobre o uso de git via shell
    1.   [Download](https://git-scm.com/)

1. Java 
    1. Necessário para rodar o selenium server para testes de aceitação
    1. [Download](https://www.java.com/pt_BR/download/)

1. Selenium Server
    1. Servidor que permite a instância de um navegador e testes automatizados neste navegador
    1. [Download](https://www.seleniumhq.org/download/)
    

1.  ChromeDriver
    1. WebDriver para o Google Chrome (Faça apenas o download da mesma versão do seu Chrome)
    1. [Download](https://chromedriver.chromium.org/downloads)
    
     
## Instalando o codeception
1. Clonar este projeto onde seu servidor está instalado

-   **!!IMPORTANTE!!** Execute o comando abaixo dentro da pasta htdocs do XAMPP (**xampp/htdocs**)
```
git clone https://github.com/rafacarv2/codeception_cpd.git
```
2. Acessar a pasta do projeto
```
cd codeception_cpd
```
3. Baixar o composer mais recente
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
4. Instalar o codeception mais recente
```
php composer.phar require "codeception/codeception" --dev
```

## Criando o primeiro caso de teste de aceitação
* **!!IMPORTANTE!!** Certifique-se de que seu servidor local está funcionando
1. Criar os arquivos de configuração 
```
vendor/bin/codecept bootstrap
```
2. Criando o caso de teste
```
vendor/bin/codecept generate:cest acceptance FirstCest
```
3. Configurar o arquivo  **tests/acceptance.suite.yml**

```
# tests/acceptance.suite.yml
actor: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: http://localhost/codeception_cpd/app/
        - \Helper\Acceptance
```
4. Escrevendo um teste básico 
* Alterar o arquivo **tests/acceptance/FirstCest.php** inserindo o código abaixo
```
<?php
class FirstCest 
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('I\'M ALIVE');  
    }
}

```
5. Executar o teste
-   **!!IMPORTANTE!!** Certifique-se de que o servidor apache esteja rodando corretamente antes de executar o comando abaixo. Caso contrário, erros acontecerão
```
vendor/bin/codecept run --steps
```
## Testando com Selenium

1. Baixar o Selenium Server - [Download](https://www.seleniumhq.org/download/)

2. Baixar o Chrome Driver - [Download](https://chromedriver.chromium.org/downloads)

*   Certifique-se de que o **chromedriver.exe** correto e que o **arquivo .jar do seleniumServer** estejam dentro da mesma pasta

3. Em um terminal separado, execute o Selenium Server.
    * É necessário utilizar outro terminal, pois o selenium server tornará o terminal ocupado por tempo indeterminado
```
java -jar {Caminho do selenium server}
```
4. Criar um caso de teste
```
vendor/bin/codecept generate:cest acceptance Acceptance
```

5. Alterar a configuração do teste funcional em **acceptance.suite.yml**
```
# tests/acceptance.suite.yml
actor: AcceptanceTester
modules:
    enabled:
        - WebDriver:
            url: http://localhost/codecept/app/
            browser: chrome
        - \Helper\Acceptance
```

6. Alterar o arquivo de roteiro de teste **tests/acceptance/AcceptanceCest.php**
```
<?php 
class AcceptanceCest
{
    public function testeLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('I\'M ALIVE');
        $I->fillField('#formNome', 'Rafael');
        $I->fillField('#formSenha', 'Senha');
        $I->click('#submit');
        $I->see('Im Sorry Rafael');
        $I->wait(3); // wait for 3 secs
    }
}

```
7. Executar o teste
```
vendor/bin/codecept run --steps
```
