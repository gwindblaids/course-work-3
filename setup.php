<?php

/**
 * @Author: gwindblaids
 * @Date:   2018-03-29 16:25:07
 * @Last Modified by:   gwindblaids
 * @Last Modified time: 2018-04-16 18:15:54
 */

// скрипт автоматически заполняет базу данных случайными данными

// Подключим автозагрузку классов

require 'vendor/autoload.php';

// Объявим неймспейсы
use Faker\Factory as Faker;
use RedBeanPHP\R  as RedBean;

function datetime () {
	$min = strtotime("20151227");
    $max = strtotime("20181130");

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d H:i:s', $val);
}

// Запишем экземпляр класса Faker\Factory в переменную

function datefor_b() {
	$min = strtotime("20151227");
    $max = strtotime("20181130");

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return $val;
}
function datefor_e($value) {
    $max = strtotime("20181130");

    // Generate random number using above bounds
    $val = rand($value, $max);

    // Convert back to desired date format
    return date('Y-m-d H:i:s', $val);
}

$faker = Faker::create('ru_RU');

// Подключаемся к БД как в PDO
RedBean::setup('mysql:host=localhost;dbname=course_work;', 'root', '');

for ($i=0;$i<100;$i++) {

$price_min = rand(4,10);
$datetime_begin = datefor_b();
$datetime_end = datefor_e($datetime_begin);
$quantity_min = rand(1,50000);
// массив данных для таблицы price
$data_price = [
	'date' =>datetime(),
	'price_min' =>$price_min,
	'privilege_twenty_two' =>$price_min-rand(1,3),
	'privilege_two_six' =>$price_min - rand(1,4),
];

// массив данных для таблицы receipt
$data_receipt = [
	'name' => $faker->company,
	'adress' => $faker->region,
	'phone' => rand(1111111111,9999999999),
	'data_begin_s' => date('Y-m-d H:i:s',$datetime_begin),
	'data_end_s' => $datetime_end,
	'quantity_min' => $quantity_min,
	'price_min' => $price_min,
	'sum' => $quantity_min*$price_min,
	'full_name_operator' => $faker->firstNameMale . " " . $faker->lastName,
	'number_operator' => rand(1,38),
	'number_shifts' => rand(1,100),
	'quantity_seans' => rand(1,5),

];

// массив данных для таблицы users	
$data_users = [
    'ip'     => "".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255),
    'datetime_begin' => date('Y-m-d H:i:s',$datetime_begin),
    'datetime_end' => $datetime_end, 
];

// Создаём модели
$users = RedBean::dispense('users');

$receipt = RedBean::dispense('receipt');

$price = RedBean::dispense('price');

// В стиле ActiveRecord присваиваем наши значения
foreach ($data_price as $key => $value) {
	$price->{$key} = $value;
}

foreach ($data_receipt as $key => $value) {
	$receipt->{$key} = $value;
}

foreach ($data_users as $key => $value) {
    $users->{$key} = $value;
}

// Сохраняем модель в БД
RedBean::store($users);
RedBean::store($receipt);
RedBean::store($price);
}
echo "База успешно наполнена. Переход на главную страницу...";
sleep(20);
// редирект на главную страницу
header('Location: index.php');