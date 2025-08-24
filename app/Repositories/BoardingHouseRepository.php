<?php

namespace App\Repositories;

use App\Models\Room;
// jangan keliru import Builder
use App\Models\Boardinghouse;
use Illuminate\Database\Eloquent\Builder;
use App\Interfaces\BoardingHouseRepositoryInterface;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null)
    {
        $query = Boardinghouse::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }


        if ($city) {
            $query->whereHas('city', function (Builder $query) use ($city) {
                $query->where('slug', $city);
            });
        }

        if ($category) {
            $query->whereHas('category', function (Builder $query) use ($category) {
                $query->where('slug', $category);
            });
        }

        return $query->get();
    }

    public function getPopularBoardingHouse($limit = 5)
    {
        return Boardinghouse::withCount('transactions')->orderBy('transactions_count', 'desc')->take($limit)->get();
    }

    public function getBoardingHouseByCitySlug($slug)
    {
        return Boardinghouse::whereHas('city', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseByCategorySlug($slug)
    {
        return Boardinghouse::whereHas('category', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseBySlug($slug)
    {
        return Boardinghouse::where('slug', $slug)->first();
    }

    public function getBoardingHouseroomByid($id)
    {
        return Room::find($id);
    }
}