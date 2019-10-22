# Codeception - Projeto básico


## Requisitos do sistema
1. Servidor Apache 2.0+ e PHP 5.6+
    1.   Recomendado usar XAMPP para melhores resultados
    1.   [Download](https://www.apachefriends.org/pt_br/index.html/)

1. git 2+
    1.   Este tutorial cobre o uso de git via shell
    1.   [Download](https://git-scm.com/)
1. Composer 1.3+
    1. Caso já tenha o php instalado corretamente, siga o tutorial abaixo para baixar o composer mais recente
    ```
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
    ```
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
4. Instalar o codeception mais recente
```
php composer.phar require "codeception/codeception" --dev
```

## Criando o primeiro caso de teste de aceitação
1. Criar os arquivos de configuração 
```
vendor/bin/codecept bootstrap
```
2. Criando o caso de teste
```
vendor/bin/codecept generate:cest acceptance Aceitacao
```
3. Configurar o arquivo  **tests/acceptance.suite.yml**
* Certifique-se de que seu servidor local está funcionando. No exemplo abaixo, é usado o servidor do XAMPP
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
class AceitacaoCest 
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('I\'M ALIVE');  
    }
}

```
5. Executar o teste
```
vendor/bin/codecept run --steps
```
## Testando com Selenium
1. Baixar o Selenium Server
```
https://www.seleniumhq.org/download/
```
2. Baixar o Chrome Driver
```
https://chromedriver.chromium.org/downloads
```
O arquivo chromedriver.exe deve estar na mesma pasta onde o Selenium Server está instalado.

3. Executar o Selenium Server
```
java -jar {Caminho do selenium server}
```
4. Criar um caso de teste
```
vendor/bin/codecept generate:cest functional Funcional
```

5. Alterar a configuração do teste funcional em **functional.suite.yml**
```
# tests/functional.suite.yml
actor: FunctionalTester
modules:
    enabled:
        - WebDriver:
            url: http://localhost/codecept/app/
            browser: chrome
        - \Helper\Functional
```

6. Alterar o arquivo de roteiro de teste **tests/acceptance/FuncionalCest.php**
```
<?php 
class FuncionalCest
{
    public function testeLogin(FunctionalTester $I)
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
