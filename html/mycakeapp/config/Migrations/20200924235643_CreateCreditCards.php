<?php

use Migrations\AbstractMigration;

class CreateCreditCards extends AbstractMigration
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
        $table = $this->table('credit_cards');
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('card_number', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('expiration_date', 'integer', [
            'default' => null,
            'limit' => 4,
            'null' => false,
        ]);
        $table->addColumn('card_holder', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('security_code', 'integer', [
            'default' => null,
            'limit' => 4,
            'null' => false,
        ]);
        $table->addColumn('is_deleted', 'boolean', [
            'default' => 0,
            'null' => false,
        ]);
        $table->create();
    }
}
