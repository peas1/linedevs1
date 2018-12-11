function upload()
{
	var file = document.getElementById("vocfile");
	//alert(file.value);
	var formData = new FormData();
	formData.append('file', file.value);
                $.ajax({
                    url: 'upload-xls.php',
                    method: 'POST',
                    data: formData,
                    aasync: true,
					cache: false,
					processData: false,
					contentType: false,
                    beforeSend: function(){
                        $.blockUI({ message:'<h3>Uploading xlsx file...</h3>' });
                    },
                    success: function(response) {
                        alert(response);
                    },
                    error: function(response){
                        console.log('[error]', response);
                    },
                    complete: function() {
                        $.unblockUI();
                        location.reload();
                    }
                });
}