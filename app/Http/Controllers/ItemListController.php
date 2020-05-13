<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use App\ItemList;
use App\Http\Requests\StoreItemListRequest;

class ItemListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ItemList::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemListRequest $request)
    {
        try {
            $il = new ItemList();
            $il->name = $request->name;
            $il->user()->associate(User::find(1));
            // Once we have authentication up and running
            // $il->user()->associate(auth()->user);
            $il->save();
            return response()->json($il, 200);
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
            $il = ItemList::find($id);
            if ($il == null) {
                return response()->json(['message' => 'Item List not found'], 404);
            }
            return response()->json($il, 200);
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
    public function update(StoreItemListRequest $request, $id)
    {
        try {
            $il = ItemList::find($id);
            if ($il == null) {
                return response()->json(['message' => 'Item List not found'], 404);
            }
            $il->name = $request->name;
            // TODO: Assess if modified/created by fields will come in handy
            //$il->user = User::find(1);
            $il->save();
            return response()->json($il, 200);
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
        ItemList::destroy($id);

        return response()->noContent();
    }
}
