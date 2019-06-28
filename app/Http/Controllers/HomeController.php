<?php

namespace App\Http\Controllers;
use App\Printer;
use App\Cegek;
use App\RepairCounter;
use App\Parts;
use App\Charts\PieChart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cegid = Cegek::where('cegnev', 'LIKE', 'Master Partner Kft.')->first()->id;
        $sajat = Printer::where('ceg_id', '=', $cegid)->count();
        $kihelyezett = Printer::where('ceg_id', '!=', $cegid)->count();
        $javitasok = RepairCounter::all()->count();
        $alkatresz = Parts::all()->count();


        $chart = new PieChart;
        $chart->height(300);
        $chart->labels(['Benti', 'Kihelyezett']);
        $chart->dataset('', 'pie', [$sajat, $kihelyezett])->options([
            'backgroundColor' => [
                '#063c59',
                '#3c97d3',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            
        ]);
       
       
        return view('home',compact('chart','javitasok','alkatresz'));
    }
}
