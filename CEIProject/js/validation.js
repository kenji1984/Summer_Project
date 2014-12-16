$('#pIndex').keyup(function(){
    var parcel_id = $(this).val();
    url = '../sql/mysql_query.php';
    
    $.ajax({
        url: url,
        data: 'parcel_id='+parcel_id,
        type: 'post',
        success: function(data){
            if(data == 'available'){
                $('#avail').removeClass('red');
                $('#avail').text('*available*').addClass('green');
            }
            else {
                $('#avail').removeClass('green')
                $('#avail').text('*not available*').addClass('red');
            }
        }
    })
});

function validate() {
    //variable to submit form
    var valid = true;

    //get all inputs with class 'req'. This doesn't work for radio buttons or checkbox
    var input = document.getElementsByClassName('req');

    //check each elements of input for blank text
    for (var i = 0; i < input.length; i++) {
        if (input[i].value == '') {
            input[i].classList.add('error');
            valid = false;
        }
        else{
            input[i].classList.remove('error');
        }
    }

    if (!valid) {
        return false;
    }
    else {
        //for radio buttons
        var radios = $('input:radio.req');
        
        for (var i = 0; i < radios.length; i++) {
            
            if (!checkRadio(radios[i].name)) {
                radios[i].parentNode.classList.add('red');
                valid = false;
            }
            else{
                radios[i].parentNode.classList.remove('red');
            }
        }
    }

    if (!valid) {
        return false;
    }
}

function checkRadio(radioName) {
    var radio = document.getElementsByName(radioName);

    for (var i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
            return true;
        }
    }
    return false;
}