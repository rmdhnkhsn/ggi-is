  <div class="cards-part">
    <div class="cards-head">
      <div class="justify-sb3">
        <div class="title-24-grey no-wrap">CREATE INSPECTION REPORT</div>
        <div class="containerSearch">
          <input type="text" class="form-control borderInput" id="DTtableSearch" placeholder="Search..."><i class="srch fas fa-search"></i>
        </div>
      </div>
    </div>
    <div class="cards-body">
      <div class="row">
        <div class="col-12 pb-5">
          <div class="cards-scroll scrollX" id="scroll-bar">
            <table id="DTtable" class="tables3 tbl-content-cost no-wrap">
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
                    <div class="container-tbl-btn">
                      <a href="{{ route('aql.create.check')}}" class="btn-blue-md d-inline-flex">Report <i class="fs-18 ml-2 fas fa-caret-right"></i></a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>1G22M60011</td>
                  <td>ATA-850.</td>
                  <td>M01217</td>
                  <td>IN, EM, CL</td>
                  <td>
                    <div class="container-tbl-btn">
                      <a href="{{ route('aql.create.check')}}" class="btn-blue-md d-inline-flex">Report <i class="fs-18 ml-2 fas fa-caret-right"></i></a>
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