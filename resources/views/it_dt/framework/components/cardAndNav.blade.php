@extends("layouts.app")
@section("title","Components Card Navigation")
@push("styles")
  <link rel="stylesheet" href="{{asset('/common/sass/dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('/common/css/style-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('common/js/code_snippets/theme.css')}}">
@endpush

@push("sidebar")
    @include('it_dt.framework.partials.navbar')
@endpush

@section("content")

<section class="content">
  <div class="container-fluid pb-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="title-22 text-left mb-2">Components - Card Navigation</div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Card Sub Menu Navigation</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card">
                    <a href="#" class="main-col-3">
                        <div class="main-cards bg-main pd-main h-240">
                            <div class="row">
                                <div class="col-12">
                                    <i class="main-icon fas fa-file-alt"></i>
                                    <div class="main-name">System Name</div>
                                    <div class="main-desc">Your System Descriptions</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="main-col-3">
                        <div class="main-cards bg-main pd-main h-240">
                            <div class="row">
                                <div class="col-12">
                                    <i class="main-icon fas fa-file-alt"></i>
                                    <div class="main-name">System Name</div>
                                    <div class="main-desc">Your System Descriptions</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <pre>
                    <code>
&lt;a href="#" class="main-col-3"&gt;
    &lt;div class="main-cards bg-main pd-main h-240"&gt;
        &lt;div class="row"&gt;
            &lt;div class="col-12"&gt;
                &lt;i class="main-icon fas fa-file-alt"&gt;&lt;/i&gt;
                &lt;div class="main-name"&gt;System Name&lt;/div&gt;
                &lt;div class="main-desc"&gt;Your System Descriptions&lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/a&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Navigation Card with drag and drop</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card">
                  <div class="row w-100" id="project">
                    <a href="#" class="col-md-2 cardZ" draggable="true">
                      <div class="cardFlat hover active p-3 mt-2">
                        <div class="containerDoc mb-3">
                          <div class="containerIcon">
                            <i class="fas fa-file-contract"></i>
                          </div>
                          <div class="dragButton">
                            <i class="fs-16 fas fa-ellipsis-v"></i>
                          </div>
                        </div>
                        <div class="title-16-dark3">AQL</div>
                        <div class="title-12-grey mt-1">120 Contract</div>
                      </div>
                    </a>
                    <a href="#" class="col-md-2 cardZ" draggable="true">
                      <div class="cardFlat hover p-3 mt-2">
                        <div class="containerDoc mb-3">
                          <div class="containerIcon">
                            <i class="fas fa-calculator"></i>
                          </div>
                          <div class="dragButton">
                            <i class="fs-16 fas fa-ellipsis-v"></i>
                          </div>
                        </div>
                        <div class="title-16-dark3">PERHITUNGAN</div>
                        <div class="title-12-grey mt-1">Standard For Shipping</div>
                      </div>
                    </a>
                    <a href="#" class="col-md-2 cardZ" draggable="true">
                      <div class="cardFlat hover p-3 mt-2">
                        <div class="containerDoc mb-3">
                          <div class="containerIcon">
                            <i class="fas fa-file-alt"></i>
                          </div>
                          <div class="dragButton">
                            <i class="fs-16 fas fa-ellipsis-v"></i>
                          </div>
                        </div>
                        <div class="title-16-dark3">CHECK</div>
                        <div class="title-12-grey mt-1">Inspection Report</div>
                      </div>
                    </a>
                  </div>
                </div>
                <pre>
                    <code>
&lt;div class="row" id="project"&gt;
  &lt;div class="col-12"&gt;
    &lt;img src="#" class="aql-bg"&gt;
  &lt;/div&gt;
  &lt;a href="{{ route('aql.list')}}" class="col-md-2 cardZ" draggable="true"&gt;
    &lt;div class="cardFlat hover active p-3 mt-2"&gt;
      &lt;div class="containerDoc mb-3"&gt;
        &lt;div class="containerIcon"&gt;
          &lt;i class="fas fa-file-contract"&gt;&lt;/i&gt;
        &lt;/div&gt;
        &lt;div class="dragButton"&gt;
          &lt;i class="fs-16 fas fa-ellipsis-v"&gt;&lt;/i&gt;
        &lt;/div&gt;
      &lt;/div&gt;
      &lt;div class="title-16-dark3"&gt;AQL&lt;/div&gt;
      &lt;div class="title-12-grey mt-1"&gt;120 Contract&lt;/div&gt;
    &lt;/div&gt;
  &lt;/a&gt;
&lt;/div&gt;

// SCRIPT

