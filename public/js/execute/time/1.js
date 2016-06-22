$(document).ready(function () {

  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

  var elements_name = jQuery.parseJSON($("#labels").val());
  var num_months = $("#num_months").val();
  var data = jQuery.parseJSON($("#data").val());
  var year_beg = $("#year_beg").val();
  var year_end = $("#year_end").val();
  var month_beg = $("#month_beg").val();
  var month_end = $("#month_end").val();
  

  var labels = [];
  var datasets = [];
  var months = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
  var colors = [                
                [153,255,153],
                [153,204,255],   
                [255,153,255],
                [255,255,153],
                [153,255,204],
                [153,153,255],
                [255,153,153],
                [204,255,153],
                [153,255,255],
                [204,153,255],
                [224,224,224],
                [255,204,153],
                [153,255,153],
                [153,204,255],                
                [255,153,204],
                [224,224,224],
                [255,204,153]
              ]
  var ind_month =month_beg;
  for (var i = 0; i < num_months; i++) {
    labels[i]=months[ind_month]+"-"+year_beg;
    ind_month++;
    if(ind_month==12){
      year_beg++;
    }
      
  };

  console.log(data);  

  for (var i = 0; i < elements_name.length; i++) {
    var data_package = [];
    for (var j = 0; j < num_months; j++) {
      console.log(j);
      data_package[j]=data['percentage'][j][i];
    };

    datasets[i]={
        label: elements_name[i],
        fillColor : "rgba("+colors[i][0]+","+colors[i][1]+","+colors[i][2]+",0.5)",
        strokeColor : "rgba("+colors[i][0]+","+colors[i][1]+","+colors[i][2]+",0.8)",
        highlightFill: "rgba("+colors[i][0]+","+colors[i][1]+","+colors[i][2]+",0.75)",
        highlightStroke: "rgba("+colors[i][0]+","+colors[i][1]+","+colors[i][2]+",1)",
        data: data_package
      };

    console.log(datasets[i]);
  };

  var barChartData = {
    labels,
    datasets
  }
  window.onload = function(){
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
      responsive : true,
      legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"><%if(datasets[i].label){%><%=datasets[i].label%><%}%></span></li><%}%></ul>",
    });

    var legend = window.myBar.generateLegend();
    $("#legend").append(legend);
  }

});