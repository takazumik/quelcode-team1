<?php

use Migrations\AbstractMigration;

class CreateReservations extends AbstractMigration
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
        $table = $this->table('reservations');
        $table->addColumn('cinema_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('seat_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('birthday', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('sex', 'boolean', [
            'default' => null,
            'limit' => 1,
            'null' => false,
        ]);
        $table->addColumn('number_of_people', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('is_cancelled', 'boolean', [
            'default' => 0,
            'limit' => 1,
            'null' => false,
        ]);
        $table->create();
    }
}