&lt;script type="text/javascript"&gt;
    document.addEventListener('dragstart', function(){        
        beingDragged(event);
    });
    document.addEventListener('dragend', function(){
        dragEnd(event);
    });
    document.addEventListener('dragover', function(){
       var beingDragged = document.querySelector(".dragging")
      if (event.target.matches('.cardZ')) {
            if (beingDragged.classList.contains('cardZ')) {
              allowDrop(event);
            }
      }
      if (event.target.matches('.col')) {
        if (beingDragged.classList.contains('cardZ')) {
              colDraggedOver(event);
        }
        if (beingDragged.classList.contains('col')) {
          allowDrop(event);
        }
      }
    });
    function beingDragged(ev) {
      var draggedEl = ev.target;
      draggedEl.classList.add("dragging");
    }
    function dragEnd(ev) {
      var draggedEl = ev.target;
      draggedEl.classList.remove("dragging");
    }
    function allowDrop(ev) {
      ev.preventDefault();
      //var project = document.getElementById('project');
      var dragOver = ev.target;
      var dragOverParent = dragOver.parentElement;
      var beingDragged = document.querySelector(".dragging");
      var draggedParent = beingDragged.parentElement;
      var project = document.getElementById("project");
      var draggedIndex = whichChild(beingDragged);
      var dragOverIndex = whichChild(dragOver);
      if (draggedParent === dragOverParent) {
        if (draggedIndex &lt; dragOverIndex) {
          draggedParent.insertBefore(dragOver, beingDragged);
        }
        if (draggedIndex &gt; dragOverIndex) {
          draggedParent.insertBefore(dragOver, beingDragged.nextSibling);
        }
      }
      if (draggedParent !== dragOverParent) {
        dragOverParent.insertBefore(beingDragged, dragOver);
      }
    }
    function colDraggedOver(event) {
      var dragOver = event.target;
      var beingDragged = document.querySelector(".dragging");
      var draggedParent = beingDragged.parentElement;
      if (draggedParent.id !== dragOver.id && draggedParent.classList.contains('col') && dragOver.classList.contains('col')) {
        if (dragOver.childElementCount == 0 || event.clientY &gt; dragOver.children[dragOver.childElementCount - 1].offsetTop) {
          dragOver.appendChild(beingDragged)
        }
      }
      
    }
    function drag(ev) {
      ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
      ev.preventDefault();
      var data = ev.dataTransfer.getData("text");
      ev.target.appendChild(document.getElementById(data));
    }
    function whichChild(el) {
      var i = 0;
      while ((el = el.previousSibling) != null) ++i;
      return i;
    }
&lt;/script&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Navigation Sub Menu </div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card">
                    <a href="#" class="column-2">
                        <div class="title-14 text-left mb-2">on:active</div>
                        <div class="cards nav-card bg-primary h-95 p-3">
                            <i class="icons-active fas fa-file-alt"></i>
                            <div class="desc-active">Subname System</div>
                        </div>
                    </a>
                    <a href="#" class="column-2">
                        <div class="title-14 text-left mb-2">regular</div>
                        <div class="cards nav-card h-95 p-3">
                            <i class="icons fas fa-file-alt"></i>
                            <div class="desc">Subname System</div>
                        </div>
                    </a>
                </div>
                <pre>
                    <code>
&lt;a href="#" class="column-2"&gt;
    &lt;div class="title-14 text-left mb-2"&gt;on:active&lt;/div&gt;
    &lt;div class="cards nav-card bg-primary h-95 p-3"&gt;
        &lt;i class="icons-active fas fa-file-alt"&gt;&lt;/i&gt;
        &lt;div class="desc-active"&gt;Subname System&lt;/div&gt;
    &lt;/div&gt;
&lt;/a&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Navigation Card </div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card">
                    <div class="row">
                        <div class="col-12">
                            <div class="title-16-dark-blue2 mb-2">OTHER MENU</div>
                            <a href="" class="navMenu">
                            <div class="kiri">
                                <i class="fas fa-vector-square"></i>
                            </div>
                            <div class="kanan">
                                <div class="title">Framework</div>
                                <div class="sub-title">Reference guide</div>
                            </div>
                            </a>
                            <a href="" class="navMenu">
                            <div class="kiri">
                                <i class="fas fa-robot"></i>
                            </div>
                            <div class="kanan">
                                <div class="title">RPA</div>
                                <div class="sub-title">Robotic Process Automation</div>
                            </div>
                            </a>
                            <a href="" class="navMenu active">
                            <div class="kiri">
                                <i class="fas fa-user-lock"></i>
                            </div>
                            <div class="kanan">
                                <div class="title">Role Management</div>
                                <div class="sub-title">Setting system access</div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;a href="" class="navMenu active"&gt;
    &lt;div class="kiri"&gt;
        &lt;i class="fas fa-user-lock"&gt;&lt;/i&gt;
    &lt;/div&gt;
    &lt;div class="kanan"&gt;
        &lt;div class="title"&gt;Role Management&lt;/div&gt;
        &lt;div class="sub-title"&gt;Setting system access&lt;/div&gt;
    &lt;/div&gt;
