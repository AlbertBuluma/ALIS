'isolate'=>
							[
							'test_category_id' => 2,
							'Klebsiella_pneumoniae' => 72,
							'Escherichia_coli' => 2,
							'Salmonella_spp' => 16,
							'Shigella_spp' => 13,
							'Neisseria_gonorrhoeae' => 42,
							'Staphylococcus_aureus' => 23,
							'Streptococcus_pneumoniae' => 61,
							'Acinetobacter_baumannii' => 13,
							'Vibrio_cholerae' => 20,
							'Enterococcus_spp' => 34,
							'Haemophilus_influenzae' => 52,
							'Neisseria_meningitides' => 43,
							'Campylobacter' => 0,
						],
						'hematology'=>
					
							'test_category_id' => 3,
							'hb_non_automated' => 'hb_non_automated', 
							'vdrl_rpr' => 'rpr',
							'cbc' => 'wbc',
							'film_comment' => 'film_comment',
							'tpha' => 'tpha',
							'esr' =>'esr', 
							'shigella_dysentery' => 'shigella_dysentery',
							'bleeding_time' => 'bleeding_time',
							'Hepatitisb_sags' => 'Hepatitisb_sags',
							'prothrombin_time' => 'prothrombin_time',
							'brucella' => 'brucella',
							'clotting_time' => 'clotting_time',
							'pregnancy_test' => 'pregnancy_test',
							'sickle_cell' => 'sickle_cell',
						],
						'serology' => [ //Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 4, //the id of the serology - check test_categories table
							'vdrl_rpr' => 'rpr', 
							'tpha' => 'tpha',
							'shigella_dysentery' => 'shigella_dysentery',
							'hepatitisb_sags' => 'hepatitisb_sags',
							'brucella' => 'brucella',
							'pregnancy_test' => 'hcg',
							'crag' => 'crag',
							'rheumatoid_factor' => 'rheumatoid_factor',
							'hepb_core_ag' => 'hepb_core_ag',
							'hepa' => 'hepa',
							'hepc' => 'hepc',
						],
						'blood_transfusion' => [ //Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 5, //the id of the serology - check test_categories table
							'ahb_combs_test' => 'ahb_combs_test',
							'abo_grouping' => 'abo_grouping',
							'rhesus_grouping' => 'N/A',
							'cross_matching' => 'cross_matching',
						],
						//test based analysis
						'culture_and_sensitivity_specimen' => [ //Input the measure_id for a test type in this section
							'test_type_id' => 5, //the id of the cul n sens test - check test_types table
							'blood' => 22,
							'urine' => 26,
							'stool' => 13,
							'sputum' => 24,
							'nosal_swab' => 3,
							'rectal_swab' => 5,
							'wound_swab' => 15,
							'pus_swab' => 16,
							'eye_swab' => 18,
							'ear_swab' => 19,
							'throat_swab' => 20,
							'uretheral_swab' => 25,
						],
						'microbiology' => [ //Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 2, //the id of the serology - check test_categories table
							'test_type_id' => 5, //the id of the microbiology test - check test_types table
							'auramine_fm' => 'auramine_fm',
							'zn_for_afb' => 'zn_for_afb',
							'leishman_stain' => 'leishman_stain',
							'gram' => 'gram',
							'india_ink' => 'india_ink',
							'urine_microscopy' => 'urine_microscopy',
							'wet_prep' => 'wet_prep',
							//'others' => 15,
							
						],
						'parasitology' => [ //Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 1, //the id of the serology - check test_categories table
							'test_type_id' => 5, //the id of the parasitology test - check test_types table
							'malaria_microscopy' => 'bs_for_mps',
							'malaria_rdts' => 'malaria_rdts',
							'trypasonoma' => 'trypasonoma',
							'micro_filaria' => 'micro_filaria',
							'leishmania' => 'leishmania',
							'trichinella' => 'trichinella',
							'borrellia' => 'borrellia',
						],
						'stoolmicroscopy' => [ //Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 5, //the id of the serology - check test_categories table
							'test_type_id' => 5, //the id of the stool test - check test_types table
							'entamoeba' => 'entamoeba',
							'giardia' => 'giardia',
							'cryptosporidium' => 'cryptosporidium',
							'isospora' => 'isospora',
							'cyclospora' => 'cyclospora',
							'strongyloides' => 'strongyloides',
							'shistosoma' => 'shistosoma',
							'taenia' => 'taenia',
							'askaris' => 'askaris',
							'hookworm' => 'hookworm',
							'trichuris' => 'trichuris',
							//'other_parasites' => 25,

						],
						'immunology' => [ //Input the measure_id number for a test type in this section - check testtype_measure table
							'test_category_id' => 7,
							'cd4' => 'cd4', 
							'hiv_viral_load' => 'hiv_viral_load',
							'hepb' => 'hepb',
						],
						'molecular' => [
							'test_category_id' => 2,
							'tb_genexpert' => 'tb_genexpert', 
							'latent_tb' => 'latent_tb',
							'tb_lam' => 'tb_lam',
						],
						'chemistry' => [//Input the measure_id for a test type in this section - check testtype_measure table
							'test_category_id' => 6, //the id of the serology - check test_categories table
							'urea' => 'urea', 
							'calcium' => 'calcium',
							'potassium' => 'potassium',
							'albumin' => 'albumin',
							'total_protein' => 'total_protein',
							'sodium' => 'sodium',
							'creatinine' => 'creatinine',
							'alt' => 'alt',
							'ast' => 'ast',
							'protein' => 'protein',
							'triglycerides' => 'triglycerides',
							'cholesterol' => 'cholesterol',
							'free_t3' => 'free_t3',
							'free_t4' => 'free_t4',
							'tsh' => 'tsh',
							'alkaline_phosphate' => 'alkaline_phosphate',
							'amylase' => 'amylase',
							'glucose' => 'glucose',
							'total_bilirubin' => 'total_bilirubin',
							'lipase' => 'lipase',
							'afp' => 'afp',

						],
						'referralTests' => [//get ids from measures table
							'status' => 1, //the id of the serology - check test_categories table
							'eid' => 510,
							'hiv_viral_load' => 320, 
							'cd4' => 510, 
							'sickle_cell_confirmation' => 92,
							'histology' => 511,
							'polio' => 512,
							'sars' => 513,
							'tb_genexpert' => 58,
							'mdr_tb' => 515,
			
						],
						'referred_microbiology' => [//get ids from measures table
							'status' => 1, //the id of the serology - check test_categories table
							'typhoid_fever' => 510, 
							'cholera' => 92,
							'dysentry' => 60,
							'rota_virus' => 512,
							'meningitis' => 513,
							'neonatal_tetanus' => 514,
							'plague' => 518,
							'isolates' => 12,
							
						],
						'referred_parasitology' => [//get ids from measures table
							//'status' => 1, //the id of the serology - check test_categories table
							'status' => 1,
							'hemo_parasites' => 510, 
							'intestinal_parasites' => 92,
							'tissue_parasites' => 51,

						],
						'referred_virology' => [//get ids from measures table
							'status' => 1, //the id of the serology - check test_categories table
							'measles' => 510, 
							'vhf' => 510, 
							'animal_bites' => 92,
							'suspected_outbreak_sample' => 511,
							'hepbAg' => 512,
							'hepb_vl' => 513,
							'hepc_vl' => 513,
						],
						'equipmentBreakdown' => [
							'referral_reason' => 1,
							'CD4' => 1,
							'TB' => 2,
							'CBC' => 4,
							'Chemistry' => 4,
							'Microbiology' => 4,
							'hiv' => 4,
							'VDRL' => 4,
							'Haematology' => 4,
							'Parasitolog' => 4,	
						],
						'reagent_stockout' => [
							'referral_reason' => 2,
							'CD4' => 3,
							'TB' => 1,
							'CBC' => 5,
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 4,
							'VDRL' => 4,
							'Haematology' => 4,
							'Parasitolog' => 1,	
						],
						'supplies_stockout' => [
							'referral_reason' => 3,
							'CD4' => 3,
							'TB' => 1,
							'CBC' => 5,
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 4,
							'VDRL' => 4,
							'Haematology' => 4,
							'Parasitolog' => 1,	
						],
						'power_outage' => [
							'referral_reason' => 4,
							'CD4' => 3,
							'TB' => 1,
							'CBC' => 5,
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 4,
							'VDRL' => 4,
							'Haematology' => 4,
							'Parasitolog' => 1,	
						],
						'no_testing_expertise' => [
							'referral_reason' => 5,
							'CD4' => 3,
							'TB' => 1,
							'CBC' => 5,
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 4,
							'VDRL' => 4,
							'Haematology' => 4,
							'Parasitolog' => 1,	
						],
						'required_equipment' => [
							'referral_reason' => 1,
							'CD4' => 3,
							'TB' => 1,
							'CBC' => 5,
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 4,
							'VDRL' => 4,
							'Haematology' => 4,
							'Parasitolog' => 1,	
						],
						'confirmatory_testing' => [
							'referral_reason' => 1,
							'CD4' => 3,
							'TB' => 1,
							'CBC' => 5,
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 4,
							'VDRL' => 4,
							'Haematology' => 4,
							'Parasitolog' => 1,	
						],
						'qa_retesting' => [
							'referral_reason' => 1,
							'CD4' => 3,
							'TB' => 1,
							'CBC' => 5,
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 4,
							'VDRL' => 4,
							'Haematology' => 4,
							'Parasitolog' => 1,	
						],
						'other_referral_reasons' => [
							'referral_reason' => 1,
							'CD4' => 3,
							'TB' => 1,
							'CBC' => 5,
							'Chemistry' => 5,
							'Microbiology' => 1,
							'hiv' => 4,
							'VDRL' => 4,
							'Haematology' => 4,
							'Parasitolog' => 1,	
						],
						'klebsiella_organism' => [//get ids from measures table
							'organism_id' => 72, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'escherichia_organism' => [//get ids from measures table
							'organism_id' => 2, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'salmonella_organism' => [//get ids from measures table
							'organism_id' => 16, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'shigella_organism' => [//get ids from measures table
							'organism_id' => 13, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'neisseria_organism' => [//get ids from measures table
							'organism_id' => 42, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'staphylococcus_organism' => [//get ids from measures table
							'organism_id' => 23, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'streptococcus_organism' => [//get ids from measures table
							'organism_id' => 61, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'acinetobacter_organism' => [//get ids from measures table
							'organism_id' => 13, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'vibrio_organism' => [//get ids from measures table
							'organism_id' => 20, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'enterococcus_organism' => [//get ids from measures table
							'organism_id' => 34, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'haemophilus_organism' => [//get ids from measures table
							'organism_id' => 52, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'neisseriam_organism' => [//get ids from measures table
							'organism_id' => 43, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'campylobacter_organism' => [//get ids from measures table
							'organism_id' => 30, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,

						],
						'others_organism' => [//get ids from measures table
							'organism_id' => 1, //the id of the serology - check test_categories table
							'ampicilin' => 2,
							'azithromycin' => 2,
							'amikacin' => 1,
							'ceftriaxone' => 6,
							'ceftazidime' => 5,
							'cefotaxime' => 4,
							'cefoxitin' => 15,
							'cefixime' => 34,
							'cotrimoxazole' => 12,
							'ciprofloxacin' => 11,
							'colistin' => 23,
							'gentamicin' => 13,
							'imipenem' => 14,
							'levofloxacin' => 21,
							'meropenem' => 15,
							'oxacillin' => 36,
							'penicillin_g' => 29,
							'vancomycin' => 27,
							'augmentin' => 3,
							'chloramphenicol' => 10,
							'clindamycin' => 26,
							'erythromycin' => 25,
							'nalidixic_acid' => 16,
							'nitrofurantoin' => 19,
							'piperacillin' => 18,
							'piperacillin_tazobactam' => 17,
							'tetracycline' => 24,
						],
						'blood_specimen_rejection' => [
							'specimen_type_id' => 23,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
						],
						'stool_specimen_rejection' => [
							'specimen_type_id' => 13,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
							],
						'urine_specimen_rejection' => [
							'specimen_type_id' => 13,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
							],
						'sputum_specimen_rejection' => [
							'specimen_type_id' => 24,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
							],
						'pus_specimen_rejection' => [
							'specimen_type_id' => 10,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
							],
						'genital_specimen_rejection' => [
							'specimen_type_id' => 21,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
							],
						'skin_specimen_rejection' => [
							'specimen_type_id' => 14,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,
							//'Other_reasons' => 19,
							],
						'other_specimen_rejection' => [
							'specimen_type_id' => 19,
							'inadequate_specimen_volume' => 1,
							'hemolyzed_specimen' => 9,
							'specimen_without_lab_request_form' => 3,
							'No_test_specified_on_lab_request_form_accompanying_specimen' => 4,
							'Specimen_without_label_or_identifier' => 20,
							'Wrong_specimen_label' => 38,
							'Unclear_specimen_label' => 7,
							'Wrong_specimen_container' => 8,
							'Damaged_specimen_container' => 11,
							'Too_old_specimen' => 16,
							'Date_of_specimen_collection_not_specified' => 13,
							'Time_of_specimen_collection_not_specified' => 14,
							'Specimen_type_unacceptable_for_required_test' => 15,