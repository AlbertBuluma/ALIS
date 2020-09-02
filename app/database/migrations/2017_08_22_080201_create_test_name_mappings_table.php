<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestNameMappingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_name_mappings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('test_type_id')->unsigned()->nullable();
			$table->string('standard_name');
			$table->string('system_name')->unique();
		});

		Schema::create('measure_name_mappings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('test_name_mapping_id')->unsigned();
			$table->integer('measure_id')->unsigned()->nullable();
			$table->string('standard_name');
			$table->string('system_name')->unique();
		});

        Schema::create('specimen_name_mappings', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('specimen_type_id')->unsigned()->nullable();
            $table->string('standard_name');
            $table->string('system_name')->unique();
        });

        Eloquent::unguard();
        // testing seeding
        $testNameMappings = [
            ['standard_name' => 'CBC',
                'system_name' => 'cbc',
                'measureNameMappings' => [
                    [
                    'standard_name' => 'WBC',
                    'system_name' => 'wbc',],
                    [
                    'standard_name' => 'RBC',
                    'system_name' => 'rbc',],
                    [
                    'standard_name' => 'hgb',
                    'system_name' => 'hgb',],
                ]
            ],['standard_name' => 'Hb',
                'system_name' => 'hb',
                'measureNameMappings' => [
                    ['standard_name' => 'Hb',
                    'system_name' => 'hb',],
                ]
            ],['standard_name' => 'ESR',
                'system_name' => 'esr',
                'measureNameMappings' => [
                    ['standard_name' => 'ESR',
                    'system_name' => 'esr',],
                ]
            ],['standard_name' => 'Film Comment',
                'system_name' => 'film_comment',
                'measureNameMappings' => [
                    ['standard_name' => 'Film Comment',
                    'system_name' => 'film_comment',],
                ]
            ],['standard_name' => 'Bleeding time',
                'system_name' => 'bleeding_time',
                'measureNameMappings' => [
                    ['standard_name' => 'Bleeding time',
                    'system_name' => 'bleeding_time',],
                ]
            ],['standard_name' => 'Prothrombin Time',
                'system_name' => 'prothrombin_time',
                'measureNameMappings' => [
                    ['standard_name' => 'Prothrombin Time',
                    'system_name' => 'prothrombin_time',],
                ]
            ],['standard_name' => 'Clotting Time',
                'system_name' => 'clotting_time',
                'measureNameMappings' => [
                    ['standard_name' => 'Clotting Time',
                    'system_name' => 'clotting_time',],
                ]
            ],['standard_name' => 'Sickle Cell',
                'system_name' => 'sickle_cell',
                'measureNameMappings' => [
                    ['standard_name' => 'Sickle Cell',
                    'system_name' => 'sickle_cell',],
                ]
            ],['standard_name' => 'ABO Grouping',
                'system_name' => 'abo_grouping',
                'measureNameMappings' => [
                    ['standard_name' => 'ABO Grouping',
                    'system_name' => 'abo_grouping',],
                ]
            ],['standard_name' => 'Combs',
                'system_name' => 'combs',
                'measureNameMappings' => [
                    ['standard_name' => 'Combs',
                    'system_name' => 'combs',],
                ]
            ],['standard_name' => 'Cross Matching',
                'system_name' => 'cross_matching',
                'measureNameMappings' => [
                    ['standard_name' => 'Cross Matching',
                    'system_name' => 'cross_matching',],
                ]
            ],['standard_name' => 'Malaria Microscopy',
                'system_name' => 'malaria_microscopy',
                'measureNameMappings' => [
                    ['standard_name' => 'Malaria Microscopy',
                    'system_name' => 'malaria_microscopy',],
                    ['standard_name' => 'Trypanosoma',
                    'system_name' => 'trypanosoma',],
                    ['standard_name' => 'Microfilaria',
                    'system_name' => 'microfilaria',],
                    ['standard_name' => 'Leishmania',
                    'system_name' => 'leishmania',],
                    ['standard_name' => 'Trichinella',
                    'system_name' => 'trichinella',],
                    ['standard_name' => 'Borrellia',
                    'system_name' => 'borrellia',],
                ]
            ],['standard_name' => 'Malaria RDTs',
                'system_name' => 'malaria_rdts',
                'measureNameMappings' => [
                    ['standard_name' => 'Malaria RDTs',
                    'system_name' => 'malaria_rdts',],
                ]
            ],['standard_name' => 'Stool Microscopy',
                'system_name' => 'stool_microscopy',
                'measureNameMappings' => [
                    ['standard_name' => 'Entamoeba',
                    'system_name' => 'entamoeba',],
                    ['standard_name' => ' Giardia Lumblia',
                    'system_name' => ' giardia_lumblia',],
                    ['standard_name' => 'Cryptosporidium',
                    'system_name' => 'cryptosporidium',],
                    ['standard_name' => 'Isospora',
                    'system_name' => 'isospora',],
                    ['standard_name' => 'Cyclospora',
                    'system_name' => 'cyclospora',],
                    ['standard_name' => 'Strongyloides',
                    'system_name' => 'strongyloides',],
                    ['standard_name' => 'Shistosoma',
                    'system_name' => 'shistosoma',],
                    ['standard_name' => 'Taenia',
                    'system_name' => 'taenia',],
                    ['standard_name' => 'Askaris',
                    'system_name' => 'askaris',],
                    ['standard_name' => 'Hookworm',
                    'system_name' => 'hookworm',],
                    ['standard_name' => 'Trichuris',
                    'system_name' => 'trichuris',],
                    ['standard_name' => 'Stool Microscopy',
                    'system_name' => 'stool_microscopy',],
                ]
            ],['standard_name' => 'VDRL/RPR',
                'system_name' => 'vdrl_rpr',
                'measureNameMappings' => [
                    ['standard_name' => 'VDRL/RPR',
                    'system_name' => 'vdrl_rpr',],
                ]
            ],['standard_name' => 'TPHA',
                'system_name' => 'tpha',
                'measureNameMappings' => [
                    ['standard_name' => 'TPHA',
                    'system_name' => 'tpha',],
                ]
            ],['standard_name' => 'Shigella Dysentery',
                'system_name' => 'shigella_dysentery',
                'measureNameMappings' => [
                    ['standard_name' => 'Shigella Dysentery',
                    'system_name' => 'shigella_dysentery',],
                ]
            ],['standard_name' => 'Hepatitis B',
                'system_name' => 'hepatitis_b',
                'measureNameMappings' => [
                    ['standard_name' => 'Hepatitis B SAgS',
                    'system_name' => 'hepatitis_b_sags',],
                ]
            ],['standard_name' => 'Hep C',
                'system_name' => 'hep_c',
                'measureNameMappings' => [
                    ['standard_name' => 'Hep C',
                    'system_name' => 'hep_c',],
                ]
            ],['standard_name' => 'Hep A',
                'system_name' => 'hep_a',
                'measureNameMappings' => [
                    ['standard_name' => 'Hep A',
                    'system_name' => 'hep_a',],
                ]
            ],['standard_name' => 'Brucella',
                'system_name' => 'brucella',
                'measureNameMappings' => [
                    ['standard_name' => 'Brucella',
                    'system_name' => 'brucella',],
                ]
            ],['standard_name' => 'Pregnancy Test',
                'system_name' => 'pregnancy_test',
                'measureNameMappings' => [
                    ['standard_name' => 'Pregnancy Test',
                    'system_name' => 'pregnancy_test',],
                ]
            ],['standard_name' => 'CRAG',
                'system_name' => 'crag',
                'measureNameMappings' => [
                    ['standard_name' => 'CRAG',
                    'system_name' => 'crag',],
                ]
            ],['standard_name' => 'Rheumatoid Factor',
                'system_name' => 'rheumatoid_factor',
                'measureNameMappings' => [
                    ['standard_name' => 'Rheumatoid Factor',
                    'system_name' => 'rheumatoid_factor',],
                ]
            ],['standard_name' => 'CD4 tests',
                'system_name' => 'cd4_tests',
                'measureNameMappings' => [
                    ['standard_name' => 'CD4 tests',
                    'system_name' => 'cd4_tests',],
                ]
            ],['standard_name' => 'Viral Load Tests',
                'system_name' => 'viral_load_tests',
                'measureNameMappings' => [
                    ['standard_name' => 'Viral Load Tests',
                    'system_name' => 'viral_load_tests',],
                ]
            ],['standard_name' => 'Hep B Viral Load',
                'system_name' => 'hepb_viral_load',
                'measureNameMappings' => [
                    ['standard_name' => 'Hep B Viral Load',
                    'system_name' => 'hepb_viral_load',],
                ]
             ],['standard_name' => 'TB Genexpert',
                'system_name' => 'tb_genexpert',
                'measureNameMappings' => [
                    ['standard_name' => 'MTB',
                    'system_name' => 'mtb',],
                    ['standard_name' => 'RIF RESISTANCE',
                    'system_name' => 'rif_resistance',],
                ]
            ],['standard_name' => 'FM for AFBs',
                'system_name' => 'fm_for_afbs',
                'measureNameMappings' => [
                    ['standard_name' => 'FM for AFBs',
                    'system_name' => 'fm_for_afbs',],
                ]
            ],['standard_name' => 'ZN for AFBs',
                'system_name' => 'zn_for_afbs',
                'measureNameMappings' => [
                    ['standard_name' => 'ZN for AFBs',
                    'system_name' => 'zn_for_afbs',],
                ]
            ],['standard_name' => ' Latent TB Infection test',
                'system_name' => 'latent_tb_infection_test',
                'measureNameMappings' => [
                    ['standard_name' => ' Latent TB Infection test',
                    'system_name' => 'latent_tb_infection_test',],
                ]
            ],['standard_name' => 'TB Lamp Test',
                'system_name' => 'tb_lamp_test',
                'measureNameMappings' => [
                    ['standard_name' => 'TB Lamp Test',
                    'system_name' => 'tb_lamp_test',],
                ]
            ],['standard_name' => 'Culture & Sensitivity',
                'system_name' => 'culture_sensitivity',
                'measureNameMappings' => [
                    ['standard_name' => 'Culture & Sensitivity',
                    'system_name' => 'culture_sensitivity',],
                    ['standard_name' => 'Blood',
                    'system_name' => 'blood',],
                    ['standard_name' => 'Urine',
                    'system_name' => 'urine',],
                    ['standard_name' => 'Stool',
                    'system_name' => 'stool',],
                    ['standard_name' => 'Swabs',
                    'system_name' => 'swabs',],
                    ['standard_name' => 'Sputum',
                    'system_name' => 'sputum',],
                ]
            ],['standard_name' => 'Gram Stain',
                'system_name' => 'gram_stain',
                'measureNameMappings' => [
                    ['standard_name' => 'Gram Stain',
                    'system_name' => 'gram_stain',],
                ]
            ],['standard_name' => 'India Ink',
                'system_name' => 'india_ink',
                'measureNameMappings' => [
                    ['standard_name' => 'India Ink',
                    'system_name' => 'india_ink',],
                ]
            ],['standard_name' => 'Wet Preps',
                'system_name' => 'wet_preps',
                'measureNameMappings' => [
                    ['standard_name' => 'Wet Preps',
                    'system_name' => 'wet_preps',],
                ]
            ],['standard_name' => 'Urine Microscopy',
                'system_name' => 'urine_microscopy',
                'measureNameMappings' => [
                    ['standard_name' => 'Urine Microscopy',
                    'system_name' => 'urine_microscopy',],
                ]
            ],['standard_name' => 'Renal Profile',
                'system_name' => 'renal_profile',
                'measureNameMappings' => [
                    ['standard_name' => 'Urea',
                    'system_name' => 'urea',],
                    ['standard_name' => 'Calcium',
                    'system_name' => 'calcium',],
                    ['standard_name' => 'Potassium',
                    'system_name' => 'potassium',],
                    ['standard_name' => 'Sodium',
                    'system_name' => 'sodium',],
                    ['standard_name' => 'Creatinine',
                    'system_name' => 'creatinine',],
                ]
            ],['standard_name' => 'Liver Profile',
                'system_name' => 'liver_profile',
                'measureNameMappings' => [
                    ['standard_name' => 'ALT',
                    'system_name' => 'alt',],
                    ['standard_name' => 'AST',
                    'system_name' => 'ast',],
                    ['standard_name' => 'Albumin',
                    'system_name' => 'albumin',],
                    ['standard_name' => 'Total Protein',
                    'system_name' => 'total_protein',],
                ]
            ],['standard_name' => 'Lipid/Cardiac Profile',
                'system_name' => 'lipid_cardiac_profile',
                'measureNameMappings' => [
                    ['standard_name' => 'Triglycerides',
                    'system_name' => 'triglycerides',],
                    ['standard_name' => 'Cholesterol',
                    'system_name' => 'cholesterol',],
                    ['standard_name' => 'Free T3',
                    'system_name' => 'free_t3',],
                    ['standard_name' => 'Free T4',
                    'system_name' => 'free_t4',],
                    ['standard_name' => 'TSH',
                    'system_name' => 'tsh',],
                ]
            ],['standard_name' => 'Alkaline Phosphates',
                'system_name' => 'alkaline_phosphates',
                'measureNameMappings' => [
                    ['standard_name' => 'Alkaline Phosphates',
                    'system_name' => 'alkaline_phosphates',],
                ]
            ],['standard_name' => 'Amylase',
                'system_name' => 'amylase',
                'measureNameMappings' => [
                    ['standard_name' => 'Amylase',
                    'system_name' => 'amylase',],
                ]
            ],['standard_name' => 'Glucose',
                'system_name' => 'glucose',
                'measureNameMappings' => [
                    ['standard_name' => 'Glucose',
                    'system_name' => 'glucose',],
                ]
            ],['standard_name' => 'Total Bilirubin',
                'system_name' => 'total_bilirubin',
                'measureNameMappings' => [
                    ['standard_name' => 'Total Bilirubin',
                    'system_name' => 'total_bilirubin',],
                ]
            ],['standard_name' => 'Lipase',
                'system_name' => 'lipase',
                'measureNameMappings' => [
                    ['standard_name' => 'Lipase',
                    'system_name' => 'lipase',]
                ]
            ],['standard_name' => 'AFP',
                'system_name' => 'afp',
                'measureNameMappings' => [
                    ['standard_name' => 'AFP',
                    'system_name' => 'afp',]
                ]
            ],['standard_name' => 'HIV',
                'system_name' => 'hiv',
                'measureNameMappings' => [
                    ['standard_name' => 'Determine',
                    'system_name' => 'determine',],
                    ['standard_name' => 'Stat-pak',
                    'system_name' => 'stat_pak',],
                    ['standard_name' => 'SD Bioline',
                    'system_name' => 'sd_bioline',]
                ]
            ],
        ];
        foreach ($testNameMappings as $key => $testNameMapping)
        {
            $testNameMapping = TestNameMapping::create([
                'standard_name' => $testNameMapping['standard_name'],
                'test_type_id' => (isset($testNameMapping['test_type_id']))?$testNameMapping['test_type_id']:NULL,
                'system_name' => $testNameMapping['system_name']]);
            $test_name_mapping_id = $testNameMapping->id;
                echo "test name {$testNameMapping['standard_name']} - {$testNameMapping['system_name']}\n";
            foreach ($testNameMappings[$key]['measureNameMappings'] as $measureNameMapping) {
                MeasureNameMapping::create([
                    'test_name_mapping_id' => $test_name_mapping_id,
                'measure_id' => (isset($measureNameMapping['measure_id']))?$measureNameMapping['measure_id']:NULL,
                    'standard_name' => $measureNameMapping['standard_name'],
                    'system_name' => $measureNameMapping['system_name']]);
                    echo "--measure name {$measureNameMapping['standard_name']} - {$measureNameMapping['system_name']}\n";
            }
        }

        ResultInterpretation::create(['name' => 'High']);
        ResultInterpretation::create(['name' => 'Normal']);
        ResultInterpretation::create(['name' => 'Low']);
        ResultInterpretation::create(['name' => 'HGB<8']);
        ResultInterpretation::create(['name' => 'HGB≥8']);
        ResultInterpretation::create(['name' => 'Positive']);
        ResultInterpretation::create(['name' => 'Negative']);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('measure_name_mappings');
		Schema::drop('test_name_mappings');
	}

}
