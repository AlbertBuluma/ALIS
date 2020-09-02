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
		
		$facilities = DB::table('unhls_facilities')->select('id', 'name')->where('district_id', $id)->get(); 

    public static function fetchAllTableIDs()
    {
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
