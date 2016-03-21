# magento-products-xml

Módulo para Magento Community versão 2 gera XML contendo id e nome dos produtos de uma determinada categoria informada como parâmetro.

**Instalação**
O primeiro passo para instalação deste módulo é clonar o repositório ou baixar e copiar seu conteúdo para o diretório /app/code no diretório raiz do Magento. Após adicionar os arquivos do módulo devemos habilitar o módulo no Magento, para isto na pasta raiz de sua instalação Magento devemos executar o comando:
> php bin/magento module:enable Poli_XML

Agora devemos atualizar a configuração de deploy executando na pasta raiz de sua instalação magento o comando: 
> php bin/magento setup:upgrade

O último passo consiste em atualizar os arquivos pré-compilados do Magento, para fazer isto devemos executar na pasta raiz do do sistema o comando: 
> php bin/magento setup:di:compile

**Acesso**
É possível acessar o resultado do XML pelo endereço: 
> <domínio>/xml/category?id=<id-da-categoria>
