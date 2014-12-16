$(document).ready(function(){
   $('#prev, #next').click(function(){
       var button = $(this).val();
       var block_id = $('#bID').val();
       var address = $('#address').val();
       
       $.post('../sql/mysql_query.php', {block_id: block_id, address: address, button: button}, function(data){
           var arr = $.parseJSON(data);
           $('#address').val(arr.address);
           $('#pID').val(arr.parcel_id);
       });
   }); 
});
