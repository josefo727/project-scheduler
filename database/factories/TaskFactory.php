<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    $rand = rand(1,10);
    if($rand == 1){
        $start = now()->addDays(rand(0,7));
        $end = (clone $start)->addDays(rand(1,3))->format('Y-m-d 00:00:00');
        $start = $start->format('Y-m-d 00:00:00');
    }else{
        $start = now()->addHours(rand(1,96));
        $end = (clone $start)->addHours(rand(1,12))->format('Y-m-d H:00:00');
        $start = $start->format('Y-m-d H:00:00');
    }

    $woc = 'TGX-ARA-' . rand(1500,9999);
    $colors = [
        "#3490dc",
        "#6574cd",
        "#e3342f",
        "#ffed4a",
        "#38c172",
        "#6cb2eb"
    ];
    return [
        'resource_id' => rand(1,20),
        'start' => $start,
        'end' => $end,
        'Work_Order_Code' => $woc,
        'bubbleHtml' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'barColor' => Arr::random($colors)
    ];
});
