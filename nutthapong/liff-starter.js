window.onload = function (e) 
				{
					liff.init(function (data) {});
					liff.getProfile().then(profile => {
									   var LID = document.getElementById('lid').value = profile.userId;
									  
									})
									.catch((err) => {
									  console.log('error', err);
									});
				};
				
