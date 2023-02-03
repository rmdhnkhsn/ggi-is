  <div class="cards-part">
    <div class="cards-head">
      <div class="justify-sb3">
        <div class="title-24-grey no-wrap">INSPECTION REPORT</div>
        <div class="containerSearch">
          <input type="text" class="form-control borderInput" id="DTtableSearch2" placeholder="Search..."><i class="srch fas fa-search"></i>
        </div>
      </div>
    </div>
    <div class="cards-body">
      <div class="row">
        <div class="col-12 pb-5">
          <div class="cards-scroll scrollX" id="scroll-bar">
            <table id="DTtable2" class="tables3 tbl-content-cost no-wrap">
              <thead>
                <tr class="bg-thead2">
                  <th width="30px">NO</th>
                  <th>MATSUOKA CTRA NO </th>
                  <th>STYLE NO</th>
                  <th>MIYAMORI MNO</th>
                  <th>COLOR</th>
                  <th width="100px">CREATE REPORT</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>1G22M60011</td>
                  <td>ATA-850.</td>
                  <td>M01217</td>
                  <td>IN, EM, CL</td>
                  <td>
                    <div class="container-tbl-btn flex gap-2">
                      <a href="" class="btn-icon-green" style="height:35px;width:35px" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Export"><i class="fs-18 fas fa-file-excel"></i></a>
                      <a href="{{ route('aql.edit.check')}}" class="btn-icon-yellow" style="height:35px;width:35px" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Edit"><i class="fs-18 fas fa-pencil-alt"></i></a>
                      <a href="" class="btn-icon-pink deleteFile" style="height:35px;width:35px" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Delete"><i class="fs-18 fas fa-trash"></i></a>
                    </div>
                  </td>
                </tr>
              </tbody> 
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>