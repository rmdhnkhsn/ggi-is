<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env("APP_NAME")}} - Email</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<style>
    body {
        /* font-family: 'poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
        font-family: 'poppins', sans-serif;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: start;
        background-color: #007bff30;
    }
    .container {
        position: relative;
        max-width: 780px;
        min-height: 570px;
        background-color: #FBFBFB;
    }
    #header {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 110px;
        background: #FFAC00;
        border-radius: 0px 0px 35px 35px;
    }
    #header .headerContent {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1.2rem;
    }
    #header .headerContent .line {
        width: 3px;
        height: 40px;
        border-radius: 10px;
        background-color: #fff;
    }
    #header .headerContent .title {
        font-weight: 600;
        font-size: 24px;
        line-height: 36px;
        color: #FFFFFF;
    }
    #content {
        position: relative;
        margin: 50px 26px 0 26px;
        z-index: 9;
        background-color: transparent;
        border: none;
        outline: none;
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
    #content .body {
        display: grid;
        gap: 1.8rem;
        background-color: transparent;
        border: none;
        outline: none;
        padding-bottom : 120px;
    }
    #content .body .paragraph {
        font-weight: 400;
        font-size: 14px;
        line-height: 21px;
        color: #2B2B2B;
    }
    li {
        list-style: none;
    }
    .txt-link {
        color: #007bff;
        text-decoration: underline;
    }
    .giscaImg {
        position: absolute;
        bottom: 40px;
        right: 0;
        z-index: 6;
    }
    #footer {
        position: absolute;
        bottom: 0;
        display: grid;
        place-items: center;
        text-align: center;
        width: 100%;
        height: 65px;
        background: #FFAC00;
        color : #fff;
        z-index: 7;
        overflow: hidden;
    }
    .footerContent .desc1 {
        font-weight: 400;
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
</style>

<body>
    <div class="container">
        <div id="header">
            <div class="headerContent">
                <img src="data:image/png;base64,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">
                <div class="line"></div>
                <div class="title">COMMAND CENTER</div>
            </div>
        </div>
        {{-- End Header --}}

        <div id="content">
            <div class="headerContent">
                <div class="content">Dear, {{ $data['to'] }}</div>
                {{-- <div class="content">CC : {{ $data['cc'] }}</div> --}}
            </div>
            <div class="body">
                <div class="paragraph">
                Pada tanggal {{ $data['tgl_tegur'] }},Finishing telah melakukan pengiriman packing list ke ekspedisi
                     dengan id ekspedisi pengiriman : {{ $data['id_ekspedisi'] }}, wo : {{ $data['wo'] }}, style : {{ $data['style'] }} dan buyer :  {{ $data['buyer'] }}
                </div>
                <div class="paragraph">
                   Untuk dapat mengaksesnya bisa menggunakan link di bawah ini :
                    <li>Link Diluar Local GGC <span class="txt-link">https://gcc.gistexgarmenindonesia.com:7186/war/packing-list</span></li> 
                    <li>Link Local GGC <span class="txt-link">http://10.8.0.108/ggi-is/public/war/packing-list</span></li>                    
                    <a href="">ssssssssssssss</a>
                </div>
                <div class="paragraph">
                    <li>Terimakasih</li> 
                    <li>GCC</li>
                </div>
            </div>
        </div>

    {{-- Footer --}}
            <img src="data:image/png;base64,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" class="giscaImg" />
        <div id="footer">
            <div class="footerContent">
                <div class="desc1">Copyright &copy; 2022 PT. Gistex Garmen Indonesia | Digital Transformation</div>
                <div class="desc2">Email ini terkirim otomatis dari sistem GCC</div>
            </div>
        </div>

    </div>
</body>

</html>