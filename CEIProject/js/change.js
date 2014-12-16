/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    $('.address, .modify').hide();
    $('.survey').not('.default').hide();
    $(':input:first').focus();
    
    //change the background color of any row that's being focused
    //background color reset when that element lose focus
    //this is best, however, a bug in some browser preventing checkboxes and radio buttons 
    //from listening to .focus() and .blur() event
    //Therefore, use the jquey directly below this.
    /*
    $("input, textarea").bind("focus blur", function(){
        $(this).parent().parent().parent().toggleClass("focus");
    });
    */
   
   //change background color of the row that is being focused, 
   //and reset the background of all the other color not focus
    $('input, textarea').click(function(){
        $('div.table').not($(this).parent().parent().parent()).removeClass('focus');
        $(this).parent().parent().parent().addClass('focus');
    });
    
    $('input[name="aVisible"]').change(function(){
        if($(this).val() === 'yes'){
            $('.address').show();
        }
        else{
            $('.address input').attr('checked', false);
            //$('.address input[name="resType"]').val('');
            $('.address, .modify').hide();
            $('.modify textarea').val('');
        }
    });
    
    $('input[name="correct"]').change(function (){
        if($(this).val() === 'no'){
            $('.modify').show();
        }
        else{
            $('.modify').hide();
            $('.modify textarea').val('');
        }
    });
    
    $('#zoom_in').click(function(){
        $('*').css('font-size', '+=2px');
        $('.textbox, textarea, #submit, .submit').css({
            width: '+=10px',
            height: '+=5px'
        });
    });
    $('#zoom_out').click(function(){
        $('*').css('font-size', '-=2px');
        $('.textbox, textarea, #submit, .submit').css({
            width: '-=10px',
            height: '-=5px'
        });
    });
    
    $('#time').datetimepicker({
        buttonImage: '../images/datetime.png',
        buttonImageOnly: true,
        changeMonth: true,
        changeYear: true,
        showOn: 'button',
        buttonText: 'Show Date',
        dateFormat: 'mm/dd/yy'
        //timeFormat: 'h:mm:ss tt'
    });
    
    $('#now').click(function(){
         var now = new Date();
         var date = (now.getDate() < 10) ? '0' + now.getDate() : now.getDate();
         var month = ((now.getMonth() + 1) < 10) ? '0' + (now.getMonth() + 1): now.getMonth() + 1;
         var year = now.getFullYear();
        //var hours = date.getHours();
        //var minutes = (date.getMinutes() < 10) ? '0' + date.getMinutes() : date.getMinutes();
        //var seconds = (date.getSeconds() < 10) ? '0' + date.getSeconds() : date.getSeconds();
        $('#time').val(month + '/' + date + '/' + year);
    });
    
    $('input[name="structType"]').change(function(){
        $classification = '.' + $(this).val();
        
        $($classification).show();
        $('.survey').not($classification).hide();
        $('.survey').not($classification).children().children().children().attr('checked', false);
        
        if($classification == '.vacant'){
            $('.sCondition').hide();
        }
        else{
            $('.sCondition').show();
        }
    });
    
    $('.reset').click(function(){
        $id = $(this).attr('id');
        $('div input[name="' + $id + '"]').attr('checked', false);
        
        if($id === 'aVisible'){
            $('.address input').attr('checked', false);
            $('.address, .modify').hide();
            $('.modify textarea').val('');
            
        }
        else if($id === 'correct'){
            $('.modify').hide();
            $('.modify textarea').val('');            
        }
        else if($id === 'structType'){
            $('.survey').not('.default').children().children().children().attr('checked', false);
            $('.survey').not('.default').hide();
        }
    });
    
});

