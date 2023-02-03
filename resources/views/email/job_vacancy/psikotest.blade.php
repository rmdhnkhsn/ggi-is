<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style type="text/css">
        body {
            font-family: 'poppins', sans-serif;
        }
        #header{
            background: #FFAC00;
            border-radius: 0px 0px 35px 35px;
            color: white;
            font-size: 20px;
            font-weight: bold;
            padding: 30px;
        }
        
        .headerContainer{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ml-auto {
            margin-left: auto !important;
            margin-top: 5px;
        }

        .mr-auto {
            margin-right: auto !important;
            margin-top: 5px;
        }

        .line {
            width: 3px; 
            height: 40px;
            border-radius: 10px;
            background-color: #fff;
            margin: 0 15px 10px 15px;
        }

        #content{
            padding: 34px;
            background-color: #fff;
        }
        #content .headerContent {
            margin-bottom: 30px;
        }
        #content .headerContent .content {
            font-weight: 600;
            font-size: 14px;
            line-height: 21px;
            color: #2B2B2B;
        }
        
        li {
            list-style: none;
            margin: 0;
        }

        #content .body .paragraph {
            font-weight: 400;
            font-size: 14px;
            line-height: 21px;
            color: #2B2B2B;
            margin: 16px 0;
        }

        #content .body .paragraph .content {
            font-weight: 600;
            font-size: 14px;
            line-height: 21px;
            color: #2B2B2B;
        }
        
        #footer{
            display: grid;
            place-items: center;
            text-align: center;
            width: 100%;
            height: 70px;
            background: #FFAC00;
            color : #fff;
            z-index: 7;
            overflow: hidden;
        }
        .footerContent {
            margin-top: 14px;
        }
        .footerContent .desc1 {
            font-weight: 500;
            font-size: 16px;
            line-height: 22px;
            color : #fff;
        }
        .footerContent .desc2 {
            font-weight: 400;
            font-size: 14px;
            line-height: 21px;
            color : #fff;
        }
        .flex {
            display: flex;
        }
        .btnApprove {
            font-size: 14px;
            font-weight: 600;
            padding: 8px 16px;
            background: linear-gradient(90deg, #0073EE 0%, #429DFF 104.42%);
            color: #fff !important;
            border-radius: 8px;
            border: none;
            text-decoration: none;
        }
        .btnApprove:hover {
            box-shadow: 0px 9px 12px -8px rgba(0, 123, 255, 0.78);
            color: #fff;
        }

        .btnDisapprove {
            font-size: 14px;
            font-weight: 600;
            padding: 8px 16px;
            background: linear-gradient(270deg, #FB5B5B 0%, #FF0000 103.15%);
            color: #fff !important;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            margin-left: 8px;
        }
        .btnDisapprove:hover {
            box-shadow: 0px 9px 12px -8px rgba(255, 0, 0, 0.78);
            color: #fff;
        }
    </style>
</head>
<body>
    <div id="header">
        <div class="headerContainer">
            <div class="ml-auto">GGI-IS</div>
            <div class="line"></div>
            <div class="mr-auto">PT GISTEX GARMEN INDONESIA</div>
        </div>
    </div>
        
    <div id="content">
        <div class="headerContent">
            <div class="content">Dear {{$person->nama}}.</div>
        </div>
        <div class="body">
            <div class="paragraph">
                Congratulation! You becoming selected to the next step of the test
            </div>
            <div class="paragraph">
                We are from HRD PT. Gistex Garmen Indonesia. We invite you to carry out the

                @if($person->double_test == "No")
                {{$input['status']}} 
                @else
                Psychological and Technical Test (Lectra)
                @endif

                for <font style="font-weight: 700;">{{$input['posisi']}} .</font>
            </div>
            <div class="paragraph">
                The agenda will be held on 
                <font style="font-weight: 700;">
                {{$input['tanggal']}} 

                @if($input['location'] == "Offline") 
                at PT. Gistex Garmen Indonesia which is located at Jl. Panyawungan KM 19 Kec. Cileunyi Kab. Bandung.
                @else 
                via Zoom Meeting. 
                @endif 
                </font>
            </div>
            <div class="paragraph">
                Please immediately confirm your attendance by replying to this e-mail (recruitmentgistex@gistexgroup.com).
            </div>
            @if($input['location'] == "Offline")
            <div class="paragraph">
                Note:
                Please kindly prepare your second vaccine certificate (or rapid test antigen result) and make sure you use a standard mask when visiting our office
            </div>
            @endif
            <div class="paragraph">
                Thank you. 
            </div>
        </div>
    </div>

    <div id="footer">
        <div class="footerContent">
            <div class="desc1">Copyright &copy; {{date('Y')}} PT. Gistex Garmen Indonesia | Digital Transformation</div>
            <div class="desc2">Email ini terkirim otomatis dari sistem GCC</div>
        </div>
    </div>
</body>
</html>