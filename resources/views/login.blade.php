@extends("layouts.blank.app")
@section("title","Login")
@push("styles")
    <link rel="stylesheet" href="{{asset('/common/css/singleStyle/login.css')}}">
@endpush

@section("content")
<section class="content" id="disableScroll">
    <div class="container-fluid">
        <img src="{{url('images/iconpack/login/aksen.svg')}}" class="background">
        <img src="{{url('images/iconpack/login/aksen2.svg')}}" class="background2">
        <div class="container">
            <div class="leftSide">
                <div class="grid">
                    <div class="block">
                        <a href="{{url('/')}}">
                            <img src="{{url('images/iconpack/login/logo.svg')}}" class="logo">
                        </a>
                    </div>
                    <div class="block">
                        <div class="text">Enterprise Resource Planning<br/> system PT. Gistex Garment<br/> Indonesia.</div>
                    </div>
                    <div class="block">
                        <img src="{{url('images/iconpack/login/gisca.svg')}}" class="giscaImg">
                    </div>
                </div>
            </div>
            <div class="rightSide">
                <form class="form-vertical" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="block centered">
                        <a href="{{url('/')}}">
                            <img src="{{url('images/iconpack/login/logo.svg')}}" class="logo2">
                        </a>
                    </div>
                    <div class="cards">
                        <div class="title">Sign In as Employee</div>
                        <div class="sub-title">Hey, Enter the NIK & Password registered with GCC or HRIS to enter your account.</div>
                        <div class="block mb-3 mtForm">
                            <div class="title-form">NIK</div>
                            <input type="text" class="form-control borderInput" name="nik" id="nik" placeholder="Enter Your NIK" required>
                        </div>
                        <div class="block">
                            <div class="title-form">Password</div>
                            <input type="password" class="form-control borderInput" name="password" id="password" placeholder="Password" required>
                        </div>
                        @if ($message = Session::get('error'))
                            <div class="incorrect">*{{ $message }}</div>  
                        @endif
                        <div class="block mt-4">
                            <button type="submit" class="btn-blue">Sign In</button>
                        </div>
                        <div class="block text-center mt-3">
                            <a href="{{ route('forget.password.get') }}" class="forgot">Forgot Password..?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <img src="{{url('images/iconpack/login/gisca.svg')}}" class="giscaImg2">
        <div class="footer">
            <div class="txt">Copyright &copy; 2022. Gistex Garmen Indonesia</div>
            <div class="txt strip">-</div>
            <div class="txt">Command Center (GCC)</div> 
        </div>
    </div>
</section>
@endsection
@push("scripts")

<script>
    document.getElementById('disableScroll').addEventListener('wheel', event => {
    if (event.ctrlKey) {
        event.preventDefault()
    }
    }, true)
</script>

@endpush

