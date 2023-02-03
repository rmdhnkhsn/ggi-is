  <div class="row">
    <div class="col-12 pb-5">
      <button id="btnSearch"><i class="fas fa-search"></i></button>  
      <div class="card-close-orange mt-2 py-1 px-2">
        <div class="txt-orange">Keterangan : Data dibawah ini adalah data QC FACTORY AUDIT yang telah dibuat.</div>
        <button type="button" class="close-icon" data-effect="fadeOut"><i class="fa fa-times"></i></button>
      </div>
      <div class="cards-scroll scrollX" id="scroll-bar">
        <table id="DTtable2" class="tables3 tbl-content-cost no-wrap">
          <thead>
            <tr class="bg-thead2">
              <th>ID</th>
              <th>INSPECT DATE</th>
              <th>SHIP PERIOD/TOD</th>
              <th>PO NO</th>
              <th>BUYER</th>
              <th>STYLE</th>
              <th>QTY ORDER</th>
              <th>COLOR</th>
              <th>TOTAL PCS</th>
              <th>SAMPLE PCS</th>
              <th>REJECT PCS</th>
              <th>RESULT</th>
              <th class="bg-thead2">ACTION</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>26 January 2022</td>
              <td>14 June 2023</td>
              <td>G22M6130</td>
              <td>CONTEMPO FASHION LTD</td>
              <td>980182</td>
              <td>143</td>
              <td>Yellow.</td>
              <td>50</td>
              <td>8</td>
              <td>8</td>
              <td>9</td>
              <td>
                <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="dropdown-menu">
                  <a href="{{ route('edit.factory.index')}}" class="dropdown-item">
                    <div style="width:28px"><i class="mr-2 fs-18 fas fa-pencil-alt"></i></div>Edit Data 
                  </a>
                  <button type="button" class="dropdown-item" data-toggle="modal" data-target="#detailsFA">
                    <div style="width:28px"><i class="mr-2 fs-18 fas fa-search"></i></div>Details
                  </button>
                  <a href="" class="dropdown-item">
                    <div style="width:28px"><i class="mr-2 fs-18 fas fa-file-excel"></i></div>Download
                  </a>
                  <a href="" class="dropdown-item deleteFile" style="color:#FB5B5B">
                    <div style="width:28px"><i class="mr-2 fs-18 fas fa-trash"></i></div>Delete
                  </a>
                </div>
              </td> 
            </tr>
          </tbody> 
        </table>
        @include('qc.QualityAssurance.Factory_Audit.details')
      </div>
    </div>
  </div>