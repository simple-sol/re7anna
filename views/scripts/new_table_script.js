$("#sample_editable_1 td:nth-child(11)").click(function(event){  
  
    //Prevent the hyperlink to perform default behavior  
    event.preventDefault();  
    //alert($(event.target).text())  
  
    var $td= $(this).closest('tr').children('td');  
  
  
    var sr= $td.eq(0).text();

    var name= $td.eq(1).text();  
  
    var city= $td.eq(2).text();

    $td.each(function(){
        $th = $(this).closest('table').find('th').eq($(this).index());
        $header = $th.text();
        $('input[name="name"]').val($(this).text());
    });

}  
  
);  
  
  
  