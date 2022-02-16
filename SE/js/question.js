
function getCheckedValue(className) {
    var show = 0;

    var radios = document.getElementsByClassName(className);
    for (i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            show = parseFloat(show) + parseFloat(radios[i].value);
        }
    }
	

if (show == 0) {
		
alert('You have not completed the Risk Assessment, please answer the questions in order to continue.');
 }


	
   else if(show > 0 && show <= 3) {



alert('You have taken the Risk Assessment your score is 4/10 you are not secure. Please note, you will never be 100% fully secure, but we have great services and solutions to help protect you from harmful attacks.');
	     
	   window.location="http://www2.securedenterprise.co.za/";
 }
	
	


else if (show > 3 && show <= 6) {


 alert('You have taken the Risk Assessment your score is 6/10 you are not secure. Please note, you will never be 100% fully secure, but we have great services and solutions to help protect you from harmful attacks.');
	
	        document.riskform.action="signup_db.php";
        document.riskform.submit();
	window.location="http://www2.securedenterprise.co.za/";
 }

else if (show > 6 && show <= 10) {


alert('You have taken the Risk Assessment your score is 8/10 you are not secure. Please note, you will never be 100% fully secure, but we have great services and solutions to help protect you from harmful attacks.');
	
	    document.riskform.action="signup_db.php";
        document.riskform.submit();
	window.location="http://www2.securedenterprise.co.za/";
 }

}

	



//function centerModal() {
//    $(this).css('display', 'block');
//    var $dialog = $(this).find(".modal-dialog");
//    var offset = ($(window).height() - $dialog.height()) / 2;
//    // Center modal vertically in window
//    $dialog.css("margin-top", offset);
//}
//
//$('.modal').on('show.bs.modal', centerModal);
//$(window).on("resize", function () {
//    $('.modal:visible').each(centerModal);
//});