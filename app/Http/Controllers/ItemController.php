<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\ItemList;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        try {
            $item = new Item();
            foreach ($request as $key => $value) {
                $item->$key = $request->$key;
            }
            $item->itemList()->associate(ItemList::find(1));
            $item->category()->associate(Category::find(1));

            // Once we have authentication up and running
            // $il->user()->associate(auth()->user);
            $item->save();
            return response()->json($item, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $item = Item::find($id);
            if ($item == null) {
                return response()->json(['message' => 'Item not found'], 404);
            }
            return response()->json($item, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $item = Item::find($id);
            if ($item == null) {
                return response()->json(['message' => 'Item not found'], 404);
            }
            $item->name = $request->name;
            // TODO: Assess if modified/created by fields will come in handy
            //$il->user = User::find(1);
            $item->save();
            return response()->json($item, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::destroy($id);

        return response()->noContent();
    }
}
