<?php

/**
 * Show User Profile
 *
 * @author   Anton Shevchuk
 * @created  19.10.17 10:19
 */

namespace Application;

use Application\UsersProfiles\Table;
use Bluz\Controller\Controller;
use Bluz\Proxy\Auth;

/**
 * @privilege ViewProfile
 *
 * @param int $id
 */
return function ($id = null) {
    /**
     * @var Controller $this
     */
    $this->assign('profile', Table::findRow($id ?? Auth::getIdentity()->getId()));
};
