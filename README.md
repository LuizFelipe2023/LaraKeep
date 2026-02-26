# 💡 LaraKeep

O **LaraKeep** é uma aplicação de gerenciamento de notas moderna e minimalista, desenvolvida com o ecossistema Laravel. A interface foi inteiramente inspirada no **Google Keep**, focando em uma experiência de usuário limpa, rápida e intuitiva.

---

## 🚀 Tecnologias Utilizadas

Este projeto combina a robustez do back-end PHP com a agilidade do front-end moderno:

* **PHP 8.1+ & [Laravel 10](https://laravel.com/):** Framework robusto para a estrutura e segurança back-end.
* **[Livewire 3](https://livewire.laravel.com/):** Criação de componentes dinâmicos e reativos sem recarregamento de página.
* **[JavaScript (ES6+)](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript):** Lógica customizada para integração do editor **Quill.js**, manipulação do DOM e sincronização de eventos com o ciclo de vida do Livewire.
* **[Bootstrap 5](https://getbootstrap.com/):** Framework CSS para garantir responsividade e componentes modernos.
* **MySQL:** Banco de dados relacional para persistência das notas.

---

## ✨ Funcionalidades e Diferenciais

### 🔐 Autenticação Refinada
* **Fluxo de Acesso Seguro:** Sistema de Login e Registro com validação em tempo real e proteção contra ataques de força bruta.
* **Isolamento de Dados (Multi-tenancy):** Cada usuário possui seu ambiente isolado, garantindo que uma nota só possa ser visualizada, editada ou excluída pelo seu respectivo dono.
* **Proteção de Rotas:** Uso de Middlewares para garantir que apenas usuários autenticados acessem o dashboard.

### 📝 Gestão de Notas (Rich Text)
* **Editor Rico (JavaScript):** Integração com a biblioteca Quill para suporte a textos formatados (negrito, listas, links), gerenciado via scripts JS personalizados.
* **Layout Masonry:** Interface de mosaico que organiza as notas de forma inteligente, aproveitando cada espaço da tela conforme o tamanho do conteúdo.

### 🔍 Experiência do Usuário (UX)
* **Busca Dinâmica com Debounce:** Pesquisa instantânea que otimiza as requisições ao servidor, filtrando notas por título e conteúdo enquanto você digita.
* **Feedback Visual Imersivo:** Uso de `backdrop-filter` (blur) em modais e sombras estratégicas (Material Design) para indicar profundidade e foco.
* **Filtragem por Status:** Organize suas notas entre "Ativas" e "Arquivadas" com apenas um clique.

---

## 🛠️ Como Instalar e Rodar

1.  **Clone o repositório:**
    ```bash
    git clone [https://github.com/LuizFelipe2023/larakeep.git](https://github.com/LuizFelipe2023/larakeep.git)
    cd larakeep
    ```

2.  **Instale as dependências (PHP e JS):**
    ```bash
    composer install
    npm install && npm run build
    ```

3.  **Configuração de Ambiente:**
    * Crie o arquivo `.env`: `cp .env.example .env`
    * Gere a chave da aplicação: `php artisan key:generate`
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

## 📂 Arquitetura de Scripts

A interação entre o back-end e o front-end é potencializada por arquivos JavaScript específicos:
* `public/js/quill-setup.js`: Script responsável por inicializar o editor e realizar a "ponte" de dados com as propriedades do Livewire.
* **Eventos Customizados:** Uso de `livewire:init` e `dispatch` para comunicação assíncrona entre componentes.

---

## 📄 Licença
Distribuído sob a licença MIT. Veja `LICENSE` para mais informações.

---
**Desenvolvido por [Luiz Felipe Frois Neves](https://github.com/LuizFelipe2023)** 🚀