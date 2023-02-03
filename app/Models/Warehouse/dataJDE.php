<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Model;

class dataJDE extends Model
{
    protected $connection = 'mysql_jdeapi';
    protected $table = "materialw";
    protected $primaryKey = 'F4111_UKID';

    protected $fillable = [
       'F4111_UKID',//UNIKEY ID
       'F4111_MCU',//BISNIS UNIT/BRANCH
       'F4111_DOC',//DOCUMENT NUMBER
       'F4111_DOC',//DOCUMENT TYPE
       'F4111_TRDJ',//ORDER DATE /TRANSACTION DATE
       'F4111_LITM',
       'F4111_TRQT',//TRANSCATION QTY
       'F4111_UNCS',//UNIT COST
       'F4111_PAID',//EXTENDET COST
       'F4111_TRUM',//TRANSACTION UoM
       'F4111_KCO',//DOC CO
       'F4111_DOCO',//ORDER NUMBER (WO)
       'F4111_KCOO',//ORDER CO
       'F4111_GLPT',//CLASS CODE
       'F4111_DGL',//GL DATE
       'F4111_LOCN',//LOCATION
       'F4111_LOTN',//LOT/SERIAL
       'F560021_DSC2',//NO KONTRAK
       'F560021_DOC',//WO NUMBER
       'F560021_CFRUPMJ',//DUE DATE 
       'F560021_LITM',//DUE DATE 
       'F0101_AN8',
       'F0101_ALPH',
       'F4311_DOCO',
       'F4311_AN8',
       'F4101_DSC1',
       'F4101_DSC2',
       'F4101_LITM',
       'F4311_DCTO',
    ];
}
