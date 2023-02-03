@extends("layouts.app")
@section("title","Framework")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/assets/plugins/select2/css/select2Grey.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/plugins/dateRangePicker.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/plugins/calendar/zabuto_calendar.css')}}">
  <link rel="stylesheet" href="{{asset('common/js/code_snippets/theme.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.framework.partials.navbar')
@endpush

@section("content")

<section class="content">
  <div class="container-fluid pb-4">
    <div class="row mb-4">
        <div class="col-md-6 accordionIcon">
            <div class="title-22 text-left mb-2">Accordion Danger Icon</div>
            <div class="accordionItem">
              <header class="accordionHeaders">
                <div class="dangerIcon">
                  <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="justify-sb w-100">
                  <div class="judul no-wrap">TARGET TIDAK TERCAPAI</div>
                  <div class="icons">
                    <div class="chevron">
                      <i class="fas fa-angle-left"></i>
                    </div>
                  </div>
                </div>
              </header>
              <div class="accordionContents">
                <div class="bodyContent">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-12">
                        <div class="card-close-pink mt-2 py-1 px-2">
                          <div class="title-12-grey3">BERIKUT DAFTAR TARGET TIDAK TERCAPAI LINE SEWING</div>
                          <div class="justify-sb">
                            <div class="txt-pink">**Silahkan isi alasan, Kenapa tidak tercapainya target pada tanggal tersebut.</div>
                            <button type="button" class="close-icon" data-effect="fadeOut" style="margin-top:-8px"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mt-3">
                        <div class="cards-scroll scrollY maxh-300" id="scroll-bar-sm">
                          <table class="tables3 tbl-content-cost no-wrap">
                            <thead class="stickyHeader bg-thead2">
                              <tr>
                                <th>FACTORY</th>
                                <th>LINE</th>
                                <th>TANGGAL</th>
                                <th>ALASAN</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Factory 1</td>
                                <td>Line 1</td>
                                <td>Alasan 1</td>
                                <td>
                                  <div class="container-tbl-btn">
                                    <select class="form-control borderInput select2bs4 pointer" name="reason[]">
                                      <option value="" selected disabled>Pilih Alasan</option>
                                      <option value="Mesin rusak">Mesin rusak</option>  
                                      <option value="Tunggu mika">Tunggu mika</option>  
                                      <option value="Output persiapan kurang">Output persiapan kurang</option>  
                                      <option value="Absensi">Absensi</option>  
                                      <option value="Ganti style">Ganti style</option>  
                                      <option value="Quality issue">Quality issue</option> 
                                      <option value="Kurang supply hanca cutting">Kurang supply hanca cutting</option>    
                                      <option value="Temporary order, style berikutnya belum siap">Temporary order, style berikutnya belum siap</option>    
                                      <option value="Ganti reject / mengerjakan balance order">Ganti reject / mengerjakan balance order</option>    
                                      <option value="Issue preparation (material blm datang, belum PPM, belum approve jalan produksi)">Issue preparation (material blm datang, belum PPM, belum approve jalan produksi)</option>     
                                      <option value="Target tercapai, cost tidak">Target tercapai, cost tidak</option>
                                    </select>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="borderLight"></div>
                    <div class="accordionFooter">
                      <button type="submit" class="btn-blue-md">Simpan <i class="fs-18 ml-2 fas fa-caret-right"></i></button>
                    </div>
                  </form>
                </div>
              </div> 
            </div>
            <div class="accordionItem">
              <header class="accordionHeaders">
                <div class="dangerIcon">
                  <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="justify-sb w-100">
                  <div class="judul no-wrap">TARGET TIDAK TERCAPAI</div>
                  <div class="icons">
                    <div class="chevron">
                      <i class="fas fa-angle-left"></i>
                    </div>
                  </div>
                </div>
              </header>
              <div class="accordionContents">
                <div class="bodyContent">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-12">
                        <div class="card-close-pink mt-2 py-1 px-2">
                          <div class="title-12-grey3">BERIKUT DAFTAR TARGET TIDAK TERCAPAI LINE SEWING</div>
                          <div class="justify-sb">
                            <div class="txt-pink">**Silahkan isi alasan, Kenapa tidak tercapainya target pada tanggal tersebut.</div>
                            <button type="button" class="close-icon" data-effect="fadeOut" style="margin-top:-8px"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mt-3">
                        <div class="cards-scroll scrollY maxh-300" id="scroll-bar-sm">
                          <table class="tables3 tbl-content-cost no-wrap">
                            <thead class="stickyHeader bg-thead2">
                              <tr>
                                <th>FACTORY</th>
                                <th>LINE</th>
                                <th>TANGGAL</th>
                                <th>ALASAN</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Factory 1</td>
                                <td>Line 1</td>
                                <td>Alasan 1</td>
                                <td>
                                  <div class="container-tbl-btn">
                                    <select class="form-control borderInput select2bs4 pointer" name="reason[]">
                                      <option value="" selected disabled>Pilih Alasan</option>
                                      <option value="Mesin rusak">Mesin rusak</option>  
                                      <option value="Tunggu mika">Tunggu mika</option>  
                                      <option value="Output persiapan kurang">Output persiapan kurang</option>  
                                      <option value="Absensi">Absensi</option>  
                                      <option value="Ganti style">Ganti style</option>  
                                      <option value="Quality issue">Quality issue</option> 
                                      <option value="Kurang supply hanca cutting">Kurang supply hanca cutting</option>    
                                      <option value="Temporary order, style berikutnya belum siap">Temporary order, style berikutnya belum siap</option>    
                                      <option value="Ganti reject / mengerjakan balance order">Ganti reject / mengerjakan balance order</option>    
                                      <option value="Issue preparation (material blm datang, belum PPM, belum approve jalan produksi)">Issue preparation (material blm datang, belum PPM, belum approve jalan produksi)</option>     
                                      <option value="Target tercapai, cost tidak">Target tercapai, cost tidak</option>
                                    </select>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="borderLight"></div>
                    <div class="accordionFooter">
                      <button type="submit" class="btn-blue-md">Simpan <i class="fs-18 ml-2 fas fa-caret-right"></i></button>
                    </div>
                  </form>
                </div>
              </div> 
            </div>
        </div>
        <div class="col-md-6">
            <div class="title-22 opacity-0 mb-2">Script</div>
            <div class="card-framework2">
                <pre>
                    <code style="height:416px" id="scroll-bar-sm">
