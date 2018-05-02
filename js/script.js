;
function createDiagramm(textRequest) {
    console.log("yes");
    FusionCharts.ready(function () {
        var myChart = new FusionCharts({
            "type": "column2d",
            "renderAt": "chartContainer",
            "width": "550",
            "height": "300",
            "dataFormat": "xmlurl",
            "dataSource": "includes/diagram.php?textRequest="+textRequest
        });
        myChart.render();
    });
}
$(document).ready(function () {
$("input[name=select_table]").change(function (){
    var value_radio = $(this).val();
    $("[name=query]").autocomplete({
    minLength: 1,
    source: 'includes/search.php?search_tip=title&search_by='+ value_radio
    });
});
$( "#select_one" ).prop( "checked", true );
if ($("input[name=select_table]:checked").length > 0) $("input[name=select_table]:checked").change();
});