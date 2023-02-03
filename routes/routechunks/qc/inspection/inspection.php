<?php

Route::prefix('inspect')->namespace('QC\Inspection')->group(function() {
    Route::get('', 'InspectionController@search')->name("search.index");
    Route::get('index', 'InspectionController@index')->name("inspection.index");
    Route::get('final-inspection', 'InspectionController@finali')->name("finali.index");
    // Route::post('/get', 'InspectionController@get_data')->name("inspection.get");

    Route::group(['prefix'=>'final-inspection'], function(){
        Route::get('header/{inspection}', 'InspectionController@header')->name("finali.header");
        Route::get('photos/{inspection}/final/{final_inspection}', 'InspectionController@photos')->name("finali.photos");
        Route::get('defects/{inspection}/final/{final_inspection}', 'InspectionController@defects')->name("finali.defects");
        Route::get('quality/{inspection}/final/{final_inspection}', 'InspectionController@quality')->name("finali.quality");
        Route::get('conclusion/{inspection}/final/{final_inspection}', 'InspectionController@conclusion')->name("finali.conclusion");
        
        Route::put('header/{inspection}/final/{final_inspection}/start-inspection', 'InspectionController@startInspection')->name("finali.header.startInspection");
        Route::put('header/{inspection}/final/{final_inspection}/restart-inspection', 'InspectionController@restartInspection')->name("finali.header.restartInspection");
        Route::put('header/{inspection}/final/{final_inspection}/finish-inspection', 'InspectionController@finishInspection')->name("finali.header.finishInspection");
        // Update validation and checklist
        Route::put('header/{inspection}/final/{final_inspection}/update-validation-&-checklist', 'InspectionController@updateValidationChecklist')->name("finali.header.updateValidationChecklist");
        // update inspection & method
        Route::put('header/{inspection}/final/{final_inspection}/update-inspection-&-method', 'InspectionController@updateInspectionMethod')->name("finali.header.updateInspectionMethod");
        Route::put('header/{inspection}/final/{final_inspection}/update-updateQuality', 'InspectionController@updateQuality')->name("finali.header.updateQuality");
        Route::put('header/{inspection}/final/{final_inspection}/update-updateQualityPlan', 'InspectionController@updateQualityPlan')->name("finali.header.updateQualityPlan");
        // update inspection Quantities 
        Route::put('header/{inspection}/final/{final_inspection}/update-inspection-&-quantities', 'InspectionController@updateInspectionQuantities')->name("finali.header.updateInspectionQuantities");
        Route::put('header/{inspection}/final/{final_inspection}/update-production-&-status', 'InspectionController@updateInspectionproduction')->name("finali.header.updateInspectionProduction");
        // update defect
        Route::put('defects/{inspection}/final/{final_inspection}/inspection-defect/{final_inspection_defect}/update-comment', 'InspectionController@updateComment')->name("finali.header.updateComment");        
        Route::put('defects/{inspection}/final/{final_inspection}/inspection-defect/{final_inspection_defect}/increment-critical-defects', 'InspectionController@incrementCriticalDefect')->name("finali.header.incrementCriticalDefect");
        Route::put('defects/{inspection}/final/{final_inspection}/inspection-defect/{final_inspection_defect}/decrement-critical-defects', 'InspectionController@decrementCriticalDefect')->name("finali.header.decrementCriticalDefect");
        Route::put('defects/{inspection}/final/{final_inspection}/inspection-defect/{final_inspection_defect}/increment-major-defects', 'InspectionController@incrementMajorDefect')->name("finali.header.incrementMajorDefect");
        Route::put('defects/{inspection}/final/{final_inspection}/inspection-defect/{final_inspection_defect}/decrement-major-defects', 'InspectionController@decrementMajorDefect')->name("finali.header.decrementMajorDefect");
        Route::put('defects/{inspection}/final/{final_inspection}/inspection-defect/{final_inspection_defect}/increment-minor-defects', 'InspectionController@incrementMinorDefect')->name("finali.header.incrementMinorDefect");
        Route::put('defects/{inspection}/final/{final_inspection}/inspection-defect/{final_inspection_defect}/decrement-minor-defects', 'InspectionController@dfupecrementMinorDefect')->name("finali.header.decrementMinorDefect");

        // update Photos
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhoto', 'InspectionController@updatePhoto')->name("updatePhoto");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoPacakedIntoCarton', 'InspectionController@updatePhotoPacakedIntoCarton')->name("updatePhotoPacakedIntoCarton");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoSilica_gel', 'InspectionController@updatePhotoSlicaGel')->name("updatePhotoSlicaGel");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoSamplingCarton', 'InspectionController@updatePhotoSamplingCarton')->name("updatePhotoSamplingCarton");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoPackingList', 'InspectionController@updatePhotoPackingList')->name("updatePhotoPackingList");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoHangTag', 'InspectionController@updatePhotoHangTag')->name("updatePhotoHangTag");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoShippingMark', 'InspectionController@updatePhotoShippingMark')->name("updatePhotoShippingMark");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoPolybag', 'InspectionController@updatePhotoPolybag')->name("updatePhotoPolybag");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoMainLabel', 'InspectionController@updatePhotoMainLabel')->name("updatePhotoMainLabel");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoFrontSide', 'InspectionController@updatePhotoFrontSide')->name("updatePhotoFrontSide");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoBackSide', 'InspectionController@updatePhotoBackSide')->name("updatePhotoBackSide");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoImage1', 'InspectionController@updatePhotoImage1')->name("updatePhotoImage1");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoPView', 'InspectionController@updatePhotoPView')->name("updatePhotoPView");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoSView', 'InspectionController@updatePhotoSView')->name("updatePhotoSView");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoCSample', 'InspectionController@updatePhotoCSample')->name("updatePhotoCSample");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoM1', 'InspectionController@updatePhotoM1')->name("updatePhotoM1");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoM2', 'InspectionController@updatePhotoM2')->name("updatePhotoM2");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoM3', 'InspectionController@updatePhotoM3')->name("updatePhotoM3");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoM4', 'InspectionController@updatePhotoM4')->name("updatePhotoM4");
        Route::put('header/{inspection}/final/{final_inspection}/update-updatePhotoM5', 'InspectionController@updatePhotoM5')->name("updatePhotoM5");
        Route::put('header/{inspection}/final/{final_inspection}/inspection-defect/{final_inspection_defect}/update-updatePhotoHoleMajor', 'InspectionController@updatePhotoHoleMajor')->name("finali.header.updatePhotoHoleMajor");
        Route::put('header/{inspection}/final/{final_inspection}/inspection-defect/{final_inspection_defect}/update-updatePhotoHole', 'InspectionController@updatePhotoHoleMinor')->name("finali.header.updatePhotoHoleMinor");
        Route::put('header/{inspection}/final/{final_inspection}/inspection-defect/{final_inspection_defect}/update-updatePhotoHoleMinor', 'InspectionController@updatePhotoHole')->name("finali.header.updatePhotoHole");
    });

    Route::group(['prefix'=>'Inspection-Report'], function(){
        // Route::get('monthly', 'InspectionReportController@monthly')->name("monthly.monthlyReport");
        Route::get('rBulanan', 'InspectionReportController@bulanan')->name("bulanan.report");
        Route::get('rtahunan', 'InspectionReportController@tahunan')->name("tahunan.report");
        Route::get('anualAll', 'InspectionReportController@tahunanAll')->name("tahunanAll.report");
        Route::get('daily', 'InspectionReportController@dailyUpdate')->name("dailyUpdate.report");
        Route::post('UpdateAll', 'InspectionReportController@updateAll')->name("updateAll.report");
        Route::post('monthly', 'InspectionReportController@monthly')->name("monthly.report");
        Route::post('monthly/pdf', 'InspectionReportController@monthly_pdf_abc')->name("monthly_pdf_final");
        Route::post('yearly/pdf', 'InspectionReportController@yearly_pdf_abc')->name("yearly_pdf_final");
        Route::post('yearlyAll/pdf', 'InspectionReportController@yearlyAll_pdf_abc')->name("yearlyAll_pdf_final");
        Route::post('yearly', 'InspectionReportController@yearly')->name("yearly.report");
        Route::post('yearlyAllFacility', 'InspectionReportController@yearlyAllFacility')->name("yearlyAllFacility.report");

    });
});