<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateFeelings extends AbstractMigration
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
        $table = $this->table('feelings');
        $table->addColumn('user_id', 'integer', [
            'null' => true,
            'default' => null,
        ]);
        $table->addColumn('status_id', 'integer', [
            'null' => true,
            'default' => null
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
