<?php
/**
 * @namespace
 */
namespace Application\UsersProfiles;

use Bluz\Proxy\Auth;
use Bluz\Validator\Traits\Validator;

/**
 * Class Row for `users_profiles`
 *
 * @package  Application\UsersProfiles
 *
 * @property integer $userId
 * @property string $firstName
 * @property string $lastName
 * @property string $birthday
 * @property string $created
 * @property string $updated
 *
 * @author   dev
 * @created  2017-10-18 14:23:20
 */
class Row extends \Bluz\Db\Row
{
    use Validator;

    /**
     * beforeSave
     *
     * @return void
     */
    public function beforeSave()
    {
        $this->addValidator('firstName')->alpha();
        $this->addValidator('lastName')->alpha();
        $this->addValidator('birthday')->date('Y-m-d');
    }

    /**
     * @return void
     */
    public function beforeInsert()
    {
        $this->created = gmdate('Y-m-d H:i:s');
        $this->userId = Auth::getIdentity()->id;
    }

    /**
     * @return void
     */
    public function beforeUpdate()
    {
        $this->updated = gmdate('Y-m-d H:i:s');
    }
}
