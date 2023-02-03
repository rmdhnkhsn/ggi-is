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
                <form class="form-vertical" method="POST" action="{{ route('forget.password.post') }}">
                    @csrf
                    <div class="block centered">
                        <a href="{{url('/')}}">
                            <img src="{{url('images/iconpack/login/logo.svg')}}" class="logo2">
                        </a>
                    </div>
                    <div class="cards reset">
                        <div class="title">Reset Password</div>
                        <div class="sub-title">Enter your valid email for reset the password</div>
                        <div class="block" style="margin-top:2.8rem">
                            <div class="title-form">Email</div>
                            <input type="text" class="form-control border-input" name="email" id="email" placeholder="Enter your email" required>
                        </div>
                        @if ($errors->has('email'))
                            <div class="incorrect">*{{ $errors->first('email') }}</div>  
                        @endif
                        <div class="block mt-4">
                            <button type="submit" class="btn-blue">Reset Password</button>
                        </div>
                        <div class="block text-center mt-3">
                            <a href="{{ route('login') }}" class="forgot">Login</a>
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

