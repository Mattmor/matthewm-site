@extends('masternotitle')
@section('headspace')
<script src="/js/jquery.novacancy.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function() {
        $('#error').novacancy({
            'reblinkProbability': 0.5,
            'blinkMin': 0.2,
            'blinkMax': 0.6,
            'loopMin': 8,
            'loopMax': 10,
            'blink': 1,
            'off': 1,
            'color': '#ffffff',
            'glow': ['0 0 80px #ffffff', '0 0 30px #008000', '0 0 6px #0000ff']
        });
        $('#error2').novacancy({
            'blink': 1,
            'off': 1,
            'color': 'Red',
            'glow': ['0 0 80px Red', '0 0 30px FireBrick', '0 0 6px DarkRed']
        });
        $('#error3').novacancy({
            'blink': 1,
            'off': 1,
            'color': '#ffffff',
            'glow': ['0 0 80px #ffffff', '0 0 30px #008000', '0 0 6px #0000ff']
        });
        $('#error4').novacancy({
            'blink': 1,
            'off': 1,
            'color': '#ffffff',
            'glow': ['0 0 80px #ffffff', '0 0 30px #008000', '0 0 6px #0000ff']
        });
        $('#error6').novacancy({
            'blink': 1,
            'off': 0,
            'color': '#ffffff',
            'glow': ['0 0 80px #ffffff', '0 0 30px #008000', '0 0 6px #0000ff']
        });
            $('#error').trigger('blinkOn');
            $('#error2').trigger('blinkOn');
            $('#error3').trigger('blinkOn');
            $('#error4').trigger('blinkOn');
            $('#error6').trigger('blinkOn');
		});
</script>
@endsection
@section('content')
    <body style="height:100%;background-color:#1e2124">
        <div class="container-fluid uppercase errorcontainer">
            <div class="errorcontainer-child">
                <p>
                    <span id="error">Error</span>
                </p>
                <p>
                    <span id="error2">404</span>
                </p>
                <p>
                    <span id="error3">Click</span>
                    <a href="javascript: history.go(-1)" id="goback">here</a>
                    <span id="error4">to </span>
                    <span id="error5">go </span>
                    <span id="error6">back</span>
                </p>
            </div>
        </div>
    </body>
@endsection
