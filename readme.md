# Super Gestão - Projeto do Curso de Laravel

Este repositório contém o código-fonte do projeto "Super Gestão", desenvolvido durante o curso de Laravel do professor Jorge Sant Ana na plataforma Udemy.

## 📚 Curso

*   **Nome:** Desenvolvimento Web Completo 2022
*   **Instrutor:** Jorge Sant Ana
*   **Plataforma:** Udemy

## 🚀 Como Executar o Projeto

Siga os passos abaixo para configurar e executar o projeto em seu ambiente local.

1.  **Clonar o repositório:**
    ```bash
    git clone <url-do-seu-repositorio>
    cd app_super_gestao
    ```

2.  **Instalar as dependências:**
    ```bash
    composer install
    ```

3.  **Configurar o ambiente:**
    Copie o arquivo de exemplo `.env.example` para `.env` e gere a chave da aplicação.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    *Não se esqueça de configurar a conexão com seu banco de dados no arquivo `.env`.*

4.  **Executar as migrations e seeders (opcional):**
    Para criar as tabelas no banco de dados e popular com dados de teste.
    ```bash
    php artisan migrate --seed
    ```

5.  **Iniciar o servidor:**
    ```bash
    php artisan serve
    ```

6.  Acesse `http://localhost:8000` em seu navegador.
