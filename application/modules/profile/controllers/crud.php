<?php
/**
 * CRUD for options
 */

/**
 * @namespace
 */
namespace Application;

use Bluz\Controller\Controller;
use Bluz\Controller\Mapper\Crud;

/**
 * @accept HTML
 * @accept JSON
 * @privilege Management
 *
 * @return mixed
 */
return function () {
    /**
     * @var Controller $this
     */
    $crud = new Crud(UsersProfiles\Crud::getInstance());

    $crud->get('system', 'crud/get');
    $crud->post('system', 'crud/post')->fields(['firstName', 'lastName', 'birthday']);
    $crud->put('system', 'crud/put')->fields(['firstName', 'lastName', 'birthday']);
    $crud->delete('system', 'crud/delete');
    
    return $crud->run();
};
