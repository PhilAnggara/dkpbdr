var barOptions = {
  series: [
    {
      name: "Capaian",
      data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
    },
    {
      name: "Debitur",
      data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
    },
  ],
  chart: {
    type: "bar",
    height: 350,
  },
  dataLabels: {
    enabled: false,
  },
  colors:['#FF5154', '#FFF311'],
  xaxis: {
    categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
  },
}
var bar = new ApexCharts(document.querySelector("#bar"), barOptions)

bar.render()
