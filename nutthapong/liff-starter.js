window.onload = function (e) 
				{
					liff.getProfile().then(profile => {
									  document.getElementById('lid').value = profile.displayName
									})
									.catch((err) => {
									  console.log('error', err);
									});
				};
				
