<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\AddressSeller::class, function (Faker\Generator $faker) {

  return [
    'address' => $faker->address,
    'city' => $faker->city,
    'state' => $faker->words(),
    'country' => $faker->country,
    'postal_code' => $faker->postcode
  ];
});

$factory->define( App\Label::class, function ( Faker\Generator $faker ) {
  return [
    'name' => $faker->name
  ];

} );

$factory->define( App\Seller::class, function ( Faker\Generator $faker ) {
  $address = App\AddressSeller::pluck( 'id' )->all();

  return [
    'first_name' => $faker->firstName,
    'last_name' => $faker->lastName,
    'address_id' => $faker->randomElement( $address )
  ];
} );

$factory->define( App\Review::class, function ( Faker\Generator $faker ) {
  return [
    'critic_name' => $faker->name,
    'title' => $faker->title,
    'content' => $faker->text,
    'date' => $faker->date()
  ];
} );

$factory->define( App\Product::class, function ( Faker\Generator $faker ) {
  $seller = App\Seller::pluck( 'id' )->all();

  return [
    'name' => $faker->name,
    'price' => $faker->randomFloat( 2,1,1000 ),
    'description' => $faker->text,
    'selled_id' => $faker->randomElement( $seller )
  ];
} );
