<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubkonWO extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "t_v560021";
    protected $primaryKey = 'F560021_DSC2';

    protected $fillable = [
    //    'F4111_UKID',//UNIKEY ID
    //    'F4111_MCU',//BISNIS UNIT/BRANCH
    //    'F4111_DOC',//DOCUMENT NUMBER
    //    'F4111_DOC',//DOCUMENT TYPE
    //    'F4111_TRDJ',//ORDER DATE /TRANSACTION DATE
    //    'F4111_LITM',
    //    'F4111_TRQT',//TRANSCATION QTY
    //    'F4111_UNCS',//UNIT COST
    //    'F4111_PAID',//EXTENDET COST
    //    'F4111_TRUM',//TRANSACTION UoM
    //    'F4111_KCO',//DOC CO
    //    'F4111_DOCO',//ORDER NUMBER (WO)
    //    'F4111_KCOO',//ORDER CO
    //    'F4111_GLPT',//CLASS CODE
    //    'F4111_DGL',//GL DATE
    //    'F4111_LOCN',//LOCATION
    //    'F4111_LOTN',//LOT/SERIAL
    ];
}
