<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users', [
            'encoding' => 'utf8',
            'collation' => 'utf8_general_ci',
        ]);
        $table->addColumn('name', 'char', [
            'length' => 36,
            'null' => false,
            'default' => null,
        ]);
        $table->addColumn('email', 'char', [
            'length' => 36,
            'null' => true,
            'default' => null,
        ]);
        $table->addColumn('password', 'char', [
            'length' => 36,
            'null' => false,
        ]);
        $table->addColumn('last_logined', 'datetime', [
            'null' => true,
            'default' => null,
        ]);
        $table->addColumn('created', 'datetime', [
            'null' => false,
            'default' => 'CURRENT_TIMESTAMP',
        ]);
        $table->addColumn('modified', 'datetime', [
            'null' => false,
            'default' => 'CURRENT_TIMESTAMP',
        ]);

        $table->create();
    }
}
