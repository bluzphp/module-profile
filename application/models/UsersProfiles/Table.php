<?php

/**
 * @namespace
 */

namespace Application\UsersProfiles;

/**
 * Class Table for `users_profiles`
 *
 * @package  Application\UsersProfiles
 *
 * @author   dev
 * @created  2017-10-18 14:23:20
 */
class Table extends \Bluz\Db\Table
{
    /**
     * @var string
     */
    protected $name = 'users_profiles';

    protected $rowClass = Row::class;

    /**
     * Primary key(s)
     * @var array
     */
    protected $primary = ['userId'];

    /**
     * init
     *
     * @return void
     */
    public function init(): void
    {
        $this->linkTo('userId', 'Users', 'id');
    }
}