// accordionIcon
&lt;div class="accordionItem"&gt;
  &lt;header class="accordionHeaders"&gt;
    &lt;div class="dangerIcon"&gt;
      &lt;i class="fas fa-exclamation-triangle"&gt;&lt;/i&gt;
    &lt;/div&gt;
    &lt;div class="justify-sb w-100"&gt;
      &lt;div class="judul no-wrap"&gt;TARGET TIDAK TERCAPAI&lt;/div&gt;
      &lt;div class="icons"&gt;
        &lt;div class="chevron"&gt;
          &lt;i class="fas fa-angle-left"&gt;&lt;/i&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/header&gt;
  &lt;div class="accordionContents"&gt;
    &lt;div class="bodyContent"&gt;
        CONTENT !!!
    &lt;/div&gt;
  &lt;/div&gt; 
&lt;/div&gt;

// Javascript
&lt;script&gt;
  $( document ).ready(function() {
    const toggleItem = (item) =&gt;{
      const accordionContent = item.querySelector('.accordionContents')

      if(item.classList.contains('accordion-open')){
        accordionContent.removeAttribute('style')
        item.classList.remove('accordion-open')
      }else{
        accordionContent.style.height = accordionContent.scrollHeight + 'px'
        item.classList.add('accordion-open')
      }
    }

    const accordionItem = document.querySelectorAll('.accordionItem')
    const openItem = document.querySelector('.accordion-open')
    toggleItem(accordionItem[0])
    if(openItem && openItem!== item){
      toggleItem(openItem)
    }

    accordionItem.forEach((item) =&gt;{
      const accordionHeader = item.querySelector('.accordionHeaders')

      accordionHeader.addEventListener('click', () =&gt;{
        const openItem = document.querySelector('.accordion-open')
        
        toggleItem(item)

        if(openItem && openItem!== item){
            toggleItem(openItem)
        }
      })
    })
  });
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-md-6 accordionFlat">
            <div class="title-22 text-left mb-2">Accordion Flat</div>
            <div class="accordionItems">
              <header class="accordionHeaders">
                <div class="title-16-dark3">TYPE OF DEFECT</div>
                <div class="icons">
                  <div class="chevron">
                    <i class="fas fa-angle-left"></i>
                  </div>
                </div>
              </header>
              <div class="accordionContents">
                <div class="bodyContent">
                  CONTENT HERE !!!
                </div>
              </div>
            </div>
            <div class="accordionItems">
              <header class="accordionHeaders">
                <div class="title-16-dark3">TYPE OF DEFECT</div>
                <div class="icons">
                  <div class="chevron">
                    <i class="fas fa-angle-left"></i>
                  </div>
                </div>
              </header>
              <div class="accordionContents">
                <div class="bodyContent">
                  CONTENT HERE !!!
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="title-22 opacity-0 mb-2">Script</div>
            <div class="card-framework2">
                <pre>
                    <code style="height:416px" id="scroll-bar-sm">
