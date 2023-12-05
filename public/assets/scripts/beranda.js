let chartDataDummy = {
  "bulan" : [
    'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'
  ],
  "debitur" : [
    7, 12, 10, 8, 11, 6, 8, 7, 9, 10
  ],
  "plafond" : [
    6000000000,
    13000000000,
    7000000000,
    4000000000,
    9000000000,
    8000000000,
    12000000000,
    8000000000,
    9000000000,
    12000000000
  ]
};
chartData = chartDataDummy;


var typed = new Typed('#typed', {
  strings: [
    'Selamat Datang, ' + authName + '..!',
  ],
  startDelay: 500,
  typeSpeed: 20,
  showCursor: false,
  // backSpeed: 15,
  // backDelay: 3000,
  // loop: true,
  // loopCount: Infinity,
});

// var chartOptions = {
//   series: [
//     {
//       name: "Capaian",
//       data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
//     },
//     {
//       name: "Debitur",
//       data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
//     },
//   ],
//   chart: {
//     type: "bar",
//     height: 350,
//   },
//   dataLabels: {
//     enabled: false,
//   },
//   colors:['#FF5154', '#FFF311'],
//   xaxis: {
//     categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
//   },
// }

var chartOptions = {
  series: [
    {
      name: "Capaian",
      type: 'column',
      data: chartData.plafond,
    },
    {
      name: "Debitur",
      type: 'line',
      data: chartData.debitur,
    },
  ],
  chart: {
    type: 'line',
    height: 350,
    toolbar: {
      show: true,
      tools: {
        zoom: false,
      }
    }
  },
  stroke: {
    // curve: 'smooth',
    width: [0, 4]
  },
  dataLabels: {
    enabled: true,
    enabledOnSeries: [1]
  },
  labels: chartData.bulan,
  colors:['#FF5154', '#FFF311'],
  yaxis: [
    {
      // title: {
      //   text: 'Capaian',
      // },
      labels: {
        formatter: function (value) {
          // Format nilai menjadi format uang
          return formatCurrency(value);
        }
      }
    },
    {
      opposite: true,
      // title: {
      //   text: 'Debitur',
      // }
    }
  ]
}

function formatCurrency(value) {
  // Fungsi untuk memformat nilai menjadi format uang
  const formatter = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR', // Sesuaikan dengan mata uang yang diinginkan
    minimumFractionDigits: 0,
  });

  // Mengonversi nilai menjadi format uang
  return formatter.format(value);
}


var chart = new ApexCharts(document.querySelector("#chart"), chartOptions)
chart.render()