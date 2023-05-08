# gestor_de_licencas

Gestão de Licenciamentos

# Descrição #
O projeto contém tudo o que você precisa para rodar:

- Painel
- Usuários
- Fornecedores
- Empresas
- Notas Capa
- Relatório
Com uma estrutura fácil de usar, configurar e ampliar com poucos conhecimentos básicos de programação na linguagem PHP e no framework PHP Codeigniter v3.x.

# Instalação #
1. Baixe e descompacte o arquivo "ativacao.zip" para uma pasta temporária em seu computador
2. Copie todo o conteúdo interno da pasta do passo anterior para o seu servidor usando um programa de FTP (Filezilla, etc.) ou o painel de controle do servidor (Cpanel, Virtualmin, etc.)
1. Se for um servidor compartilhado (bluehost, hostgator, etc.) copie-o para a pasta "./hosting_user_name/public_html/"
2. Se for um servidor privado ou dedicado (VPS) você deve copiar principalmente o conteúdo na pasta "/var/www/html/"
3. Deve ser criado um banco de dados que possa ser acessado com um nome de usuário e senha, e tenha esses dados em mãos
5. Importe o arquivo "base.sql" para o banco de dados, que contém todos os dados necessários para a utilização do sistema.
4. Deve-se alterar os parâmetros do arquivo "./application/config/database.php" com os parâmetros do passo anterior conforme exemplo a seguir:
5. Você deve editar o arquivo ".htaccess" na configuração "RewriteBase" para o endereço onde o sistema está localizado, por exemplo: "RewriteBase /" quando o aplicativo estiver na raiz ou "RewriteBase /<my_folder>/ " quando o sistema está na pasta "<my_folder>". 
6. Você deve adicionar permissões de gravação (755 ou 777) à pasta "./assets/*" para que o sistema possa enviar arquivos para aquela pasta.

Demais dúvidas, consultar a documentação oficial do Codeigniter: https://codeigniter.com/userguide3/installation/index.html

# frameworks #
- Bootstrap 4 CSS

# Licença #
Isso é licenciado sob a licença MIT, consulte o link a seguir para obter mais detalhes "[MIT](https://www.tldrlegal.com/l/mit)"
