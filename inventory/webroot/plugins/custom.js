/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function () {

//    $('.print_form').click(function(){
//        
//       window.print(); 
//    });
    $("select#insurance-type-id")
            .change(function () {
                var insurance_type = $(this).val();
                if (insurance_type === '1') {
                    console.log('first');
                    $('.second_list').hide();
                    $('.first_list').show();
                    $('.common_list').show();

                    $('.user_details tr:nth-of-type(3), .user_details tr:nth-of-type(4)').height(133);
                } else if (insurance_type === '2') {
                    console.log('second');
                    $('.first_list').hide();
                    $('.second_list').show();
                    $('.common_list').show();
                    $('.user_details tr:nth-of-type(3), .user_details tr:nth-of-type(4)').height(133);
                } else {

                    $('.first_list').hide();
                    $('.second_list').hide();
                    $('.common_list').hide();
                    $('.user_details tr:nth-of-type(3), .user_details tr:nth-of-type(4)').height(70);
                }
                insurance_price_cal();
            });






    $('#vehicle-compen-insu-price').blur(function () {

        insurance_price_cal();

    });
    $('#third-party-insu-price').blur(function () {

        insurance_price_cal();

    });


    $('#driver-accident-insu-price').blur(function () {
        insurance_price_cal();
    });

    $('#non-driver-accident-insu-price').blur(function () {
        insurance_price_cal();
    });
    $('#passenger-accident-insu-price').blur(function () {
        insurance_price_cal();
    });


    $('#passenger-insured').blur(function () {
                insurance_price_cal();
    });
    $('#risked-group-insured').blur(function () {
              insurance_price_cal();
    });




    //saving insurance code for add
   
$('#datepicker').datepicker({
      autoclose: true
    });

});

function insurance_price_cal() {

    var total_price = 0;
    var total_price_elem = $('#total-price');
    var vat_price = 0;
    var vat_elem = $('#vat');
    var final_total = 0;
    var final_total_elem = $('#final-total-price');
    var ticket=$('#ticket').val();
    var insurance_type_id = $("select#insurance-type-id").val();
    var new_total_price = 0;
    console.log(insurance_type_id);
    var veh_compen = 0, third_party = 0, driver_acc = 0, non_driver = 0, pass_acc = 0, pass_ins = 0, risk_group = 0;
    if ($('#vehicle-compen-insu-price').val() && $.isNumeric($('#vehicle-compen-insu-price').val())) {
        veh_compen = $('#vehicle-compen-insu-price').val();
    }
    if ($('#third-party-insu-price').val() && $.isNumeric($('#third-party-insu-price').val())) {
        third_party = $('#third-party-insu-price').val();
    }
    if ($('#driver-accident-insu-price').val() && $.isNumeric($('#driver-accident-insu-price').val())) {
        driver_acc = $('#driver-accident-insu-price').val();
    }
    if ($('#non-driver-accident-insu-price').val() && $.isNumeric($('#non-driver-accident-insu-price').val())) {
        non_driver = $('#non-driver-accident-insu-price').val();
    }
    if ($('#passenger-accident-insu-price').val() && $.isNumeric($('#passenger-accident-insu-price').val())) {
        pass_acc = $('#passenger-accident-insu-price').val();
    }
    if ($('#passenger-insured').val() && $.isNumeric($('#passenger-insured').val())) {
        pass_ins = $('#passenger-insured').val();
    }
    if ($('#risked-group-insured').val() && $.isNumeric($('#risked-group-insured').val())) {
        risk_group = $('#risked-group-insured').val();
    }

    if(ticket && $.isNumeric(ticket)){
        ticket=parseInt(ticket);
    }
    total_price = parseInt(veh_compen) + parseInt(third_party);

    if (insurance_type_id === '1') {
        new_total_price = total_price + parseInt(driver_acc) + parseInt(non_driver) + parseInt(pass_acc);
    } else if (insurance_type_id === '2') {
        new_total_price = total_price+ parseInt(driver_acc) + parseInt(pass_ins) + parseInt(risk_group);
    } else {
        new_total_price = total_price;
    }
    total_price_elem.val(new_total_price);
    
   
    vat_price=(13/100)*new_total_price;
    vat_elem.val(vat_price);
    console.log(new_total_price);
    final_total=new_total_price+vat_price+ticket;
    final_total_elem.val(final_total);
}

