<?php

use Illuminate\Database\QueryException;
use LaravelQRCode\Facades\QRCode;

/**
 * Contains test resources  
 * 
 */
class UnhlsTestController extends \BaseController {

	/**
	 * Display a listing of Tests. Factors in filter parameters
	 * The search string may match: patient_number, patient name, test type name, specimen ID or visit ID
	 *
	 * @return Response
	 */
	public function index()
	{

		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){

			$input = Session::get('TESTS_FILTER_INPUT');
			
		}else{

			$input = Input::except('_token');
		}

		$searchString = isset($input['search'])?$input['search']:'';
		$testStatusId = isset($input['test_status'])?$input['test_status']:'';
		// $testCategoryId = isset($input['test_category'])?$input['test_category']:'';
		if (isset($input['date_from'])) {
			$dateFrom = $input['date_from'];
		}else{
			$dateFrom = date('Y-m-d');
			$input['date_from'] = date('Y-m-d');
		}
		$dateTo = isset($input['date_to'])?$input['date_to']:'';

		// Search Conditions
		if($searchString||$testStatusId||$dateFrom||$dateTo){
			if ($searchString != '') {
				$dateFrom = '';
				$dateTo = '';
			}

			$tests = UnhlsTest::search($searchString, $testStatusId, $dateFrom, $dateTo);

			if (count($tests) == 0) {
				Session::flash('message', trans('messages.empty-search'));
			}
		}
		else
		{
			// List all the active tests
			$tests = UnhlsTest::orderBy('time_created', 'ASC');
		}

		// Create Test Statuses array. Include a first entry for ALL
		$statuses = array('all')+TestStatus::all()->lists('name','id');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		$test_categories = array('All')+TestCategory::all()->lists('name','id');
		foreach ($test_categories as $key => $value) {
			$test_categories[$key] = $value;
		}

		// Pagination
		$tests = $tests->paginate(Config::get('kblis.page-items'))->appends($input);

		//	Barcode
		$barcode = Barcode::first();

		// QRcode
		// $qrcode = QRCode::size(500)
  //           ->format('png');
  //           ->generate('ItSolutionStuff.com');

		// Load the view and pass it the tests
		return View::make('unhls_test.index')
					->with('testSet', $tests)
					->with('testStatus', $statuses)
					->with('barcode', $barcode)
					// ->with('selectedTestCategoryId', $test_categories)
					// ->with('selectedTestCategoryId', $testCategoryId)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
					->withInput($input);
	}

