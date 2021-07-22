<?php

/**
 * Edit User Profile
 *
 * @author   Anton Shevchuk
 * @created  19.10.17 09:19
 */

namespace Application;

use Application\UsersProfiles\Table;
use Bluz\Controller\Controller;
use Bluz\Controller\Mapper\Crud;
use Bluz\Proxy\Auth;
use Bluz\Proxy\Layout;

/**
 * @privilege EditProfile
 */
return function () {
    /**
     * @var Controller $this
     */
    Layout::title('Update Profile');
    $this->assign('user', $this->user());

    // if profile not exists, than create it
    if (!$row = Table::findRow(Auth::getIdentity()->getId())) {
        $row = Table::create(['userId' => Auth::getIdentity()->getId()]);
        $row->save();
    }


    $crud = new Crud(UsersProfiles\Crud::getInstance());
    $crud->addParam('userId', Auth::getIdentity()->getId());

    $crud->get('system', 'crud/get');
    $crud->post('system', 'crud/post')->fields(['firstName', 'lastName', 'birthday']);
    $crud->put('system', 'crud/put')->fields(['firstName', 'lastName', 'birthday']);

    return $crud->run();
};