// accordionFlat
&lt;div class="accordionItems"&gt;
  &lt;header class="accordionHeaders"&gt;
    &lt;div class="title-16-dark3"&gt;TYPE OF DEFECT&lt;/div&gt;
    &lt;div class="icons"&gt;
      &lt;div class="chevron"&gt;
        &lt;i class="fas fa-angle-left"&gt;&lt;/i&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/header&gt;
    &lt;div class="accordionContents"&gt;
      &lt;div class="bodyContent"&gt;
        CONTENT HERE !!!
      &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;

// Javascript
&lt;script&gt;
  const accordionItems = document.querySelectorAll('.accordionItems')

  accordionItems.forEach((item) =&gt;{
    const accordionHeader = item.querySelector('.accordionHeaders')

    accordionHeader.addEventListener('click', () =&gt;{
      const openItem = document.querySelector('.accordion-open')
      
      toggleItem(item)

      if(openItem && openItem!== item){
          toggleItem(openItem)
      }
    })
  })

  const toggleItem = (item) =&gt;{
    const accordionContent = item.querySelector('.accordionContents')

    if(item.classList.contains('accordion-open')){
      accordionContent.removeAttribute('style')
      item.classList.remove('accordion-open')
    }else{
      accordionContent.style.height = accordionContent.scrollHeight + 'px'
      item.classList.add('accordion-open')
    }
  }
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-md-6 accordionRound">
          <div class="title-22 text-left mb-2">Accordion Round</div>
          <div class="accordionItems">
            <header class="accordionHeaders h-68">
              <div class="title-24-grey">Size : SS</div>
              <div class="icons2 ml-auto">
                <div class="chevron">
                  <i class="fas fa-angle-left"></i>
                </div>
              </div>
            </header>
            <div class="accordionContents">
              <div class="bodyContent">
                CONTENT HERE !!!
              </div>
            </div>
          </div>
          <div class="accordionItems">
            <header class="accordionHeaders h-68">
              <div class="title-24-grey">Size : MM</div>
              <div class="icons2 ml-auto">
                <div class="chevron">
                  <i class="fas fa-angle-left"></i>
                </div>
              </div>
            </header>
            <div class="accordionContents">
              <div class="bodyContent">
                CONTENT HERE !!!
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
            <div class="title-22 opacity-0 mb-2">Script</div>
            <div class="card-framework2">
                <pre>
                  <code style="height:416px" id="scroll-bar-sm">
