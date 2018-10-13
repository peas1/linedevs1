window.onload = function (e) 
				{

					liff.getProfile().then(profile => {
									   var LID = document.getElementById('lid').value = profile.userId;
									   alert("amv,kal;nl");
									})
									.catch((err) => {
									  console.log('error', err);
									});
				};
				
