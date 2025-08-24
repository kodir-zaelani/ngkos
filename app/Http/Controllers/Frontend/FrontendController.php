<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CityRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\BoardingHouseRepositoryInterface;

class FrontendController extends Controller
{
    private CityRepositoryInterface $cityReposiroty;
    private CategoryRepositoryInterface $categoryReposiroty;
    private BoardingHouseRepositoryInterface $boardinghouseRepository;

    public function __construct( CityRepositoryInterface $cityReposiroty, CategoryRepositoryInterface $categoryReposiroty, BoardingHouseRepositoryInterface $boardinghouseRepository)
    {
        $this->cityReposiroty          = $cityReposiroty;
        $this->categoryReposiroty      = $categoryReposiroty;
        $this->boardinghouseRepository = $boardinghouseRepository;
    }

    public function index()
    {
        $categories = $this->categoryReposiroty->getAllCategories();
        $cities = $this->cityReposiroty->getAllCities();
        $popularBoardingHouse = $this->boardinghouseRepository->getPopularBoardingHouse();
        $allBoardingHouse = $this->boardinghouseRepository->getAllBoardingHouses();
        return view('pages.home.index',[
            'cities'               => $cities,
            'categories'           => $categories,
            'popularBoardingHouse' => $popularBoardingHouse,
            'allBoardingHouse'     => $allBoardingHouse,
        ]);
    }

    public function checkBooking()
    {
        return view('pages.booking.index');
    }

    public function findKos()
    {
        $categories = $this->categoryReposiroty->getAllCategories();
        $cities = $this->cityReposiroty->getAllCities();
        return view('pages.boardinghouse.index',[
            'cities'               => $cities,
            'categories'           => $categories,
        ]);
    }

    public function findResult(Request $request)
    {
        // dd($request->category);
        $boardinghouse = $this->boardinghouseRepository->getAllBoardingHouses($request->search, $request->city, $request->category);
        // dd($boardinghouse);
        return view('pages.boardinghouse.result',[
            'search' => $request->search,
            'city' => $request->city,
            'category' => $request->category,
            'boardinghouse' => $boardinghouse,
        ]);
    }

    public function categoryKos($slug)
    {
        $boardinghouse = $this->boardinghouseRepository->getBoardingHouseByCategorySlug($slug);
        return view('pages.category.index',[
            'boardinghouse'           => $boardinghouse,
        ]);
    }

    public function cityKos($slug)
    {
        $boardinghouse = $this->boardinghouseRepository->getBoardingHouseByCitySlug($slug);
        return view('pages.city.index',[
            'boardinghouse'           => $boardinghouse,
        ]);
    }
    public function detailKos($slug)
    {
        $boardinghouse = $this->boardinghouseRepository->getBoardingHouseBySlug($slug);
        return view('pages.boardinghouse.detail',[
            'boardinghouse'           => $boardinghouse,
        ]);
    }

    public function rooms($slug)
    {
        $boardinghouse = $this->boardinghouseRepository->getBoardingHouseBySlug($slug);

        return view('pages.room.index',[
            'boardinghouse'           => $boardinghouse,
        ]);
    }


}