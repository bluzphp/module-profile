<?php

use Phinx\Migration\AbstractMigration;

class ProfilePermissions extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $data = [
            [
                'roleId' => 2,
                'module' => 'profile',
                'privilege' => 'Management'
            ],
            [
                'roleId' => 2,
                'module' => 'users',
                'privilege' => 'EditProfile'
            ],
            [
                'roleId' => 3,
                'module' => 'users',
                'privilege' => 'EditProfile'
            ],
        ];

        $privileges = $this->table('acl_privileges');
        $privileges->insert($data)
            ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute('DELETE FROM acl_privileges WHERE module = "profile"');
    }
}