// 	public function qr_code()
// {
//    $qrCode = QRCode::text('Laravel QR Code Generator!')->png();
// }

	/**
	 * Listing of Completed tests
	 *@param
	 * @return Response
	 */
	public function completed()
	{
		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){

			$input = Session::get('TESTS_FILTER_INPUT');
			
		}else{

			$input = Input::except('_token');
		}

		$searchString = isset($input['search'])?$input['search']:'';
		$testStatusId = '4';
		if (isset($input['date_from'])) {
			$dateFrom = $input['date_from'];
		}else{
			$dateFrom = date('Y-m-d');
			$input['date_from'] = date('Y-m-d');
		}
		$dateTo = isset($input['date_to'])?$input['date_to']:'';
		$tests = UnhlsTest::CompletedTests();

				// Search Conditions
		if($searchString||$testStatusId||$dateFrom||$dateTo){

			$tests = UnhlsTest::completedTests($searchString, $testStatusId, $dateFrom, $dateTo);

			if (count($tests) == 0) {
			 	Session::flash('message', trans('messages.empty-search'));
			}
		}
		else
		{
		// List all the active tests
			$tests = UnhlsTest::orderBy('time_created', 'DESC');
		}

		// Create Test Statuses array. Include a first entry for ALL
		$statuses = array('all')+TestStatus::all()->lists('name','id');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}


		// Pagination
		$tests = $tests->paginate(Config::get('kblis.page-items'))->appends($input);

		//	Barcode
		$barcode = Barcode::first();

		return View::make('unhls_test.index')
					->with('testSet', $tests)
					->with('testStatus', $statuses)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
					->with('barcode', $barcode)
					->withInput($input);

	}


	/**
	 * Listing of pending tests
	 *@param
	 * @return Response
	 */
	public function pending()
	{
		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){

			$input = Session::get('TESTS_FILTER_INPUT');
			
		}else{

			$input = Input::except('_token');
		}

		$searchString = isset($input['search'])?$input['search']:'';
		$testStatusId = '2';
		if (isset($input['date_from'])) {
			$dateFrom = $input['date_from'];
		}else{
			$dateFrom = date('Y-m-d');
			$input['date_from'] = date('Y-m-d');
		}
		$dateTo = isset($input['date_to'])?$input['date_to']:'';

				// Search Conditions
		if($searchString||$testStatusId||$dateFrom||$dateTo){

			$tests = UnhlsTest::pendingTests($searchString, $testStatusId, $dateFrom, $dateTo);

			if (count($tests) == 0) {
			 	Session::flash('message', trans('messages.empty-search'));
			}
		}
		else
		{
		// List all the active tests
			$tests = UnhlsTest::orderBy('time_created', 'DESC');
		}

		// Create Test Statuses array. Include a first entry for ALL
		$statuses = array('all')+TestStatus::all()->lists('name','id');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		// Pagination
		$tests = $tests->paginate(Config::get('kblis.page-items'))->appends($input);

		//	Barcode
		$barcode = Barcode::first();

		return View::make('unhls_test.index')
					->with('testSet', $tests)
					->with('testStatus', $statuses)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
					->with('barcode', $barcode)
					->withInput($input);

	}


	/**
	 * Listing of started tests
	 *@param
	 * @return Response
	 */
	public function started()
	{
		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){

			$input = Session::get('TESTS_FILTER_INPUT');
			
		}else{

			$input = Input::except('_token');
		}

		$searchString = isset($input['search'])?$input['search']:'';
		$testStatusId = '3';
		if (isset($input['date_from'])) {
			$dateFrom = $input['date_from'];
		}else{
			$dateFrom = date('Y-m-d');
			$input['date_from'] = date('Y-m-d');
		}
		$dateTo = isset($input['date_to'])?$input['date_to']:'';

				// Search Conditions
		if($searchString||$testStatusId||$dateFrom||$dateTo){

			$tests = UnhlsTest::startedTests($searchString, $testStatusId, $dateFrom, $dateTo);

			if (count($tests) == 0) {
			 	Session::flash('message', trans('messages.empty-search'));
			}
		}
		else
		{
		// List all the active tests
			$tests = UnhlsTest::orderBy('time_created', 'DESC');
		}

		// Create Test Statuses array. Include a first entry for ALL
		$statuses = array('all')+TestStatus::all()->lists('name','id');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		// Pagination
		$tests = $tests->paginate(Config::get('kblis.page-items'))->appends($input);

		//	Barcode
		$barcode = Barcode::first();

		return View::make('unhls_test.index')
					->with('testSet', $tests)
					->with('testStatus', $statuses)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
					->with('barcode', $barcode)
					->withInput($input);

	}


	/**
	 * Listing of samples not yet recieved
	 *@param
	 * @return Response
	 */
	public function notRecieved()
	{
		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){

			$input = Session::get('TESTS_FILTER_INPUT');
			
		}else{

			$input = Input::except('_token');
		}

		$searchString = isset($input['search'])?$input['search']:'';
		$testStatusId = '1';
		if (isset($input['date_from'])) {
			$dateFrom = $input['date_from'];
		}else{
			$dateFrom = date('Y-m-d');
			$input['date_from'] = date('Y-m-d');
		}
		$dateTo = isset($input['date_to'])?$input['date_to']:'';

				// Search Conditions
		if($searchString||$testStatusId||$dateFrom||$dateTo){

			$tests = UnhlsTest::startedTests($searchString, $testStatusId, $dateFrom, $dateTo);

			if (count($tests) == 0) {
			 	Session::flash('message', trans('messages.empty-search'));
			}
		}
		else
		{
		// List all the active tests
			$tests = UnhlsTest::orderBy('time_created', 'DESC');
		}

		// Create Test Statuses array. Include a first entry for ALL
		$statuses = array('all')+TestStatus::all()->lists('name','id');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		// Pagination
		$tests = $tests->paginate(Config::get('kblis.page-items'))->appends($input);

		//	Barcode
		$barcode = Barcode::first();

		return View::make('unhls_test.index')
					->with('testSet', $tests)
					->with('testStatus', $statuses)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
					->with('barcode', $barcode)
					->withInput($input);

	}



	/**
	 * Listing of verified tests
	 *@param
	 * @return Response
	 */
	public function verified()
	{
		$fromRedirect = Session::pull('fromRedirect');

		if($fromRedirect){

			$input = Session::get('TESTS_FILTER_INPUT');
			
		}else{

			$input = Input::except('_token');
		}

		$searchString = isset($input['search'])?$input['search']:'';
		$testStatusId = '5';
		if (isset($input['date_from'])) {
			$dateFrom = $input['date_from'];
		}else{
			$dateFrom = date('Y-m-d');
			$input['date_from'] = date('Y-m-d');
		}
		$dateTo = isset($input['date_to'])?$input['date_to']:'';

				// Search Conditions
		if($searchString||$testStatusId||$dateFrom||$dateTo){

			$tests = UnhlsTest::verified($searchString, $testStatusId, $dateFrom, $dateTo);

			if (count($tests) == 0) {
			 	Session::flash('message', trans('messages.empty-search'));
			}
		}
		else
		{
		// List all the active tests
			$tests = UnhlsTest::orderBy('time_created', 'DESC');
		}

		// Create Test Statuses array. Include a first entry for ALL
		$statuses = array('all')+TestStatus::all()->lists('name','id');

		foreach ($statuses as $key => $value) {
			$statuses[$key] = trans("messages.$value");
		}

		// Pagination
		$tests = $tests->paginate(Config::get('kblis.page-items'))->appends($input);

		//	Barcode
		$barcode = Barcode::first();

		return View::make('unhls_test.index')
					->with('testSet', $tests)
					->with('testStatus', $statuses)
					->with('barcode', $barcode)
					->with('dateFrom', $dateFrom)
					->with('dateTo', $dateTo)
					->withInput($input);

	}



	/**
	 * Recieve a Test from an external system
	 *
	 * @param
	 * @return Response
	 */
	public function receive($id)
	{
		$test = UnhlsTest::find($id);
		$test->test_status_id = UnhlsTest::PENDING;
		$test->time_created = date('Y-m-d H:i:s');
		$test->created_by = Auth::user()->id;
		$test->save();

		return $id;
	}

	/**
	 *Select all tests under a selected test Category - Test Menu
	 *
	 * @return Response
	 */
	public function testList()
	{
		$testCategoryId =Input::get('test_category_id');
		$specimenTypeId =Input::get('specimen_type_id');

		$specimenType = SpecimenType::find($specimenTypeId);
		$testTypes = $specimenType->testTypes;

		return View::make('unhls_test.testTypeList')
			->with('testCategoryId', $testCategoryId)
			->with('testTypes', $testTypes);
	}

	/**
	 * Display a form for creating a new Test.
	 *
	 * @return Response
	 */
	public function create($patientID = 0)
	{
		if ($patientID == 0) {
			$patientID = Input::get('patient_id');
		}

		//Create a Lab categories Array
		$categories = ['Select Lab Section']+TestCategory::lists('name', 'id');
		$wards = ['Select Sample Origin']+Ward::lists('name', 'id');
		$clinicians = ['Select clinician']+Clinician::where('active', '=', 0)->lists('name', 'id');
		$facilities = ['Select facility']+Facility::where('active', '=', 1)->lists('name', 'id');

		// sample collection default details
		$now = new DateTime();
		$collectionDate = $now->format('Y-m-d H:i');
		$receptionDate = $now->format('Y-m-d H:i');

		$fromRedirect = Session::pull('TEST_CATEGORY');

		if($fromRedirect){
			$input = Session::get('TEST_CATEGORY');
		}else{
			$input = Input::except('_token');
		}

		$specimenTypes = ['select Specimen Type']+SpecimenType::lists('name', 'id');

		$patient = UnhlsPatient::find($patientID);

		//Load Test Create View
		return View::make('unhls_test.create')
					->with('collectionDate', $collectionDate)
					->with('receptionDate', $receptionDate)
					->with('specimenType', $specimenTypes)
					->with('patient', $patient)
					->with('testCategory', $categories)
					->with('ward', $wards)
					->with('facilities', $facilities)
					->with('clinicians',$clinicians);
	}

	/**
	 * Save a new Test.
	 *
	 * @return Response
	 */
	public function saveNewTest()
	{
		//Create New Test
		$rules = array(
			'visit_type' => 'required',
			'testtypes' => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::route('unhls_test.create', 
				array(Input::get('patient_id')))->withInput()->withErrors($validator);
		} else {

			$visitType = ['Out-patient','In-patient', 'Referral'];
			$activeTest = array();

			/*
			 * - Create a visit
			 * - Fields required: visit_type, patient_id
			 */
			$visit = new UnhlsVisit;
			$visit->patient_id = Input::get('patient_id');
			$visit->visit_type = $visitType[Input::get('visit_type')];
			$visit->ward_id = Input::get('ward_id');
			$visit->urgency = Input::get('urgency');
			$visit->bed_no = Input::get('bed_no');
			$visit->facility_id = Input::get('facility');
			$visit->facility_lab_number = Input::get('facility_lab_number');
			$visit->hospitalized = Input::get('hospitalized');
			$visit->on_antibiotics = Input::get('on_antibiotics');
			$visit->save();

			$therapy = new Therapy;
			$therapy->patient_id = Input::get('patient_id');
			$therapy->visit_id = $visit->id;
			$therapy->previous_therapy = Input::get('previous_therapy');
			$therapy->current_therapy = Input::get('current_therapy');
			$therapy->save();

			/*
			 * - Create tests requested
			 * - Fields required: visit_id, test_type_id, specimen_id, test_status_id, created_by, requested_by
			 */
            $testLists = Input::get('test_list');
            if(is_array($testLists)){
                foreach ($testLists as $testList) {
                    // Create Specimen - specimen_type_id, accepted_by, referred_from, referred_to
                    $specimen = new UnhlsSpecimen;
                    $specimen->specimen_type_id = $testList['specimen_type_id'];
                    $specimen->accepted_by = Auth::user()->id;
                    $specimen->time_collected = Input::get('collection_date');
                    $specimen->time_accepted = Input::get('reception_date');
                    $specimen->save();
                    foreach ($testList['test_type_id'] as $id) {
                        $testTypeID = (int)$id;

                        $test = new UnhlsTest;
                        $test->visit_id = $visit->id;
                        $test->urgency_id = $visit->urgency;
                        $test->test_type_id = $testTypeID;
                        $test->specimen_id = $specimen->id;
                        $test->test_status_id = UnhlsTest::PENDING;
                        $test->created_by = Auth::user()->id;
                        $test->clinician_id = Input::get('clinician');
                        $test->requested_by = Input::get('intern');
                        $test->purpose = Input::get('hiv_purpose');
                        $test->save();

                        $activeTest[] = $test->id;
                    }
                }
            }

			$url = Session::get('SOURCE_URL');
			
			return Redirect::to($url)->with('message', 'messages.success-creating-test')
					->with('activeTest', $activeTest);
		}
	}



	public function getClinician($id){
		$clinician = Clinician::find($id);
		return $clinician;
	}

	/**
	 * Display Collect page 
	 *
	 * @param
	 * @return
	 */
	public function collectSpecimen($specimenID)
	{
		$specimen = UnhlsSpecimen::find($specimenID);
		return View::make('unhls_test.collect')->with('specimen', $specimen);
	}

    /**
     * Display accept specimen page
     *
     * @param
     * @return
     */
    public function acceptSpecimen()
    {
		$specimen = UnhlsSpecimen::find(Input::get('id'));
		$specimenTypes = SpecimenType::all();
		return View::make('unhls_test.acceptSpecimen')
			->with('specimen', $specimen)
			->with('specimenTypes', $specimenTypes);
    }

	/**
	 * Display Rejection page 
	 *
	 * @param
	 * @return
	 */
	public function reject($testID)
	{
		$test = UnhlsTest::find($testID);
		$rejectionReason = RejectionReason::all();
		return View::make('unhls_test.reject')->with('test', $test)
						->with('rejectionReason', $rejectionReason);
	}

		// Reject Report Function
	public function rejectionReport($id, $visit = null, $testId = null)
	{				
		$tests = UnhlsTest::where('visit_id', '=', $visit?$visit:$visitId);
		$tests = UnhlsTest::where('id', '=', $testId)->get();
		$patient = UnhlsPatient::find($id);
		
		$template = "reports.patient.rejectionReport";

		$html = View::make($template)
			->with('patient', $patient)
			->with('tests', $tests)
			->with('visit', $visit)
			->withInput(Input::all());

      	$test_request_information  = array(
			'tests' => $tests, 
			'patient'=> $patient
			);
      	//dd($test_request_information);

        $pdf = new RejectionReportPdf;
        $pdf->setTestRequestInformation($test_request_information);

        $pdf->SetAutoPageBreak(TRUE, 15);
        $pdf->AddPage();
        $pdf->SetFont('', '', 10);
        $pdf->writeHTML($html, true, false, true, false, '');
        return $pdf->output('report.pdf');
    }

	/**
	 * Display Referral page 
	 *
	 * @param
	 * @return
	 */
	public function refer($specimenID)
	{
		$specimen = UnhlsSpecimen::find($specimenID);
		$referralReason = ReferralReason::all();
		$test = UnhlsTest::find($specimenID);
		return View::make('unhls_test.refer')->with('specimen', $specimen)->with('test', $test)
						->with('referralReason', $referralReason);
	}

	/**
	 * Executes Rejection
	 *
	 * @param
	 * @return
	 */
	// todo: create a functions for pre-analytic rejection
	public function rejectAction()
	{
		//Reject justifying why.
		$rules = array(
			'rejectionReason' => 'required|non_zero_key',
			'reject_explained_to' => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('unhls_test.reject', array(Input::get('test_id')))
				->withInput()
				->withErrors($validator);
		} else {
			$test = UnhlsTest::find(Input::get('test_id'));
			// this refers to analytic rejection of specimen
			$test->test_status_id = UnhlsTest::REJECTED;
			$test->save();
			// todo: create cascade deletion for it, incase rejection is reversed
			$rejection = new AnalyticSpecimenRejection;
			//$rejection->rejection_reason_id = Input::get('rejectionReason');
			$rejection->test_id = Input::get('test_id');
			$rejection->specimen_id = Input::get('specimen_id');
			$rejection->rejected_by = Auth::user()->id;
			$rejection->time_rejected = date('Y-m-d H:i:s');
			$rejection->reject_explained_to = Input::get('reject_explained_to');
			$rejection->save();

			/**
			 * Create rejection reasons
			 */
			$reasons = Input::get('rejectionReason');
			if(is_array($reasons)){
				foreach ($reasons as $id => $value) {
					$reason =new AnalyticSpecimenRejectionReason;

					$reason->rejection_id = $rejection->id;
					$reason->specimen_id = Input::get('specimen_id');
					$reason->reason_id = $value;
					$reason->save();
				}
			}
			$url = Session::get('SOURCE_URL');
			
			return Redirect::to($url)->with('message', 'messages.success-rejecting-specimen')
						->with('activeTest', array($test->id));
		}
	}

	/**
	 * Accept a Test's Specimen
	 *
	 * @param
	 * @return
	 */
	public function acceptSpecimenAction()
	{
		$specimen = UnhlsSpecimen::find(Input::get('specimen_id'));
		$specimen->specimen_status_id = UnhlsSpecimen::ACCEPTED;
		$specimen->specimen_type_id = Input::get('specimen_type_id');
		$specimen->accepted_by = Auth::user()->id;
		$specimen->time_accepted = date('Y-m-d H:i:s');
		$specimen->save();

		return Redirect::route('unhls_test.index')
			->with('message', 'You have successfully captured specimen collection details');
	}


	/**
	 * Display Change specimenType form fragment to be loaded in a modal via AJAX
	 *
	 * @param
	 * @return
	 */
	public function changeSpecimenType()
	{
		$test = UnhlsTest::find(Input::get('id'));
		return View::make('unhls_test.changeSpecimenType')->with('test', $test);
	}

	/**
	 * Update a Test's SpecimenType
	 *
	 * @param
	 * @return
	 */
	public function updateSpecimenType()
	{
		$specimen = UnhlsSpecimen::find(Input::get('specimen_id'));
		$specimen->specimen_type_id = Input::get('specimen_type');
		$specimen->save();

		return Redirect::route('unhls_test.viewDetails', array($specimen->test->id));
	}

	/**
	 * Starts Test
	 *
	 * @param
	 * @return
	 */
	public function start()
	{
		$test = UnhlsTest::find(Input::get('id'));
		$test->tested_by = Auth::user()->id;
		$test->test_status_id = UnhlsTest::STARTED;
		$test->time_started = date('Y-m-d H:i:s');
		$test->save();
		return $test->test_status_id;
	}

	/**
	 * Display Result Entry page
	 *
	 * @param
	 * @return
	 */
	public function enterResults($testID)
	{	
		$equipment_list = array_merge_maintain_keys(array('' => 'Select one'),getEquipmentAndUniqueNumber());
		$test = UnhlsTest::find($testID);
		// if the test being carried out requires a culture worksheet
		if ($test->testType->isCulture()) {
			return Redirect::route('culture.edit', [$test->id]);
		}elseif ($test->testType->isGramStain()) {
			return Redirect::route('gramstain.edit', [$test->id]);
		}else{
			return View::make('unhls_test.enterResults')->with('equipment_list', $equipment_list)
			->with('test', $test);
		}
	}

	/**
	 * Returns test result intepretation
	 * @param
	 * @return
	 */
	public function getResultInterpretation()
	{
		$result = array();
		//save if it is available
		
		if (Input::get('age')) {
			$result['birthdate'] = Input::get('age');
			$result['gender'] = Input::get('gender');
		}
		$result['measureid'] = Input::get('measureid');
		$result['measurevalue'] = Input::get('measurevalue');

		$measure = new Measure;
		return $measure->getResultInterpretation($result);
	}

	/**
	 * Saves Test Results
	 *
	 * @param $testID to save
	 * @return view
	 */
	public function saveResults($testID)
	{
		$test = UnhlsTest::find($testID);
		$test->test_status_id = UnhlsTest::COMPLETED;
		$test->tested_by = Auth::user()->id;
		$test->time_completed = date('Y-m-d H:i:s');

		if ($test->testType->name == 'Gram Staining') {
			$results = '';
			foreach ($test->gramStainResults as $gramStainResult) {
				$results = $results.$gramStainResult->gramStainRange->name.',';
			}
		}
		
		foreach ($test->testType->measures as $measure) {
			$testResult = UnhlsTestResult::updateOrCreate(array('test_id' => $testID, 'measure_id' => $measure->id));
			if ($test->testType->name == 'Gram Staining') {

				$testResult->result = $results;
				$inputName = "m_".$measure->id;
			}else{
				$testResult->result = Input::get('m_'.$measure->id);
				$inputName = "m_".$measure->id;
			}
			$rules = array("$inputName" => 'max:255');

			$validator = Validator::make(Input::all(), $rules);

			if ($validator->fails()) {
				return Redirect::back()->withErrors($validator)->withInput(Input::all());
			} else {
				$testResult->save();
			}
		}
		if ($test->isHIV()) {
			$test->interpretation = $test->interpreteHIVResults();
		}else{
			$test->interpretation = Input::get('interpretation');
		}
		$test->save();

		//Fire of entry saved/edited event
		Event::fire('test.saved', array($testID));

		$input = Session::get('TESTS_FILTER_INPUT');
		Session::put('fromRedirect', 'true');

		// Get page
		$url = Session::get('SOURCE_URL');
		$urlParts = explode('&', $url);
		if(isset($urlParts['page'])){
			$pageParts = explode('=', $urlParts['page']);
			$input['page'] = $pageParts[1];
		}

		// redirect
		return Redirect::to($url)
					->with('message', trans('messages.success-saving-results'))
					->with('activeTest', array($test->id))
					->withInput($input);
	}

	//Save reviewed test result
	public function saveRevisedResults($testID)
	{
		$test = UnhlsTest::find($testID);
		$test->test_status_id = UnhlsTest::COMPLETED;
		$test->revised_by = Auth::user()->id;
		$test->time_revised = date('Y-m-d H:i:s');

		if ($test->testType->name == 'Gram Staining') {
			$results = '';
			foreach ($test->gramStainResults as $gramStainResult) {
				$results = $results.$gramStainResult->gramStainRange->name.',';
			}
		}
		
		foreach ($test->testType->measures as $measure) {
			$testResult = UnhlsTestResult::updateOrCreate(array('test_id' => $testID, 'measure_id' => $measure->id));
			if ($test->testType->name == 'Gram Staining') {

				$testResult->result = $results;
				$inputName = "m_".$measure->id;
			}else{
				$testResult->revised_result = Input::get('m_'.$measure->id);
				$inputName = "m_".$measure->id;
			}
			$rules = array("$inputName" => 'max:255');

			$validator = Validator::make(Input::all(), $rules);

			if ($validator->fails()) {
				return Redirect::back()->withErrors($validator)->withInput(Input::all());
			} else {
				$testResult->save();
			}
		}
		if ($test->isHIV()) {
			$test->interpretation = $test->interpreteHIVResults();
		}else{
			$test->interpretation = Input::get('interpretation');
		}
		$test->save();

		//Fire of entry saved/edited event
		Event::fire('test.saved', array($testID));

		$input = Session::get('TESTS_FILTER_INPUT');
		Session::put('fromRedirect', 'true');

		// Get page
		$url = Session::get('SOURCE_URL');
		$urlParts = explode('&', $url);
		if(isset($urlParts['page'])){
			$pageParts = explode('=', $urlParts['page']);
			$input['page'] = $pageParts[1];
		}

		// redirect
		return Redirect::to($url)
					->with('message', trans('messages.success-saving-results'))
					->with('activeTest', array($test->id))
					->withInput($input);
	}

	/**
	 * Display Edit page
	 *
	 * @param
	 * @return
	 */
	// todo: move editing results to a different controller and here leave editing particular test request?
	public function edit($testID)
	{
		$test = UnhlsTest::find($testID);
		// if the test being carried out requires a culture worksheet
		if ($test->testType->name == 'Culture and Sensitivity') {
			return Redirect::route('culture.edit', [$test->id]);
		}elseif ($test->testType->name == 'Gram Staining') {
			return Redirect::route('gramstain.edit', [$test->id]);
		}else{
			return View::make('unhls_test.edit')->with('test', $test);
		}
	}

	/**
	 * Display Test Details
	 *
	 * @param
	 * @return
	 */
	public function viewDetails($testID)
	{
		$rejectionReason = RejectionReason::all();
		$rejection = AnalyticSpecimenRejection::all();
		$reason = AnalyticSpecimenRejectionReason::all();
		$barcode = Barcode::first();

		return View::make('unhls_test.viewDetails')->with('test', UnhlsTest::find($testID))
													->with('rejectionReason', $rejectionReason)
													->with('rejection', $rejection)
													->with('barcode', $barcode)
													->with('reason', $reason);
		
	} 

	/**
	 * Verify Test
	 *
	 * @param
	 * @return
	 */
	public function verify($testID)
	{
		$test = UnhlsTest::find($testID);
		$test->test_status_id = UnhlsTest::VERIFIED;
		$test->time_verified = date('Y-m-d H:i:s');
		$test->verified_by = Auth::user()->id;
		$test->save();

		//Fire of entry verified event
		Event::fire('test.verified', array($testID));

		return View::make('unhls_test.viewDetails')->with('test', $test);
	}

	/**
	 * Approve Test
	 *
	 * @param
	 * @return
	 */
	public function approve($testID)
	{
		$test = UnhlsTest::find($testID);
		$test->test_status_id = UnhlsTest::APPROVED;
		$test->time_approved = date('Y-m-d H:i:s');
		$test->approved_by = Auth::user()->id;
		$test->save();

		//Fire of entry approved event
		Event::fire('test.approved', array($testID));

		return View::make('unhls_test.viewDetails')->with('test', $test);
	}

	public function getTestVisit($id){
		

		$tests = UnhlsTest::searchByVisit( $id);

		if (count($tests) == 0) {
				Session::flash('message', trans('messages.empty-search'));
		}
		
		// Pagination
		$tests = $tests->paginate(Config::get('kblis.page-items'));
		$visit = UnhlsVisit::find($id);

		//	Barcode
		$barcode = Barcode::first();

		// Load the view and pass it the tests
		return View::make('unhls_test.list_tests_in_visit')
					->with('testSet', $tests)
					->with('visit',$visit)
					->with('barcode', $barcode);

	}

	/**
	 * Refer the test
	 *
	 * @param specimenId
	 * @return View
	 */
	public function showRefer($testid)
	{
		$test = UnhlsTest::find($testid);
		
		$facilities = Facility::all();
		//Referral facilities
		$referralReason = ReferralReason::all();
		return View::make('unhls_test.refer')
			
			->with('test',$test)
			->with('facilities', $facilities)
			->with('referralReason', $referralReason);

	}

	/**
	 * Refer action
	 *
	 * @return View
	 */
	public function refer_action()
	{
		//Validate
		$rules = array(
			//'referral-status' => 'required',
			'facility_id' => 'required|non_zero_key',
			'person',
			'contacts'
			);
		$validator = Validator::make(Input::all(), $rules);
		$specimenId = Input::get('specimen_id');

		if ($validator->fails())
		{
			return Redirect::route('unhls_test.refer', array($specimenId))-> withInput()->withErrors($validator);
		}

		//Insert into referral table
		$referral = new Referral();
		$referral->test_id = Input::get('test_id');
		$referral->status = Referral::REFERRED_OUT;
		$referral->sample_obtainer = Input::get('sample-obtainer');
		$referral->cadre_obtainer = Input::get('cadre-obtainer');
		$referral->sample_date = Input::get('sample-date');
		$referral->sample_time = Input::get('sample-time');
		$referral->time_dispatch = Input::get('time-dispatch');
		$referral->storage_condition = Input::get('storage-condition');
		$referral->transport_type = Input::get('transport-type');
		$referral->referral_reason = Input::get('referral-reason');
		$referral->priority_specimen = Input::get('priority-specimen');
		$referral->facility_id = Input::get('facility_id');
		$referral->person = Input::get('person');
		$referral->contacts = Input::get('contacts');
		$referral->user_id = Auth::user()->id;

		//Update specimen referral status
		$specimen = UnhlsSpecimen::find($specimenId);

		DB::transaction(function() use ($referral, $specimen) {

		
			$referral->save();
			$specimen->referral_id = $referral->id;
			$specimen->save();
			
		});

		//Start test
		Input::merge(array('id' => Input::get('test_id'))); //Add the testID to the Input
		$this->start();
       
		//Return view
		$url = Session::get('SOURCE_URL');

		
		return Redirect::to($url)->with('message', trans('messages.specimen-successful-refer'))
					->with('activeTest', array(Input::get('test_id')));
	}

	/**
	 *
	 * @param
	 * @return
	 */
	public function delete($id)
	{
		// if no results saved, the permitted can delete - [clinician/technologist]
		$test = UnhlsTest::find($id);

		$testInUse = UnhlsTestResult::where('test_id', '=', $id)->first();
		if (empty($testInUse)) {
			// The test is not in use
			$test->delete();
		} else {
			// The test is in use
			return Redirect::route('visit.show', [$test->visit_id])
				->with('message', 'Test can NOT be Deleted (has results)!');
		}
		// redirect
		return Redirect::route('visit.show', [$test->visit_id])
			->with('message', 'Test Successfully Deleted!');
	}
}