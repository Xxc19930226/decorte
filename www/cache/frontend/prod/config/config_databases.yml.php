<?php
// auto-generated by sfDatabaseConfigHandler
// date: 2017/11/29 05:44:01

return array(
'livedb' => new sfDoctrineDatabase(array (
  'dsn' => 'mysql:host=127.0.0.1;dbname=cosmedecorte',
  'username' => 'cosmedecorte',
  'password' => 'Databasepass@2017',
  'attributes' => 
  array (
    'use_native_enum' => true,
    'default_table_collate' => 'utf8_unicode_ci',
    'default_table_charset' => 'utf8',
  ),
  'name' => 'livedb',
)),

'doctrine' => new sfDoctrineDatabase(array (
  'dsn' => 'mysql:host=127.0.0.1;dbname=cosmedecorte',
  'username' => 'cosmedecorte',
  'password' => 'Databasepass@2017',
  'attributes' => 
  array (
    'use_native_enum' => true,
    'default_table_collate' => 'utf8_unicode_ci',
    'default_table_charset' => 'utf8',
  ),
  'name' => 'doctrine',
)),);