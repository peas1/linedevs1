window.onload = function (e) 
				{
					liff.init(
						  data => {
							// Now you can call LIFF API
							const userId = data.context.userId;
						  },
						  err => {
							// LIFF initialization failed
						  }
						);
					liff.getProfile().then(profile => {
									  document.getElementById('lid').value = profile.userId
									})
									.catch((err) => {
									  console.log('error', err);
									});
				};
				
