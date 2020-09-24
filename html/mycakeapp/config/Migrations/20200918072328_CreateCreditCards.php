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
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('card_number', 'integer', [
            'limit' => 16,
            'null' => false,
        ]);
        $table->addColumn('expiration_date', 'integer', [
            'limit' => 4,
            'null' => false,
        ]);

        $table->addColumn('card_holder', 'string', [
            'limit' => 11,
            'null' => false,
        ]);

        $table->addColumn('security_code', 'integer', [
            'limit' => 4,
            'null' => false,
        ]);

        $table->addColumn('is_deleted', 'boolean', [
            'limit' => 1,
            'null' => false,
        ]);

        $table->addColumn('created', 'datetime', [
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'null' => false,
        ]);

        $table->addForeignKey('user_id', 'users', 'id');

        $table->create();
    }
}