&lt;/a&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Navigation & Tabs V1</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card2">
                    <ul class="nav nav-tabs sch-md-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item-show">
                            <a class="nav-link relative active" data-toggle="tab" href="#titleOne" role="tab"></i>
                                <i class="fs-28 fas fa-file"></i>
                                <div class="f-14">Tab Title</div>
                                <span class="tabs-badge">2</span>
                            </a>
                            <div class="sch-slide"></div>
                        </li>
                        <li class="nav-item-show">
                            <a class="nav-link relative" data-toggle="tab" href="#titleTwo" role="tab"></i>
                                <i class="fs-28 fas fa-file-alt"></i>
                                <div class="f-14">Tab Title</div>
                                <span class="tabs-badge">12</span>
                            </a>
                            <div class="sch-slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="titleOne" role="tabpanel">
                            Title One
                        </div>
                        <div class="tab-pane " id="titleTwo" role="tabpanel">
                            Title Two
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;ul class="nav nav-tabs sch-md-tabs mb-4" id="myTab" role="tablist"&gt;
    &lt;li class="nav-item-show"&gt;
        &lt;a class="nav-link relative active" data-toggle="tab" href="#titleOne" role="tab"&gt;&lt;/i&gt;
            &lt;i class="fs-28 fas fa-file"&gt;&lt;/i&gt;
            &lt;div class="f-14"&gt;Tab Title&lt;/div&gt;
            &lt;span class="tabs-badge"&gt;2&lt;/span&gt;
        &lt;/a&gt;
        &lt;div class="sch-slide"&gt;&lt;/div&gt;
    &lt;/li&gt;
    &lt;li class="nav-item-show"&gt;
        &lt;a class="nav-link relative" data-toggle="tab" href="#titleTwo" role="tab"&gt;&lt;/i&gt;
            &lt;i class="fs-28 fas fa-file-alt"&gt;&lt;/i&gt;
            &lt;div class="f-14"&gt;Tab Title&lt;/div&gt;
            &lt;span class="tabs-badge"&gt;12&lt;/span&gt;
        &lt;/a&gt;
        &lt;div class="sch-slide"&gt;&lt;/div&gt;
    &lt;/li&gt;
&lt;/ul&gt;
&lt;div class="tab-content card-block"&gt;
    &lt;div class="tab-pane active" id="titleOne" role="tabpanel"&gt;
        Title One
    &lt;/div&gt;
    &lt;div class="tab-pane " id="titleTwo" role="tabpanel"&gt;
        Title Two
    &lt;/div&gt;
&lt;/div&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Navigation & Tabs V2</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card2">
                    <ul class="nav nav-tabs blue-md-tabs mb-4" role="tablist">
                        <li class="nav-item-show">
                            <a class="nav-link active" data-toggle="tab" href="#tabOne" role="tab"></i>Tab One</a>
                            <div class="blue-slide"></div>
                        </li>
                        <li class="nav-item-show">
                            <a class="nav-link" data-toggle="tab" href="#tabTwo" role="tab"></i>Tab Two</a>
                            <div class="blue-slide"></div>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="tabOne" role="tabpanel">
                            1
                        </div>
                        <div class="tab-pane" id="tabTwo" role="tabpanel">
                            2
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
 
&lt;ul class="nav nav-tabs blue-md-tabs mb-4" role="tablist"&gt;
    &lt;li class="nav-item-show"&gt;
        &lt;a class="nav-link active" data-toggle="tab" href="#tabOne" role="tab"&gt;&lt;/i&gt;Tab One&lt;/a&gt;
        &lt;div class="blue-slide"&gt;&lt;/div&gt;
    &lt;/li&gt;
    &lt;li class="nav-item-show"&gt;
        &lt;a class="nav-link" data-toggle="tab" href="#tabTwo" role="tab"&gt;&lt;/i&gt;Tab Two&lt;/a&gt;
        &lt;div class="blue-slide"&gt;&lt;/div&gt;
    &lt;/li&gt;
