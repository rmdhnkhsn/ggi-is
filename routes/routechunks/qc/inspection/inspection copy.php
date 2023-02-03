<?php

Route::prefix('QC')->namespace('QC\Inspection')->group(function() {
    Route::get('index', 'InspectionController@index')->name("inspection.index");
    Route::get('final-inspection', 'InspectionController@finali')->name("finali.index");
    Route::get('search', 'InspectionController@search')->name("search.index");
    // Route::post('/get', 'InspectionController@get_data')->name("inspection.get");

    Route::group(['prefix'=>'final-inspection'], function(){
        Route::get('header/{inspection}', 'InspectionController@header')->name("finali.header");
        //route buat  start inspect
        Route::put('header/{inspection}/start-inspection', 'InspectionController@startInspection')->name("finali.header.startInspection");
        Route::put('header/{inspection}/finish-inspection', 'InspectionController@finishInspection')->name("finali.header.finishInspection");
        // Update validation and checklist
        Route::put('header/{inspection}/update-validation-&-checklist', 'InspectionController@updateValidationChecklist')->name("finali.header.updateValidationChecklist");
        // update inspection & method
        Route::put('header/{inspection}/update-inspection-&-method', 'InspectionController@updateInspectionMethod')->name("finali.header.updateInspectionMethod");
        Route::put('header/{inspection}/update-updateQuality', 'InspectionController@updateQuality')->name("finali.header.updateQuality");
        Route::put('header/{inspection}/update-updateQualityPlan', 'InspectionController@updateQualityPlan')->name("finali.header.updateQualityPlan");
        // update inspection Quantities 
        // Route::put('header/{inspection}/update-inspection-&-quantities', 'InspectionController@updateInspectionQuantities')->name("finali.header.updateInspectionQuantities");
        Route::put('header/{inspection}/update-inspection-&-quantities', 'InspectionController@updateInspectionQuantities')->name("finali.header.updateInspectionQuantities");
        // update defect
        Route::put('defects/{inspection}/menu/{menu}/sub-menu/{sub_menu}/update-comment', 'InspectionController@updateComment')->name("finali.header.updateComment");
        
        Route::put('defects/{inspection}/menu/{menu}/sub-menu/{sub_menu}/increment-critical-defects', 'InspectionController@incrementCriticalDefect')->name("finali.header.incrementCriticalDefect");
        Route::put('defects/{inspection}/menu/{menu}/sub-menu/{sub_menu}/decrement-critical-defects', 'InspectionController@decrementCriticalDefect')->name("finali.header.decrementCriticalDefect");
        Route::put('defects/{inspection}/menu/{menu}/sub-menu/{sub_menu}/increment-major-defects', 'InspectionController@incrementMajorDefect')->name("finali.header.incrementMajorDefect");
        Route::put('defects/{inspection}/menu/{menu}/sub-menu/{sub_menu}/decrement-major-defects', 'InspectionController@decrementMajorDefect')->name("finali.header.decrementMajorDefect");
        Route::put('defects/{inspection}/menu/{menu}/sub-menu/{sub_menu}/increment-minor-defects', 'InspectionController@incrementMinorDefect')->name("finali.header.incrementMinorDefect");
        Route::put('defects/{inspection}/menu/{menu}/sub-menu/{sub_menu}/decrement-minor-defects', 'InspectionController@decrementMinorDefect')->name("finali.header.decrementMinorDefect");
        
        // update Photos
        Route::put('header/{inspection}/update-updatePhoto', 'InspectionController@updatePhoto')->name("updatePhoto");
        Route::put('header/{inspection}/update-updatePhotoPacakedIntoCarton', 'InspectionController@updatePhotoPacakedIntoCarton')->name("updatePhotoPacakedIntoCarton");
        Route::put('header/{inspection}/update-updatePhotoSilica_gel', 'InspectionController@updatePhotoSlicaGel')->name("updatePhotoSlicaGel");
        Route::put('header/{inspection}/update-updatePhotoSamplingCarton', 'InspectionController@updatePhotoSamplingCarton')->name("updatePhotoSamplingCarton");
        Route::put('header/{inspection}/update-updatePhotoPackingList', 'InspectionController@updatePhotoPackingList')->name("updatePhotoPackingList");
        Route::put('header/{inspection}/update-updatePhotoHangTag', 'InspectionController@updatePhotoHangTag')->name("updatePhotoHangTag");
        Route::put('header/{inspection}/update-updatePhotoShippingMark', 'InspectionController@updatePhotoShippingMark')->name("updatePhotoShippingMark");
        Route::put('header/{inspection}/update-updatePhotoPolybag', 'InspectionController@updatePhotoPolybag')->name("updatePhotoPolybag");
        Route::put('header/{inspection}/update-updatePhotoMainLabel', 'InspectionController@updatePhotoMainLabel')->name("updatePhotoMainLabel");
        Route::put('header/{inspection}/update-updatePhotoFrontSide', 'InspectionController@updatePhotoFrontSide')->name("updatePhotoFrontSide");
        Route::put('header/{inspection}/update-updatePhotoBackSide', 'InspectionController@updatePhotoBackSide')->name("updatePhotoBackSide");

        Route::put('header/{inspection}/update-updatePhotoImage1', 'InspectionController@updatePhotoImage1')->name("updatePhotoImage1");

        Route::put('header/{inspection}/update-updatePhotoPView', 'InspectionController@updatePhotoPView')->name("updatePhotoPView");
        Route::put('header/{inspection}/update-updatePhotoSView', 'InspectionController@updatePhotoSView')->name("updatePhotoSView");
        Route::put('header/{inspection}/update-updatePhotoCSample', 'InspectionController@updatePhotoCSample')->name("updatePhotoCSample");

        Route::put('header/{inspection}/update-updatePhotoM1', 'InspectionController@updatePhotoM1')->name("updatePhotoM1");
        Route::put('header/{inspection}/update-updatePhotoM2', 'InspectionController@updatePhotoM2')->name("updatePhotoM2");
        Route::put('header/{inspection}/update-updatePhotoM3', 'InspectionController@updatePhotoM3')->name("updatePhotoM3");
        Route::put('header/{inspection}/update-updatePhotoM4', 'InspectionController@updatePhotoM4')->name("updatePhotoM4");
        Route::put('header/{inspection}/update-updatePhotoM5', 'InspectionController@updatePhotoM5')->name("updatePhotoM5");

        
        Route::get('photos/{inspection}', 'InspectionController@photos')->name("finali.photos");
        Route::get('defects/{inspection}', 'InspectionController@defects')->name("finali.defects");
        Route::get('quality/{inspection}', 'InspectionController@quality')->name("finali.quality");
        Route::get('conclusion/{inspection}', 'InspectionController@conclusion')->name("finali.conclusion");

    });

    Route::group(['prefix'=>'Inspection-Report'], function(){
        // Report
        Route::get('monthly', 'InspectionReportController@monthly')->name("monthly.report");

    });
});