// accordionRound
&lt;div class="accordionItems"&gt;
  &lt;header class="accordionHeaders"&gt;
    &lt;div class="title-16-dark3"&gt;TYPE OF DEFECT&lt;/div&gt;
    &lt;div class="icons"&gt;
      &lt;div class="chevron"&gt;
        &lt;i class="fas fa-angle-left"&gt;&lt;/i&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/header&gt;
    &lt;div class="accordionContents"&gt;
      &lt;div class="bodyContent"&gt;
        CONTENT HERE !!!
      &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;

// Javascript
&lt;script&gt;
  const accordionItems = document.querySelectorAll('.accordionItems')

  accordionItems.forEach((item) =&gt;{
    const accordionHeader = item.querySelector('.accordionHeaders')

    accordionHeader.addEventListener('click', () =&gt;{
      const openItem = document.querySelector('.accordion-open')
      
      toggleItem(item)

      if(openItem && openItem!== item){
          toggleItem(openItem)
      }
    })
  })

  const toggleItem = (item) =&gt;{
    const accordionContent = item.querySelector('.accordionContents')

    if(item.classList.contains('accordion-open')){
      accordionContent.removeAttribute('style')
      item.classList.remove('accordion-open')
    }else{
      accordionContent.style.height = accordionContent.scrollHeight + 'px'
      item.classList.add('accordion-open')
    }
  }
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-md-6">
          <div class="title-22 text-left mb-2">Accordion Simple</div>
            <div class="cardFlat p-4">
                <div class="accordionItem3">
                    <header class="accordionHeader3">
                        <div class="title-14-dark2">Header 1</div>
                        <div class="justify-center gap-4">
                            <i class="muter fas fa-plus"></i>
                        </div>
                    </header>
                    <div class="accordionContent3">
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="title-sm">Company</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="company_bene" name="company_bene" placeholder="Input Company">
                            </div>
                            <div class="col-12">
                                <div class="title-sm">Address</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="address_bene" name="address_bene" placeholder="Input Address">
                            </div>
                            <div class="col-12">
                                <div class="title-sm">City</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="city_bene" name="city_bene" placeholder="Input City">
                            </div>
                            <div class="col-12">
                                <div class="title-sm">Country</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="country_bene" name="country_bene" placeholder="Input Country">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordionItem3">
                    <header class="accordionHeader3">
                        <div class="title-14-dark2">Header 2</div>
                        <div class="justify-center gap-4">
                            <i class="muter fas fa-plus"></i>
                        </div>
                    </header>
                    <div class="accordionContent3">
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="title-sm">Company</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="company_bene" name="company_bene" placeholder="Input Company">
                            </div>
                            <div class="col-12">
                                <div class="title-sm">Address</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="address_bene" name="address_bene" placeholder="Input Address">
                            </div>
                            <div class="col-12">
                                <div class="title-sm">City</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="city_bene" name="city_bene" placeholder="Input City">
                            </div>
                            <div class="col-12">
                                <div class="title-sm">Country</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="country_bene" name="country_bene" placeholder="Input Country">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordionItem3">
                    <header class="accordionHeader3">
                        <div class="title-14-dark2">Header 3</div>
                        <div class="justify-center gap-4">
                            <i class="muter fas fa-plus"></i>
                        </div>
                    </header>
                    <div class="accordionContent3">
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="title-sm">Company</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="company_bene" name="company_bene" placeholder="Input Company">
                            </div>
                            <div class="col-12">
                                <div class="title-sm">Address</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="address_bene" name="address_bene" placeholder="Input Address">
                            </div>
                            <div class="col-12">
                                <div class="title-sm">City</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="city_bene" name="city_bene" placeholder="Input City">
                            </div>
                            <div class="col-12">
                                <div class="title-sm">Country</div>
                                <input type="text" class="form-control borderInput mt-1 mb-3" id="country_bene" name="country_bene" placeholder="Input Country">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="title-22 opacity-0 mb-2">Script</div>
            <div class="card-framework2">
                <pre>
                    <code style="height:416px" id="scroll-bar-sm">