&lt;/ul&gt;
&lt;div class="tab-content card-block"&gt;
    &lt;div class="tab-pane active" id="tabOne" role="tabpanel"&gt;
        1
    &lt;/div&gt;
    &lt;div class="tab-pane" id="tabTwo" role="tabpanel"&gt;
        2
    &lt;/div&gt;
&lt;/div&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="col-12">
            <div class="card-framework">
                <div class="title-inner">Navigation & Tabs V3</div>
                <div class="border-55 mt-1 mb-2"></div>
                <div class="inner-card2 justify-start">
                    <ul class="nav navBlue" role="tablist">
                        <li class="nav-item-show">
                            <a class="nav-link active" data-toggle="tab" href="#tab_one" role="tab"></i>Tab One</a>
                        </li>
                        <li class="nav-item-show">
                            <a class="nav-link" data-toggle="tab" href="#tab_two" role="tab"></i>Tab Two</a>
                        </li>
                    </ul>
                    <div class="tab-content card-block">
                        <div class="tab-pane active" id="tab_one" role="tabpanel">
                            TAB 1
                        </div>
                        <div class="tab-pane" id="tab_two" role="tabpanel">
                            TAB 2
                        </div>
                    </div>
                </div>
                <pre>
                    <code>
&lt;ul class="nav navBlue" role="tablist"&gt;
    &lt;li class="nav-item-show"&gt;
        &lt;a class="nav-link active" data-toggle="tab" href="#tabOne" role="tab"&gt;&lt;/i&gt;Tab One&lt;/a&gt;
    &lt;/li&gt;
    &lt;li class="nav-item-show"&gt;
        &lt;a class="nav-link" data-toggle="tab" href="#tabTwo" role="tab"&gt;&lt;/i&gt;Tab Two&lt;/a&gt;
    &lt;/li&gt;
&lt;/ul&gt;
&lt;div class="tab-content card-block"&gt;
    &lt;div class="tab-pane active" id="tabOne" role="tabpanel"&gt;
        1
    &lt;/div&gt;
    &lt;div class="tab-pane" id="tabTwo" role="tabpanel"&gt;
        2
    &lt;/div&gt;
&lt;/div&gt;
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

<script type="text/javascript">
    document.addEventListener('dragstart', function(){        
        beingDragged(event);
    });
    document.addEventListener('dragend', function(){
        dragEnd(event);
    });
    document.addEventListener('dragover', function(){
       var beingDragged = document.querySelector(".dragging")
      if (event.target.matches('.cardZ')) {
            if (beingDragged.classList.contains('cardZ')) {
              allowDrop(event);
            }
      }
      if (event.target.matches('.col')) {
        if (beingDragged.classList.contains('cardZ')) {
              colDraggedOver(event);
        }
        if (beingDragged.classList.contains('col')) {
          allowDrop(event);
        }
      }
    });
    function beingDragged(ev) {
      var draggedEl = ev.target;
      draggedEl.classList.add("dragging");
    }
    function dragEnd(ev) {
      var draggedEl = ev.target;
      draggedEl.classList.remove("dragging");
    }
    function allowDrop(ev) {
      ev.preventDefault();
      //var project = document.getElementById('project');
      var dragOver = ev.target;
      var dragOverParent = dragOver.parentElement;
      var beingDragged = document.querySelector(".dragging");
      var draggedParent = beingDragged.parentElement;
      var project = document.getElementById("project");
      var draggedIndex = whichChild(beingDragged);
      var dragOverIndex = whichChild(dragOver);
      if (draggedParent === dragOverParent) {
        if (draggedIndex < dragOverIndex) {
          draggedParent.insertBefore(dragOver, beingDragged);
        }
        if (draggedIndex > dragOverIndex) {
          draggedParent.insertBefore(dragOver, beingDragged.nextSibling);
        }
      }
      if (draggedParent !== dragOverParent) {
        dragOverParent.insertBefore(beingDragged, dragOver);
      }
    }
    function colDraggedOver(event) {
      var dragOver = event.target;
      var beingDragged = document.querySelector(".dragging");
      var draggedParent = beingDragged.parentElement;
      if (draggedParent.id !== dragOver.id && draggedParent.classList.contains('col') && dragOver.classList.contains('col')) {
        if (dragOver.childElementCount == 0 || event.clientY > dragOver.children[dragOver.childElementCount - 1].offsetTop) {
          dragOver.appendChild(beingDragged)
        }
      }
      
    }
    function drag(ev) {
      ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
      ev.preventDefault();
      var data = ev.dataTransfer.getData("text");
      ev.target.appendChild(document.getElementById(data));
    }
    function whichChild(el) {
      var i = 0;
      while ((el = el.previousSibling) != null) ++i;
      return i;
    }
</script>

@endpush        