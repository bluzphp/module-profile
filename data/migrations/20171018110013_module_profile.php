<?php


use Phinx\Migration\AbstractMigration;

class ModuleProfile extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     *
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function change()
    {
        $profiles = $this->table('users_profiles', ['id' => false, 'primary_key' => ['userId']]);
        $profiles
            ->addColumn('userId', 'integer')
            ->addColumn('firstName', 'string', ['length' => 255, 'null' => true])
            ->addColumn('lastName', 'string', ['length' => 255, 'null' => true])
            ->addColumn('birthday', 'date', ['default' => null, 'null' => true])
            ->addTimestamps('created', 'updated')
            ->addForeignKey('userId', 'users', 'id', [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->create();
    }
}
