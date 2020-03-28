<?php

namespace Tests\Unit;

use App\Item;
use App\Category;
use App\ItemList;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */
    public function createItem()
    {
        factory('App\User', 20)->create();
        factory('App\Category', 20)->create();
        factory('App\ItemList', 20)->create();

        $data = [
            'name' => $this->faker->words(random_int(1, 2), true),
            'expiryDate' => $this->faker->dateTimeBetween('now', '+2 years'),
            'bestBeforeDate' => $this->faker->dateTimeBetween('now', '+2 years'),
            'quantity' => $this->faker->numberBetween(1, 100),
            'weight' => $this->faker->randomFloat(2, 0.0, 100),
            'item_list_id' => ItemList::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];

        $item = factory(Item::class)->create($data);

        $storedItem = Item::where('name', $item->name)->first();

        $this->assertEquals($data['name'], $storedItem->name);
        // $this->assertEquals(date($data['expiryDate']), $storedItem->expiryDate);
        // $this->assertEquals(date($data['bestBeforeDate']), $storedItem->bestBeforeDate);
        $this->assertEquals($data['quantity'], $storedItem->quantity);
        $this->assertEquals($data['weight'], $storedItem->weight);
        $this->assertEquals($data['item_list_id'], $storedItem->item_list_id);
        $this->assertEquals($data['category_id'], $storedItem->category_id);

        print 'item can be created';
    }
}
