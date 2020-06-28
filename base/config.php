<?php
const DB_USER = 'loftschools';
const DB_NAME = 'loftschools';
const DB_HOST = 'mysql';
const DB_PASSWORD = 'loftschools';

const ADMIN_IDS = [9, 15];
const MESSAGES_PER_PAGE = 5;

function d(...$args)
{
    var_dump($args);
    die;
}

use App\Model\Eloquent\User;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => DB_HOST,
    'database'  => DB_NAME,
    'username'  => DB_USER,
    'password'  => DB_PASSWORD,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$capsule->getConnection()->enableQueryLog();