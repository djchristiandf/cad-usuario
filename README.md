# Symfony 6 Twig 3 PHP 8 - Bootstrap 4

## Projeto DIO

Projeto desenvolvido no curso php avançado da DIO , crud de usuario usando sqlite 3

- composer require twig
- composer require symfony/orm-pack
- composer require --dev symfony/maker-bundle
- composer require --dev symfony/var-dumper
- Lembrando na versao symfony 6 usa o EntityManagerInterface $entityManager para persistir dados no banco
- verifica se tem dados no banco: php bin/console dbal:run-sql 'SELECT * FROM usuario'