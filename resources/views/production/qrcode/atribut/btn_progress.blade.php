<body class="body-progress">
  <div class="space"></div>
  <div class="skill-bars">
    <div class="bar">
      <div class="progress-line">
        @if($percentData < '20') 
        <span class="bar3" style="width: {{$percentData}}%;">
          <span class="percent-bar0">{{$percentData}} %</span>
        </span>
        
        @elseif (($percentData >'19') AND ($percentData < '81'))
        <span class="bar2" style="width: {{$percentData}}%;">
          <span class="percent-bar80">{{$percentData}} %</span>
        </span>
        @elseif ($percentData > '80')
        <span class="bar100" style="width: {{$percentData}}%;">
          <span class="percent-bar100">{{$percentData}} %</span>
        </span>
        @endif
      </div>
    </div>
  </div>
</body>