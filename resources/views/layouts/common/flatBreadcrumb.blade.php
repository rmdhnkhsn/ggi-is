@if(Request::segments(1)[0]!=="home")

<section class="content-header">
    <div class="breadContain">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="title-navigate-home"><i class="fas fa-home fs-18"></i></a></li>
                @php($link=url('/'))
                @for($i = 1; $i <= count(Request::segments()); $i++)
                    @if($i < count(Request::segments()) & $i > 0)
                    @php($link.="/".Request::segment($i))
                    <li class="breadcrumb-item"><a href="{{$link}}" class="title-navigate">{{strtoupper(str_replace('-',' ',BreadcrumbTranslate::generate(Request::segment($i))))}}</a></li>
                    @else 
                    <li class="breadcrumb-item title-navigate-active" aria-current="page">{{strtoupper(str_replace('-',' ',BreadcrumbTranslate::generate(Request::segment($i))))}}</li> 
                    <!-- <li class="navigate-active ml-itdt"></li> -->
                    @endif
                @endfor
            </ol>
        </nav>
    </div>
</section>
@endif

