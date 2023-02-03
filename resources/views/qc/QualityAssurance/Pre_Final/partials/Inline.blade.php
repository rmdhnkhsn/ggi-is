                <div class="row">
                  <div class="col-12 pb-5">
                    <button id="btnSearch"><i class="fas fa-search"></i></button>  
                    <div class="card-close-orange mt-2 py-1 px-2">
                      <div class="txt-orange">Keterangan : Data dibawah ini adalah data QC yang selesai prosess INLINE menunggu diprosess PRE-FINAL</div>
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
                            <th>SAMPLE SIZE</th>
                            <th>PASS</th>
                            <th>FAIL</th>
                            <th>CHECK</th>
                            <th>DEFECT</th>
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
                            <td>L</td>
                            <td>50</td>
                            <td>8</td>
                            <td>8</td>
                            <td>9</td>
                            <td>
                              <button type="button" class="btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a href="{{ route('go.prefinal.index')}}" class="dropdown-item">
                                  <div style="width:28px"><i class="mr-2 fs-18 far fa-arrow-alt-circle-right"></i></div>Pre-Final
                                </a>
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#detailsInline">
                                  <div style="width:28px"><i class="mr-2 fs-18 fas fa-search"></i></div>Details
                                </button>
                              </div>
                            </td> 
                          </tr>
                        </tbody> 
                      </table>
                      @include('qc.QualityAssurance.QA_Inline.details')
                    </div>
                  </div>
                </div>