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


    public static function unhlsPatients()
    {

    }

    /**
     * Display a listing of the fetch Isolated Organisms.
     *
     * @return Response
     */
    public static function fetchIsolatedOrganisms()
    {

        $results = DB::table('isolated_organisms AS io')
            ->leftJoin('drug_susceptibility AS ds', function ($join){
                $join->on('io.id', '=', 'ds.isolated_organism_id');
            })
            ->leftJoin('organisms AS og', function($join){
                $join->on('io.organism_id', '=', 'og.id');
            })
            ->leftJoin('drug_susceptibility_measures AS dsm', function($join){
                $join->on('ds.drug_susceptibility_measure_id', '=', 'dsm.id');
            })
            ->leftJoin('drugs AS dg', function($join){
                $join->on('ds.drug_id', '=', 'dg.id');
            })
            ->where('io.organism_id', '!=', 'NULL')
            ->select('io.id AS isolatedOrganismsId',  'io.user_id AS isolatedOrganismsUserId', 'io.test_id AS isolatedOrganismsTestId',
                'io.organism_id AS isolatedOrganismsOrganismId', 'io.created_at AS isolatedOrganismsCreatedAt',
                'io.updated_at AS isolatedOrganismsUpdatedAt',
                'og.id AS organismsId', 'og.name AS organismsName', 'og.description AS organismsDescription',
                'og.deleted_at AS organismsDeletedAt', 'og.created_at AS organismsCreatedAt', 'og.updated_at AS organismsUpdatedAt',
                'ds.id AS drugSusceptibilityId', 'ds.user_id AS drugSusceptibilityUserId', 'ds.drug_id AS drugSusceptibilityDrugId',
                'ds.isolated_organism_id AS drugSusceptibilityIsolatedOrganismId', 'ds.drug_susceptibility_measure_id AS drugSusceptibilityDrugSusceptibilityMeasureId',
                'ds.zone_diameter AS zoneDiameter', 'ds.deleted_at AS drugSusceptibilityDeletedAt', 'ds.created_at AS drugSusceptibilityCreatedAt',
                'ds.updated_at AS drugSusceptibilityUpdatedAt',
                'dsm.id AS drugSusceptibilityMeasuresId', 'dsm.symbol AS symbol', 'dsm.interpretation AS interpretation',
                'dg.id AS drugsId', 'dg.name AS drugsName', 'dg.description AS drugsDescription',
                'dg.deleted_at AS drugsDeletedAt', 'dg.created_at AS drugsCreatedAt', 'dg.updated_at AS drugsUpdatedAt'
            )
            ->paginate(10);

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
                    ->select('unhls_test_results.id AS unhlsTestResultsId', 'unhls_test_results.test_id AS unhlsTestResultsTestId',
                        'unhls_test_results.measure_id AS unhlsTestResultsMeasureId', 'unhls_test_results.result AS unhlsTestResultsResult',
                        'unhls_test_results.time_entered AS timeEntered', 'unhls_test_results.sample_id AS sampleId', 'unhls_test_results.revised_result AS revisedResult',
                        'unhls_test_results.revised_by AS revisedBy', 'unhls_test_results.revised_by2 AS revisedBy2', 'unhls_test_results.time_revised AS timeRevised',
                        'measures.id AS measuresId' ,'measures.measure_type_id AS measuresMeasureTypeId', 'measures.name AS measuresName',
                        'measures.unit AS unit', 'measures.description AS measuresDescription', 'measures.created_at AS measuresCreatedAt',
                        'measures.updated_at AS measuresUpdatedAt', 'measures.deleted_at AS measuresDeletedAt',
                        'measure_types.id AS measureTypesId', 'measure_types.name AS measureTypesName', 'measure_types.deleted_at AS measureTypesDeletedAt',
                        'measure_types.created_at AS measureTypesCreatedAt', 'measure_types.updated_at AS measureTypesUpdatedAt')
                    ->paginate(10);

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

        $results = DB::table('analytic_specimen_rejections AS asr')
                    ->leftJoin('analytic_specimen_rejection_reasons AS asrr', function ($join){
                        $join->on('asr.rejection_reason_id', '=', 'asrr.rejection_id');
                    })
                    ->leftJoin('rejection_reasons AS rr', function($join){
                        $join->on('rr.id', '=', 'asr.rejection_reason_id');
                    })
                    ->select('asr.id AS idspecimenrejection',
                        'asr.test_id AS analyticSpecimenRejectionsTestId',
                        'asr.specimen_id AS analyticSpecimenRejectionsSpecimenId',
                        'asr.rejected_by AS analyticSpecimenRejectionsRejectedBy',
                        'asr.rejection_reason_id AS analyticSpecimenRejectionsRejectionReasonId',
                        'asr.reject_explained_to AS analyticSpecimenRejectionsRejectExplainedTo',
                        'asr.time_rejected AS analyticSpecimenRejectionsTimeRejected',
                        'asrr.rejection_id AS analyticSpecimenRejectionReasonsId',
                        'asrr.specimen_id AS analyticSpecimenRejectionReasonsSpecimenId',
                        'asrr.rejection_id AS analyticSpecimenRejectionReasonsRejectionId',
                        'asrr.reason_id AS analyticSpecimenRejectionReasonsReasonId',
                        'asrr.created_at AS analyticSpecimenRejectionReasonsCreatedAt',
                        'asrr.updated_at AS analyticSpecimenRejectionReasonsUpdatedAt',
                        'asrr.deleted_at AS analyticSpecimenRejectionReasonsDeletedAt',
                        'rr.id AS idrejectreason')
                    ->paginate(10);

        return Response::json($results, 200);
    }


    public static function measureRanges()
    {
        $results = DB::table('measure_ranges')
                        ->select('measure_id', 'alphanumeric', 'interpretation')
                        ->paginate(10);

        return Response::json($results, 200);

    }

    /**
     * Display a listing of UNHLS Patient visits.
     *
     * @return Response
     */

    public static function unhlsVisits()
    {
        $results = DB::table('unhls_patients AS up')
                    ->leftJoin('micro_patients_details AS mp', function ($join){
                        $join->on('up.id', '=', 'mp.patient_id');
                    })
                    ->leftJoin('unhls_visits AS uv', function($join){
                        $join->on('up.id', '=', 'uv.patient_id');
                    })
                    ->leftJoin('unhls_districts AS ud', function($join){
                        $join->on('up.district_residence', '=', 'ud.id');
                    })
                    ->leftJoin('wards AS w', function($join){
                        $join->on('uv.ward_id', '=', 'w.id');
                    })
                    ->leftJoin('ward_type AS wt', function($join){
                        $join->on('w.ward_type_id', '=', 'wt.id');
                    })
                    ->select('up.id AS unhlsPatientsId', 'up.patient_number AS patientNumber', 'up.ulin AS ulin',
                            'up.nin AS nin', 'up.name AS name', 'up.dob as dob', 'up.age AS age','up.gender AS gender', 'up.nationality AS nationality',
                            'up.email AS email', 'up.address AS address', 'up.village_residence AS villageResidence','up.district_residence AS districtResidence',
                            'up.village_workplace AS villageWorkplace', 'up.phone_number AS phoneNumber', 'up.occupation AS occupation',
                            'up.external_patient_number AS externalPatientNumber', 'up.created_by AS unhlsPatientsCreatedBy',
                            'up.deleted_at AS unhlsPatientsDeletedAt', 'up.created_at AS unhlsPatientsCreatedAt',
                            'up.updated_at AS unhlsPatientsUpdatedAt', 'up.is_micro AS isMicro',
                            'mp.id AS microPatientsDetailsId', 'mp.patient_id AS patientId', 'mp.sub_county_residence AS subCountyResidence',
                            'mp.sub_county_workplace AS subCountyWorkplace', 'mp.name_next_kin AS nameNextKin', 'mp.contact_next_kin AS contactNextKin',
                            'mp.residence_next_kin AS residenceNextKin', 'mp.admission_date AS admissionDate', 'mp.transfered AS transfered',
                            'mp.facility_transfered AS facilityTransfered', 'mp.clinical_notes AS clinicalNotes',
                            'mp.days_on_antibiotic AS daysOnAntibiotic', 'mp.requested_by AS requestedBy', 'mp.clinician_contact AS clinicianContact',
                            'mp.deleted_at AS microPatientsDetailsDeletedAt', 'mp.created_at AS microPatientsDetailsCreatedAt',
                            'mp.updated_at AS microPatientsDetailsUpdatedAt',
                            'ud.id AS unhlsDistrictsId', 'ud.name AS unhlsDistrictsName', 'ud.created_at AS unhlsDistrictsCreatedAt',
                            'ud.updated_at AS unhlsDistrictsUpdatedAt',
                            'uv.id AS unhlsVisitsid', 'uv.patient_id AS unhlsVisitspatientId', 'uv.visit_type AS visitType',
                            'uv.visit_number AS visitNumber', 'uv.visit_lab_number AS visitLabNumber', 'uv.facility_id AS facilityId',
                            'uv.facility_lab_number AS facilityLabNumber', 'uv.created_at AS unhlsVisitscreatedAt',
                            'uv.updated_at AS unhlsVisitsupdatedAt', 'uv.ward_id AS wardId', 'uv.bed_no AS bedNo',
                            'uv.visit_status_id AS visitStatusId', 'uv.hospitalized AS hospitalized', 'uv.urgency AS urgency',
                            'uv.on_antibiotics AS onAntibiotics',
                            'w.id AS wardsId', 'w.name AS wardsName', 'w.description AS wardsDescription', 'w.ward_type_id AS wardsWardTypeId',
                            'wt.id AS wardTypeId', 'wt.name AS wardTypeName')
                    ->paginate(10);

        return Response::json($results, 200);

    }



    /**
     * Display a listing of UNHLS Tests.
     *
     * @return Response
     */
    public static function unhlsTests()
    {
        $results = DB::table('unhls_tests AS ut')
                    ->leftJoin('test_types AS tt', function($join){
                        $join->on('ut.test_type_id', '=', 'tt.id');
                    })
                    ->leftJoin('test_categories AS tc', function($join){
                        $join->on('tc.id', '=', 'tt.test_category_id');
                    })
                    ->leftJoin('test_statuses AS ts', function($join){
                        $join->on('ut.test_status_id', '=', 'ts.id');
                    })
                    ->leftJoin('test_phases AS tp', function($join){
                        $join->on('ts.test_phase_id', '=', 'tp.id');
                    })
                    ->leftJoin('specimens AS sp', function($join){
                        $join->on('ut.specimen_id', '=', 'sp.id');
                    })
                    ->leftJoin('specimen_types AS spt', function($join){
                        $join->on('sp.specimen_type_id', '=', 'spt.id');
                    })
                    ->leftJoin('specimen_statuses AS sps', function($join){
                        $join->on('sps.id', '=', 'sp.specimen_status_id');
                    })
                    ->select('ut.id AS unhlsTestsId', 'ut.visit_id AS unhlsTestsVisitId','ut.urgency_id AS urgencyId',
                        'ut.test_type_id AS testTypeId', 'ut.specimen_id AS unhlsTestsSpecimenId', 'ut.interpretation AS interpretation',
                        'ut.test_status_id AS testStatusId', 'ut.created_by AS unhlsTestsCreatedBy', 'ut.tested_by AS unhlsTestsTestedBy',
                        'ut.verified_by AS unhlsTestsVerifiedBy', 'ut.requested_by AS unhlsTestsRequestedBy',
                        'ut.clinician_id AS unhlsTestsClinicianId', 'ut.purpose AS purpose', 'ut.time_created AS timeCreated',
                        'ut.time_started AS timeStarted', 'ut.time_completed AS timeCompleted', 'ut.time_verified AS timeVerified',
                        'ut.time_sent AS timeSent', 'ut.external_id AS externalId', 'ut.instrument AS instrument',
                        'ut.approved_by AS timeApproved', 'ut.revised_by AS unhlsTestsRevisedBy', 'ut.time_revised AS timeRevised',
                        'tt.id AS testTypesId', 'tt.name AS testTypesName', 'tt.description AS testTypesDescription',
                        'tt.test_category_id AS testTypesTestCategoryId', 'tt.targetTAT AS targetTAT', 'tt.targetTAT_unit AS targetTATunit',
                        'tt.orderable_test AS orderableTest', 'tt.prevalence_threshold AS prevalenceThreshold',
                        'tt.accredited AS testTypesAccredited', 'tt.deleted_at AS testTypesDeletedAt', 'tt.created_at AS testTypesCreatedAt',
                        'tt.updated_at AS testTypesUpdatedAt', 'tc.id AS testCategoriesId', 'tc.name AS testCategoriesName',
                        'tc.description AS testCategoriesDescription', 'tc.deleted_at AS testCategoriesDeletedAt',
                        'tc.created_at AS testCategoriesCreatedAt', 'tc.updated_at AS testCategoriesUpdatedAt',
                        'ts.id AS testStatusesId', 'ts.name AS testStatusesName', 'ts.test_phase_id AS testStatusesTestPhaseId',
                        'tp.id AS testPhasesId', 'tp.name AS testPhasesName',
                        'sp.id AS specimentestId', 'sp.specimen_type_id AS specimentestSpecimenTypeId', 'sp.specimen_status_id AS specimenStatusId',
                        'sp.accepted_by AS specimentestAcceptedBy', 'sp.referral_id AS referralId', 'sp.time_collected AS specimentestTimeCollected',
                        'sp.time_accepted AS specimentestTimeAccepted',
                        'spt.id AS specimenTypesId', 'spt.name AS specimenTypesName', 'spt.description AS specimenTypesDescription',
                        'spt.deleted_at AS specimenTypesDeletedAt', 'spt.created_at AS specimenTypesCreatedAt', 'spt.updated_at AS specimenTypesUpdatedAt',
                        'sps.id AS specimenStatusesId', 'sps.name AS specimenStatusesName')
                    ->paginate(10);

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
