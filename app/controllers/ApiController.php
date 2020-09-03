<?php

class ApiController extends \BaseController {

	/**
	 * Display a listing of the facilities by district.
	 *
	 * @return Response
	 */
    public function facility()
    {
        $id = Input::get('districtId');

//		$facilities = DB::table('unhls_facilities')->select('id', 'name')->where('district_id', $id)->get();
//		$facilities = DB::table('unhls_facilities')->select('*')->where('district_id', 1)->get();
//        $facilities['facility_id'] = Config::get('constants.WAREHOUSE_FACILITY_ID');
//        $patients = UnhlsTest::where('time_created', '<', '2019-01-01')
//            ->get();
//        dd($patients);
        $patients = DB::table('unhls_patients')->limit(5)->get();

//        $tab = $data = [];
//        $tables = DB::select('show tables');
//        foreach($tables as $table){
//            $tab[] = $table->Tables_in_alis;
//        }
//        foreach ($tab as $tab_data){
//            $data[$tab_data] = DB::table($tab_data)->limit(5)->get();


//            $data[$tab_data] = DB::table($tab_data)
//                                ->select('id')
//                                ->orderBy('id', 'desc')
//                                ->pluck('id');

//            $data[$tab_data] = DB::table($tab_data)
//                                ->where('created_at', '<', '2019-11-01')
//                                ->get();
//        }

        return Response::json($patients);
    }

    /**
     * Fetch IDs of latest record from all tables.
     *
     * @return Response
     */
    public static function fetchAllTableIDs()
    {
        //TODO Add id column for migrations, instrument_types and tokens tables
        $table_names = $data = [];
        $tables = DB::select('show tables');
        foreach($tables as $table){
            $table_names[] = $table->Tables_in_alis;
        }
        foreach ($table_names as $tab_name){
            $data[$tab_name] = DB::table($tab_name)
                                ->select('id')
                                ->orderBy('id', 'desc')
                                ->pluck('id');
        }

        return Response::json($data);
    }

    // Receive IDs of all warehouse tables
    public function warehouseIds()
    {
        dd(\Illuminate\Support\Facades\Input::all());
//        $data = \Illuminate\Support\Facades\Input::get('wards');
//        return Response::json($data, 200);

    }

    /**
     * Fetch latest 10 records from table.
     *
     * @return Response
     */
    public static function fetchTableRecords($table)
    {
        $records = DB::table($table)->paginate(10);
        return Response::json($records);
    }


    /**
     * Display a listing of the fetch Isolated Organisms.
     *
     * @return Response
     */
    public static function fetchIsolatedOrganisms()
    {

        $results = DB::table('isolated_organisms')
            ->leftJoin('drug_susceptibility', function ($join){
                $join->on('isolated_organisms.id', '=', 'drug_susceptibility.isolated_organism_id');
            })
            ->leftJoin('organisms', function($join){
                $join->on('isolated_organisms.organism_id', '=', 'organisms.id');
            })
            ->leftJoin('drug_susceptibility_measures', function($join){
                $join->on('drug_susceptibility.drug_susceptibility_measure_id', '=', 'drug_susceptibility_measures.id');
            })
            ->leftJoin('drugs', function($join){
                $join->on('drug_susceptibility.drug_id', '=', 'drugs.id');
            })
            ->where('isolated_organisms.organism_id', '!=', 'NULL')
            ->select('isolated_organisms.test_id', 'isolated_organisms.organism_id', 'organisms.name',
                'drug_susceptibility.zone_diameter', 'drugs.name', 'drugs.description',
                'drug_susceptibility_measures.symbol', 'drug_susceptibility_measures.interpretation')
            ->get();

        return Response::json($results, 200);
    }


    /**
     * Display a listing of the UNHLS Test Results.
     *
     * @return Response
     */
    public static function fetchUnhlsResults()
    {

        $results = DB::table('unhls_test_results')
                    ->leftJoin('measures', function($join){
                        $join->on('unhls_test_results.measure_id', '=', 'measures.id');
                    })
                    ->leftjoin('measure_types', function($join){
                        $join->on('measures.measure_type_id', '=', 'measure_types.id');
                    })
                    ->select('unhls_test_results.id', 'unhls_test_results.measure_id', 'unhls_test_results.result', 'measures.name', 'measure_types.name')
                    ->get();

        //TODO measure_types.name to select column results

        return Response::json($results, 200);
    }


    /**
     * Display a listing of the Specimen Rejection warehouse data.
     *
     * @return Response
     */
    public static function specimenRejections()
    {

        $results = DB::table('analytic_specimen_rejections')
                    ->leftJoin('analytic_specimen_rejection_reasons', function ($join){
                        $join->on('analytic_specimen_rejections.rejection_reason_id', '=', 'analytic_specimen_rejection_reasons.rejection_id');
                    })
                    ->leftJoin('rejection_reasons', function($join){
                        $join->on('rejection_reasons.id', '=', 'analytic_specimen_rejections.rejection_reason_id');
                    })
                    ->select('analytic_specimen_rejections.test_id', 'analytic_specimen_rejection_reasons.specimen_id',
                            'analytic_specimen_rejection_reasons.rejection_id', 'analytic_specimen_rejection_reasons.reason_id',
                            'rejection_reasons.reason')
                    ->get();

        return Response::json($results, 200);
    }


    public static function measureRanges()
    {
        $results = DB::table('measure_ranges')
                        ->select('measure_id', 'alphanumeric', 'interpretation')
                        ->get();

        return Response::json($results, 200);

    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}

function dd()
{
    array_map(function($x) { var_dump($x); }, func_get_args());
    die;
}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