&lt;div class="accordionItem3"&gt;
    &lt;header class="accordionHeader3"&gt;
        &lt;div class="title-14-dark2"&gt;Header 3&lt;/div&gt;
        &lt;div class="justify-center gap-4"&gt;
            &lt;i class="muter fas fa-plus"&gt;&lt;/i&gt;
        &lt;/div&gt;
    &lt;/header&gt;
    &lt;div class="accordionContent3"&gt;
        &lt;div class="row mt-2"&gt;
            &lt;div class="col-12"&gt;
                &lt;div class="title-sm"&gt;Company&lt;/div&gt;
                &lt;input type="text" class="form-control borderInput mt-1 mb-3" id="company_bene" name="company_bene" placeholder="Input Company"&gt;
            &lt;/div&gt;
            &lt;div class="col-12"&gt;
                &lt;div class="title-sm"&gt;Address&lt;/div&gt;
                &lt;input type="text" class="form-control borderInput mt-1 mb-3" id="address_bene" name="address_bene" placeholder="Input Address"&gt;
            &lt;/div&gt;
            &lt;div class="col-12"&gt;
                &lt;div class="title-sm"&gt;City&lt;/div&gt;
                &lt;input type="text" class="form-control borderInput mt-1 mb-3" id="city_bene" name="city_bene" placeholder="Input City"&gt;
            &lt;/div&gt;
            &lt;div class="col-12"&gt;
                &lt;div class="title-sm"&gt;Country&lt;/div&gt;
                &lt;input type="text" class="form-control borderInput mt-1 mb-3" id="country_bene" name="country_bene" placeholder="Input Country"&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
// Javascript
&lt;script&gt;
  const accordionItem = document.querySelectorAll('.accordionItem3')
  accordionItem.forEach((item) =&gt;{
    const accordionHeader = item.querySelector('.accordionHeader3')

    accordionHeader.addEventListener('click', () =&gt;{
      const openItem = document.querySelector('.accordion-open')
      
      toggleItem(item)

      if(openItem && openItem!== item){
        toggleItem(openItem)
      }
    })
  })

  const toggleItem = (item) =&gt;{
    const accordionContent = item.querySelector('.accordionContent3')

    if(item.classList.contains('accordion-open')){
      accordionContent.removeAttribute('style')
      item.classList.remove('accordion-open')
    }else{
      accordionContent.style.height = accordionContent.scrollHeight + 'px'
      item.classList.add('accordion-open')
    }
  }
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-md-6">
          <div class="title-22 text-left mb-2">Accordion Bootstrap</div>
          <div class="col-12 accordionFlat">
            <div class="accordionItems" id="accordion">
              <div class="accordionHeaders" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne">
                <div class="title-16-dark3">ALASAN LAINNYA</div>
                <div class="icons">
                  <div class="chevron">
                    <i class="fas fa-angle-left"></i>
                  </div>
                </div>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="bodyContents">
                  <div class="row">
                    <div class="col-12">
                      <div class="title-sm">Alasan</div>
                      <input type="text" class="form-control borderInput mt-1 mb-3" id="what" name="alasan1[]" placeholder="masukkan alasan...">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
            <div class="title-22 opacity-0 mb-2">Script</div>
            <div class="card-framework2">
                <pre>
                    <code style="height:416px" id="scroll-bar-sm">
