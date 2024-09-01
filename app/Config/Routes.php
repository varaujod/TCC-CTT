<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('login','Login\Login::index');
$routes->post('login/novo', 'Login\Login::cadastrar');
$routes->post('login/entrar', 'Login\Login::entrar');
$routes->get('/', 'Home::index');
$routes->get('notificacao/requerimento/(:num)', 'Notificacao::NovosRequerimentos/$1');

$routes->group('cliente', ['filter' =>['login','usuario']], function ($routes) {
    $routes->get('/', 'Home::info_helloo');
    $routes->get('cadastro_func/(:num)', 'Home::cadastrofunc/$1');
    $routes->post('salvar', 'Funcionarios_empresas\Funcionario::salvarfunc'); 
    $routes->get('funcionario/remover/(:num)','Funcionarios_empresas\Funcionario::remover/$1');
    $routes->get('doc_archive/(:num)', 'Home::doc/$1');

    $routes->post('enviar', 'Client\Requerimento::solicitar');
    $routes->get('sair', "Login\Login::sair");
});

$routes->group('admin', ['filter' =>['login','usuario']], function ($routes) 
{
    // Ordem de serviço
    $routes->get('ordem',"Admin\Ordem::index");
    $routes->get('ordem', 'Admin\ViewsAdmin::ordem');
    $routes->post('ordem/salvar','Admin\Ordem::salvar');

    // setores
    $routes->get('setores/(:num)',"Admin\Categorias::index/$1");

    $routes->post('empresas/pesquisar',"Admin\Empresas::buscar");

    // Empresas
    $routes->get('cadastro', "Admin\Categoria::index");
    $routes->get('cadastro',"Admin\Empresas::listaCategoria");
    $routes->post('cadastro/salvar', 'Admin\Empresas::salvar');
    $routes->get('cadastro', "Admin\ViewsAdmin::cadastroemp");
    $routes->get('consultar/(:num)', "Admin\Empresas::consultar/$1");
    $routes->get('empresas', "Admin\ViewsAdmin::emp");
    $routes->get('empresas/(:num)', "Admin\Empresas::index/$1");
    $routes->get("empresas/remover/(:num)","Admin\Empresas::remover/$1");
 
    // Categorias 
    $routes->get('cadastro/categoria','Admin\ViewsAdmin::categorias');
    $routes->post('categoria/salvar', 'Admin\Categoria::salvar');


    $routes->get('setores', 'Admin\ViewsAdmin::setores');

    //Documentos Inserir
    $routes->get('consultar/cadastro/inserir/(:num)',"Admin\ViewsAdmin::inserir_doc/$1");

    // Documentos Consultar
    $routes->get('consultar/documentos/(:num)',"Admin\Documentos::consultar/$1");
    $routes->get('consultar/documentos-ano/(:num)/(:num)',"Admin\Documentos::consultarano/$1/$2");

    // Documentos requerimentos inserir
    $routes->post('consultar/requerimentos/inserir', 'Admin\Documentos::salvarRequerimento');
    $routes->get('consultar/cadastro/requerimentos/(:num)',"Client\Requerimento::alterar/$1");

    // Salvar Documento
    $routes->post('consultar/documentos/inserir', 'Admin\Documentos::salvarDoc');
    $routes->get('documentos/lista','Admin\ViewsAdmin::listarequisicao');

    // Agendamento
    $routes->get('agendamento', "Admin\ViewsAdmin::agendamento");
    $routes->get('agendamento', "Admin\Ordem::listarOrdem");
    $routes->get("ordem/remover/(:num)","Admin\Ordem::remover/$1");

    // Lista Funcionarios 
    $routes->get('consultar/lista-funcionarios/(:num)','Admin\ViewsAdmin::listafunc/$1');

    // planejamento
    $routes->get('planejamento','Admin\ViewsAdmin::planejamento');
    $routes->get('planejamento_datas','Admin\Client::list_eventos');
     // Cliente Usuario
     $routes->post('criarcliente/enviar','Login/Login::cadastrar');

    // Sair de admin
    $routes->get('sair', "Login\Login::sair");
});

$routes->group("api", function ($routes) 
{
    $routes->get("admin/empresas", "Api\Empresa::listarEmpresas");
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}