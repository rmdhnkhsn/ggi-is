<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env("APP_NAME")}} - {{$title}}</title>
    <style>
        div#header {
            background-color: #007bff;
            color: white;
            font-size: 20px;
            font-weight: bold;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        div#footer {
            background-color: #7c7c7c;
            color: white;
            padding: 20px;
            align-items: center;
            justify-content: center
        }

        div#content {
            padding: 10px;
            background-color: whitesmoke;
        }

        td {
            padding: 5px;
        }

        .primary {
            border-collapse: collapse;
        }

        .primary th,
        .primary td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div id="header">
        <center>
            GISTEX COMMAND CENTER<br>
        </center>
    </div>

    <div id="content">
        <b>{{$title}}</b>
        <p>Hi, {{$name_to}}.</p>
        {!! $body !!}
    </div>

    <div id="footer">
        <center>
            Copyright &copy; 2022 PT. Gistex Garmen Indonesia | Digital Transformation <br>
            <small>Email ini terkirim otomatis dari sistem GCC</small>
        </center>
    </div>
</body>

</html>