# 💡 LaraKeep

O **LaraKeep** é uma aplicação de gerenciamento de notas moderna e minimalista, desenvolvida com o ecossistema Laravel. A interface foi inteiramente inspirada no **Google Keep**, focando em uma experiência de usuário limpa, rápida e intuitiva.

---

## 🚀 Tecnologias Utilizadas

Este projeto foi construído utilizando as ferramentas mais recentes do ecossistema PHP:

* **PHP 8.1+**
* **[Laravel 10](https://laravel.com/):** Framework robusto para a estrutura back-end.
* **[Livewire 3](https://livewire.laravel.com/):** Para criação de interfaces dinâmicas e reativas sem recarregamento de página.
* **[Bootstrap 5](https://getbootstrap.com/):** Framework CSS para garantir responsividade e componentes modernos.
* **MySQL:** Banco de dados relacional para persistência das notas.

---

## ✨ Funcionalidades

* 🔐 **Autenticação Customizada:** Telas de Login e Registro baseadas no estilo *Google Accounts* utilizando componentes Livewire.
* 📝 **Gestão de Notas (CRUD):** Criação, edição, visualização e exclusão de notas.
* 🔍 **Filtro em Tempo Real:** Sistema de busca dinâmica por título e filtragem por status (Ativa/Arquivada).
* 🎨 **Interface "Keep Style":** Design sem bordas (borderless), uso de sombras suaves (Material Design) e tipografia limpa.
* 🛡️ **Segurança e Privacidade:** * Filtro de dados por usuário logado.
    * Proteção contra exclusão e edição de notas de terceiros via validação de propriedade.
* 🔔 **Feedback Visual:** Uso de `session()->flash()` para notificações de sucesso (Snackbars).

---

## 🛠️ Como Instalar e Rodar

Siga os passos abaixo para executar o projeto em sua máquina local:

1.  **Clone o repositório:**
    ```bash
    git clone [https://github.com/seu-usuario/larakeep.git](https://github.com/seu-usuario/larakeep.git)
    cd larakeep
    ```

2.  **Instale as dependências:**
    ```bash
    composer install
    npm install && npm run build
    ```

3.  **Configuração de Ambiente:**
    * Crie o arquivo `.env`:
        ```bash
        cp .env.example .env
        ```
    * Gere a chave da aplicação:
        ```bash
        php artisan key:generate
        ```
    * Configure as credenciais do seu banco de dados no arquivo `.env`.

4.  **Migrações:**
    ```bash
    php artisan migrate
    ```

5.  **Execução:**
    ```bash
    php artisan serve
    ```
    Acesse: `http://localhost:8000`

---

## 📂 Estrutura de Pastas Relevantes

* `app/Livewire/`: Contém a lógica de todos os componentes dinâmicos (Listagem, Login, CRUD).
* `resources/views/livewire/`: Templates Blade estilizados com a estética do Google Keep.
* `routes/web.php`: Rotas protegidas por middleware de autenticação.

---

## 📄 Licença
Distribuído sob a licença MIT. Veja `LICENSE` para mais informações.

---
**Desenvolvido por [Luiz Felipe Frois Neves](https://github.com/LuizFelipe2023)** 🚀