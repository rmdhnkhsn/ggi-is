
var donutChart1 = {
    series: [90, 10],
    chart: {
      type: 'donut',
    },
    colors: ['#007BFF', '#FB5B5B'],
    labels: ['QC Pass', 'Not Pass QC'],
      options: {
        responsive: true, 
        maintainAspectRatio: false,
      }
};
var chart = new ApexCharts(document.querySelector("#donutChart1"), donutChart1);
chart.render();

var donutChart2 = {
    series: [20, 15, 15, 10, 10, 10, 10, 10,],
    chart: {
      type: 'donut',
    },
    colors: ['#FB5B5B','#FC6F6F','#FC8282','#FD9696','#FCA9A9','#FDBDBD','#FED1D1','#ffe4e4'],
    labels: ['CLN', 'MAJA1','MAJA2', 'KBD','CHWN', 'CNJ2','ANGH', 'CBA'],
      options: {
        responsive: true, 
        maintainAspectRatio: false,
      }
};
var chart = new ApexCharts(document.querySelector("#donutChart2"), donutChart2);
chart.render();


$(".dial").knob({
"readOnly":true,
'change': function (v) { console.log(v); },
draw: function () {
    $(this.i).css('font-size', '13.5pt').css('font-weight', '600').css('padding-bottom', '18px');
    $(this.i).val(this.cv + '%');


    // "tron" case
    if(this.$.data('skin') == 'tron') {

    this.cursorExt = 0.3;

    var a = this.arc(this.cv)  // Arc
        , pa                   // Previous arc
        , r = 1;

    this.g.lineWidth = this.lineWidth;

    if (this.o.displayPrevious) {
        pa = this.arc(this.v);
        this.g.beginPath();
        this.g.strokeStyle = this.pColor;
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
        this.g.stroke();
    }

    this.g.beginPath();
    this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
    this.g.stroke();

    this.g.lineWidth = 3;
    this.g.beginPath();
    this.g.strokeStyle = this.o.fgColor;
    this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 3 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
    this.g.stroke();

    return false;
    }
}
});



    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 30000);
    })



var barChart = document.getElementById('barChart').getContext('2d');

var myBarChart = new Chart(barChart, {
    type: 'bar',
    data: {
        labels: ,
        datasets : [{
            label: "Percent Overall",
            backgroundColor: 'rgb(23, 125, 255)',
            borderColor: 'rgb(23, 125, 255)',
            data: ,
        }],
    },

    options: {
        responsive: true, 
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
    }
});
