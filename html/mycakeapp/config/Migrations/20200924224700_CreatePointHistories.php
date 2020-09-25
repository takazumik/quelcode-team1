<?php

use Migrations\AbstractMigration;

class CreatePointHistories extends AbstractMigration
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
        $table = $this->table('point_histories');
        $table->addColumn('Point_histories', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('payment_history', 'integer', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('point', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->create();
    }
}
