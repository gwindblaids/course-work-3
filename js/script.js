 /*
 !Для этого способа модифицирован jquery-ui.js, строка 3287 (ставим html вместо text): return $( "<li>" ).html(item.label).appendTo(ul);
 */
;

$(document).ready(function(){

$("input[name=select_table]").change(function(){
    var value_radio = $(this).val();
    $("[name=query]").autocomplete({
    minLength: 1,
    source: 'includes/search.php?search_tip=title&search_by='+ value_radio
});
    if (value_radio==='cd') {
        var data_filter = $("#input_query").val();
        console.log(data_filter);
          $.ajax({
            url: "includes/diagramm.php",
            method: 'POST',
            data: {change: value_radio, query: data_filter},
            cache: false,
            success: function(html) {
                $("#diagramm").html(html);
                console.log("Complete "+value_radio+" and "+data_filter+ " to diagramm.php");
            }
          });
           }
});  
});

