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
                    async: true,
                    cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function(response) {
                        alert(response);
                    },
                    error: function(response){
                        console.log('[error]', response);
                    },
                    complete: function() {
                        location.reload();
                    }
                });
}