&lt;div class="col-12 accordionFlat"&gt;
  &lt;div class="accordionItems" id="accordion"&gt;
    &lt;div class="accordionHeaders" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="headingOne"&gt;
      &lt;div class="title-16-dark3"&gt;ALASAN LAINNYA&lt;/div&gt;
      &lt;div class="icons"&gt;
        &lt;div class="chevron"&gt;
          &lt;i class="fas fa-angle-left"&gt;&lt;/i&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"&gt;
      &lt;div class="bodyContents"&gt;
        &lt;div class="row"&gt;
          &lt;div class="col-12"&gt;
            &lt;div class="title-sm"&gt;Alasan&lt;/div&gt;
            &lt;input type="text" class="form-control borderInput mt-1 mb-3" id="what" name="alasan1[]" placeholder="masukkan alasan..."&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;

// Javascript
&lt;script&gt;
  var swing = document.getElementsByClassName("accordionItems");

  for (var i = 0; i &gt; swing.length; i++) {
      swing[i].addEventListener("click", myFunction);
  }

  function myFunction() {
      var parentElement = this.parentElement;

      if (this.classList.length &gt;= 1) {
      this.classList.add("accordion-open");

    } else {
      this.classList.remove("accordion-open");

    }
  }
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection
@push("scripts")
<script src="{{asset('common/js/code_snippets/highlights.js')}}"></script>
<script src="{{asset('common/js/code_snippets/app.js')}}"></script>

<script>
  $( document ).ready(function() {
    const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordionContents')

      if(item.classList.contains('accordion-open')){
        accordionContent.removeAttribute('style')
        item.classList.remove('accordion-open')
      }else{
        accordionContent.style.height = accordionContent.scrollHeight + 'px'
        item.classList.add('accordion-open')
      }
    }

    const accordionItem = document.querySelectorAll('.accordionItem')
    const openItem = document.querySelector('.accordion-open')
    toggleItem(accordionItem[0])
    if(openItem && openItem!== item){
      toggleItem(openItem)
    }

    accordionItem.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordionHeaders')

      accordionHeader.addEventListener('click', () =>{
        const openItem = document.querySelector('.accordion-open')
        
        toggleItem(item)

        if(openItem && openItem!== item){
            toggleItem(openItem)
        }
      })
    })
  });
</script>

<script>
  const accordionItems = document.querySelectorAll('.accordionItems')

  accordionItems.forEach((item) =>{
    const accordionHeader = item.querySelector('.accordionHeaders')

    accordionHeader.addEventListener('click', () =>{
      const openItem = document.querySelector('.accordion-open')
      
      toggleItem(item)

      if(openItem && openItem!== item){
          toggleItem(openItem)
      }
    })
  })

  const toggleItem = (item) =>{
    const accordionContent = item.querySelector('.accordionContents')

    if(item.classList.contains('accordion-open')){
      accordionContent.removeAttribute('style')
      item.classList.remove('accordion-open')
    }else{
      accordionContent.style.height = accordionContent.scrollHeight + 'px'
      item.classList.add('accordion-open')
    }
  }
</script>

<script>
  const accordionItem = document.querySelectorAll('.accordionItem3')
  accordionItem.forEach((item) =>{
    const accordionHeader = item.querySelector('.accordionHeader3')

    accordionHeader.addEventListener('click', () =>{
      const openItem = document.querySelector('.accordion-open')
      
      toggleItem(item)

      if(openItem && openItem!== item){
        toggleItem(openItem)
      }
    })
  })

  const toggleItem = (item) =>{
    const accordionContent = item.querySelector('.accordionContent3')

    if(item.classList.contains('accordion-open')){
      accordionContent.removeAttribute('style')
      item.classList.remove('accordion-open')
    }else{
      accordionContent.style.height = accordionContent.scrollHeight + 'px'
      item.classList.add('accordion-open')
    }
  }
</script>

<!-- Accordion Bootstrap -->
<script>
  var swing = document.getElementsByClassName("accordionItems");

  for (var i = 0; i < swing.length; i++) {
      swing[i].addEventListener("click", myFunction);
  }

  function myFunction() {
      var parentElement = this.parentElement;

      if (this.classList.length <= 1) {
      this.classList.add("accordion-open");

    } else {
      this.classList.remove("accordion-open");

    }
  }
</script>
@endpush        