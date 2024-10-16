<?php

namespace App\Http\Controllers;

use App\DishOrderEnum;
use App\Models\Dish;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input("q");
        $order = $request->input("orderBy", DishOrderEnum::Newest->value);
        $dishes = null;
        // get the results
        if (empty($q)) {
            $dishes = Dish::query();
        } else {
            $dishes = Dish::where("name", "like", '%' . $q . '%');
        }
        // order them
        switch ($order) {
            case DishOrderEnum::Newest->value:
                $dishes = $dishes->orderByDesc("created_at")->get();
                break;
            case DishOrderEnum::Oldest->value:
                $dishes = $dishes->orderBy("created_at")->get();
                break;
            case DishOrderEnum::MostViewed->value:
                $dishes = $dishes->orderByDesc("views")->get();
                break;
            case DishOrderEnum::MostLiked->value:
                // $dishes = $dishes->join("user_likes_dish", "dishes.id", "=", "user_likes_dish.dish_id")->select("dishes.id", "dishes.name", "dishes.description", "dishes.image", DB::raw("count(user_likes_dish.user_id) as likes"))->groupBy("dishes.id", "dishes.name", "dishes.description", "dishes.image")->get();
                $dishes = $dishes->withCount("likedByUsers")->orderByDesc("liked_by_users_count")->get();
                break;
            case DishOrderEnum::Alphabetical->value:
                $dishes = $dishes->orderBy("name")->get();
                break;

            default:
                $dishes = $dishes->get();
                break;
        }
        return view("feed")->with("dishes", $dishes);
    }
    public function favorites(Request $request)
    {
        $q = $request->input("q");
        $dishes = null;
        if (empty($q)) {
            $dishes = request()->user()->likedDishes()->get();
        } else {
            $dishes = Dish::where("name", "like", '%' . $q . '%')->get();
        }
        return view("feed")->with("dishes", $dishes);
    }

    public function show($id)
    {
        $dish = Dish::find($id);
        Dish::where("id", $id)->increment("views");
        return view("dish", ["dish" => $dish]);
    }
}
