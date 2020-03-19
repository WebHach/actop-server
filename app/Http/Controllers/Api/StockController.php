<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\StockRepository;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StockController extends Controller
{
    /**
     * @var StockRepository 
     */
    private $stockRepository;

    public function __construct(StockRepository $repository)
    {
        $this->stockRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Stock::with('company')->select(Stock::FIELD_SELECT)->orderBy('updated_at', 'desc')->get()->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param Stock $stock
     * @return string
     */
    public function show(Stock $stock)
    {
        return $stock->load('company')->toJson();
    }

    public function getStockCurrent()
    {
        return $this->stockRepository->stockCurrentDay()->paginate()->toJson();
    }
}
