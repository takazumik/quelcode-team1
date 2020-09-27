<?php

use Migrations\AbstractMigration;

class CreateSeats extends AbstractMigration
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
        $table = $this->table('seats');
        $table->addColumn('seat_number', 'integer', [
            'default' => null,
            'limit' => 3,
            'null' => false,
        ]);
        $table->create();
    }
}
