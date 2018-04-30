 /*
 !Для этого способа модифицирован jquery-ui.js, строка 3287 (ставим html вместо text): return $( "<li>" ).html(item.label).appendTo(ul);
 */
;

$(document).ready(function(){
$("input[name=select_table]").change(function (){
    var value_radio = $(this).val();
    $("[name=query]").autocomplete({
    minLength: 1,
    source: 'includes/search.php?search_tip=title&search_by='+ value_radio
    });
});
$( "#select_one" ).prop( "checked", true );
if ($("input[name=select_table]:checked").length > 0) {
$("input[name=select_table]:checked").change();
}
});

