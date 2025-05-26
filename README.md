## Autor: Sebastião Monteiro

# Funcionalidade CRUD

## Pré-requisitos

MySql v.9.2

Uma conta no GitHub, GitLab ou Bitbucket para enviar seu código
https://github.com/thinnkeeper/gestao-tarefas/tree/master

Versão 5 do Bootstrap

# Etapas

## Etapa 1: Instalação do Laravel
Instalou-se o Laravel através do Laravel Herd v12, criando a aplicação com o comando:
_ composer create-project laravel/laravel gestao-tarefas _

## Etapa 2: Criação da Base de Dados
Foi criada a base de dados no MySQL com o nome:
_ CREATE DATABASE gestao_tarefas; _

As credenciais e nome da BD foram configurados no ficheiro .env:
_ DB_DATABASE=gestao_tarefas
DB_USERNAME=root
DB_PASSWORD=senha _

## Etapa 3: Criação das Tabelas com Migrations
Foi criada a tabela tarefas através de uma migration personalizada:
_ php artisan make:model Tarefa -m _

Campos definidos na migration:

- titulo (string)
- descricao (text, opcional)
- data_fim (date)
- status (enum: pendente, em andamento, concluída)
- user_id (chave estrangeira)

Migration aplicada com:
_ php artisan migrate _

## Etapa 4: Criação dos Controladores
Foi criado o controlador TarefaController com as ações padrão de CRUD:
_ php artisan make:controller TarefaController --resource _

Também foi criado o form request TarefaRequest para validação dos dados:
_ php artisan make:request TarefaRequest _


## Etapa 5: Configuração do Template com Blade
Foi definido um layout principal em resources/views/layouts/app.blade.php, com inclusão de:

Menu de navegação: partials/nav.blade.php
Rodapé: partials/footer.blade.php
Views criadas para as tarefas:
- tarefas/index.blade.php
- tarefas/create.blade.php
- tarefas/edit.blade.php
- tarefas/show.blade.php
- tarefas/form.blade.php (formulário reutilizável)

## Etapa 6: Definição das Rotas
As rotas protegidas foram declaradas em routes/web.php, incluindo:
_ Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('tarefas.index');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('tarefas', TarefaController::class);
}); _

A autenticação foi configurada com Laravel Breeze:
_ composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate _

## Etapa 7: Implementação e Testes do CRUD
Implementou-se o CRUD completo:
Criar, listar, editar, visualizar e eliminar tarefas

Paginação da lista

Filtro e ordenação por status e data_fim

As funcionalidades foram testadas através da interface web com utilizadores autenticados.
