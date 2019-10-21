# Codeception - Projeto básico
## Instalando o codeception
1. Clonar este projeto
```
git clone https://github.com/rafacarv2/codeception_cpd.git
```
2. Baixar a versão mais recente do Composer
```
https://getcomposer.org/download/
```
3. Instalar o codeception mais recente
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


