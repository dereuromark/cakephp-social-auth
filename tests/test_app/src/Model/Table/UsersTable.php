<?php
declare(strict_types=1);

namespace TestApp\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\Http\Session;
use Cake\ORM\Table;

class UsersTable extends Table
{
    public function getUser(EntityInterface $profile, Session $session): EntityInterface
    {
        return $this->newEntity([
            'id' => 1,
            'username' => 'foobar',
        ]);
    }
}
