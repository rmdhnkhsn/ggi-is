@extends("layouts.app")
@section("title","Hourly Remake")
@push("styles")
<link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
@endpush

@section("content")

<section class="content">
  <div class="container-fluid">
    <div class="row hourly">
      <div class="col-12 mb-3">
        <div class="title-32">Today Issue</div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">            
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_1.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Overtime Machine</div>
              <div class="sub-judul">Mesin Rusak</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              <i class="infoDanger infoo fas fa-info"></i>
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            <li class="listGroup2 hoverLB" id="">
              <div class="listContainer marginMinY">
                <div class="number">1</div>
                <div class="descName">
                  <div class="judul1">Nama</div>
                  <div class="judul2 text-truncate">Hendra Sugandi Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore, aliquam?</div>
                </div>
                <div class="hidden flex" style="gap:.8rem">
                  <div class="descList">
                    <div class="judul1">Factory</div>
                    <div class="judul2">GC1</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Line</div>
                    <div class="judul2">6B</div>
                  </div>
                  <div class="descList">
                    <div class="judul1 text-truncate">Elapsed Time</div>
                    <div class="judul2">00:14:56</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Count</div>
                    <div class="judul2">1</div>
                  </div>
                  <div class="descProcess">
                    <div class="judul1">Process</div>
                    <div class="judul2 text-truncate">OVERDECK LIPAT KELIM BAWAH K/K Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, deleniti.</div>
                  </div>
                </div>
                <div class="listDetail">
                  <a href="" data-toggle="modal" data-target="#details"><i class="fas fa-info"></i></a>
                  @include('production.operatorperformance.hourly.partials.detail_1')
                </div>
              </div>
            </li>
            <li class="listGroup2 hoverLB" id="">
              <div class="listContainer marginMinY">
                <div class="number">1</div>
                <div class="descName">
                  <div class="judul1">Nama</div>
                  <div class="judul2 text-truncate">Hendra Sugandi Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore, aliquam?</div>
                </div>
                <div class="hidden flex" style="gap:.8rem">
                  <div class="descList">
                    <div class="judul1">Factory</div>
                    <div class="judul2">GC1</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Line</div>
                    <div class="judul2">6B</div>
                  </div>
                  <div class="descList">
                    <div class="judul1 text-truncate">Elapsed Time</div>
                    <div class="judul2">00:14:56</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Count</div>
                    <div class="judul2">1</div>
                  </div>
                  <div class="descProcess">
                    <div class="judul1">Process</div>
                    <div class="judul2 text-truncate">OVERDECK LIPAT KELIM BAWAH K/K Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, deleniti.</div>
                  </div>
                </div>
                <div class="listDetail">
                  <a href="" data-toggle="modal" data-target="#details"><i class="fas fa-info"></i></a>
                  @include('production.operatorperformance.hourly.partials.detail_1')
                </div>
              </div>
            </li>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">            
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_2.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Lost Time</div>
              <div class="sub-judul">Keperluan Pribadi</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              <!-- <i class="infoDanger infoo fas fa-info"></i> -->
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            <div class="justify-start" style="gap:1.4rem">
              <img src="{{url('images/iconpack/production/no_issue.svg')}}" class="iconIssue">
              <div class="noIssue">No Issue</div>
            </div>
            <!-- <li class="listGroup2" id="">
              <div class="listContainer marginMinY">
                <div class="number">1</div>
                <div class="descName">
                  <div class="judul1">Nama</div>
                  <div class="judul2 text-truncate">Hendra Sugandi Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore, aliquam?</div>
                </div>
                <div class="hidden flex" style="gap:.8rem">
                  <div class="descList">
                    <div class="judul1">Factory</div>
                    <div class="judul2">GC1</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Line</div>
                    <div class="judul2">6B</div>
                  </div>
                  <div class="descList">
                    <div class="judul1 text-truncate">Elapsed Time</div>
                    <div class="judul2">00:14:56</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Count</div>
                    <div class="judul2">1</div>
                  </div>
                  <div class="descProcess">
                    <div class="judul1">Process</div>
                    <div class="judul2 text-truncate">OVERDECK LIPAT KELIM BAWAH K/K Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, deleniti.</div>
                  </div>
                </div>
                <div class="listDetail">
                  <a href="" data-toggle="modal" data-target="#details"><i class="fas fa-info"></i></a>
                  @include('production.operatorperformance.hourly.partials.detail_2')
                </div>
              </div>
            </li> -->
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">            
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_3.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Overload</div>
              <div class="sub-judul">Kelebihan WIP</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              <i class="infoDanger infoo fas fa-info"></i>
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            <li class="listGroup2" id="">
              <div class="listContainer marginMinY">
                <div class="number">1</div>
                <div class="descName">
                  <div class="judul1">Nama</div>
                  <div class="judul2 text-truncate">Hendra Sugandi Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore, aliquam?</div>
                </div>
                <div class="hidden flex" style="gap:.8rem">
                  <div class="descList">
                    <div class="judul1">Factory</div>
                    <div class="judul2">GC1</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Line</div>
                    <div class="judul2">6B</div>
                  </div>
                  <div class="descList">
                    <div class="judul1 text-truncate">Elapsed Time</div>
                    <div class="judul2">00:14:56</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Count</div>
                    <div class="judul2">1</div>
                  </div>
                  <div class="descProcess">
                    <div class="judul1">Process</div>
                    <div class="judul2 text-truncate">OVERDECK LIPAT KELIM BAWAH K/K Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, deleniti.</div>
                  </div>
                </div>
                <div class="listDetail">
                  <a href="" data-toggle="modal" data-target="#details"><i class="fas fa-info"></i></a>
                  @include('production.operatorperformance.hourly.partials.detail_3')
                </div>
              </div>
            </li>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">            
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_4.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Bantuan Teknis</div>
              <div class="sub-judul">Operator Coaching</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              <i class="infoDanger infoo fas fa-info"></i>
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            <li class="listGroup2" id="">
              <div class="listContainer marginMinY">
                <div class="number">1</div>
                <div class="descName">
                  <div class="judul1">Nama</div>
                  <div class="judul2 text-truncate">Hendra Sugandi Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore, aliquam?</div>
                </div>
                <div class="hidden flex" style="gap:.8rem">
                  <div class="descList">
                    <div class="judul1">Factory</div>
                    <div class="judul2">GC1</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Line</div>
                    <div class="judul2">6B</div>
                  </div>
                  <div class="descList">
                    <div class="judul1 text-truncate">Elapsed Time</div>
                    <div class="judul2">00:14:56</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Count</div>
                    <div class="judul2">1</div>
                  </div>
                  <div class="descProcess">
                    <div class="judul1">Process</div>
                    <div class="judul2 text-truncate">OVERDECK LIPAT KELIM BAWAH K/K Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, deleniti.</div>
                  </div>
                </div>
                <div class="listDetail">
                  <a href="" data-toggle="modal" data-target="#details"><i class="fas fa-info"></i></a>
                  @include('production.operatorperformance.hourly.partials.detail_4')
                </div>
              </div>
            </li>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">            
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_5.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Supply Problem</div>
              <div class="sub-judul">Supply Problem</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              <i class="infoDanger infoo fas fa-info"></i>
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            <li class="listGroup2" id="">
              <div class="listContainer marginMinY">
                <div class="number">1</div>
                <div class="descName">
                  <div class="judul1">Nama</div>
                  <div class="judul2 text-truncate">Hendra Sugandi Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore, aliquam?</div>
                </div>
                <div class="hidden flex" style="gap:.8rem">
                  <div class="descList">
                    <div class="judul1">Factory</div>
                    <div class="judul2">GC1</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Line</div>
                    <div class="judul2">6B</div>
                  </div>
                  <div class="descList">
                    <div class="judul1 text-truncate">Elapsed Time</div>
                    <div class="judul2">00:14:56</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Count</div>
                    <div class="judul2">1</div>
                  </div>
                  <div class="descProcess">
                    <div class="judul1">Process</div>
                    <div class="judul2 text-truncate">OVERDECK LIPAT KELIM BAWAH K/K Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, deleniti.</div>
                  </div>
                </div>
                <div class="listDetail">
                  <a href="" data-toggle="modal" data-target="#details"><i class="fas fa-info"></i></a>
                  @include('production.operatorperformance.hourly.partials.detail_5')
                </div>
              </div>
            </li>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="accordionItem2" style="padding:25px">            
          <header class="accordionHeader2 justify-start" style="gap:.8rem">
            <img src="{{url('images/iconpack/production/issue_6.svg')}}" class="iconIssue">
            <div class="description">
              <div class="judul">TOP 5 Rework</div>
              <div class="sub-judul">Perbaikan</div>
            </div>
            <div class="flex ml-auto" style="gap:2.4rem">
              <i class="infoDanger infoo fas fa-info"></i>
              <i class="caret fas fa-chevron-right"></i>
            </div>
          </header>
          <div class="row">
            <div class="col-12 mt-2 mb-3">
              <div class="borderlight"></div>
            </div>
          </div>
          <div class="accordionContent2">
            <li class="listGroup2" id="">
              <div class="listContainer marginMinY">
                <div class="number">1</div>
                <div class="descName">
                  <div class="judul1">Nama</div>
                  <div class="judul2 text-truncate">Hendra Sugandi Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore, aliquam?</div>
                </div>
                <div class="hidden flex" style="gap:.8rem">
                  <div class="descList">
                    <div class="judul1">Factory</div>
                    <div class="judul2">GC1</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Line</div>
                    <div class="judul2">6B</div>
                  </div>
                  <div class="descList">
                    <div class="judul1 text-truncate">Elapsed Time</div>
                    <div class="judul2">00:14:56</div>
                  </div>
                  <div class="descList">
                    <div class="judul1">Count</div>
                    <div class="judul2">1</div>
                  </div>
                  <div class="descProcess">
                    <div class="judul1">Process</div>
                    <div class="judul2 text-truncate">OVERDECK LIPAT KELIM BAWAH K/K Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, deleniti.</div>
                  </div>
                </div>
                <div class="listDetail">
                  <a href="" data-toggle="modal" data-target="#details"><i class="fas fa-info"></i></a>
                  @include('production.operatorperformance.hourly.partials.detail_6')
                </div>
              </div>
            </li>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>
@endsection

@push("scripts")
<script>
  const accordionItems = document.querySelectorAll('.accordionItem2')

  accordionItems.forEach((item) =>{
      const accordionHeader = item.querySelector('.accordionHeader2')

      accordionHeader.addEventListener('click', () =>{
          const openItem = document.querySelector('.accordion-open')
          
          toggleItem(item)

          if(openItem && openItem!== item){
              toggleItem(openItem)
          }
      })
  })

  const toggleItem = (item) =>{
      const accordionContent = item.querySelector('.accordionContent2')

      if(item.classList.contains('accordion-open')){
          accordionContent.removeAttribute('style')
          item.classList.remove('accordion-open')
      }else{
          accordionContent.style.height = accordionContent.scrollHeight + 'px'
          item.classList.add('accordion-open')
      }
  }
</script>
@endpush