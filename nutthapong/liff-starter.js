window.onload = function (e) 
				{
					liff.getProfile().then(function (profile) 
											{
												document.getElementById('lid').value = profile.userId;
												document.getElementById('displayname').value = profile.displayName;
											}
				}).catch((err) => 
								{
									console.log('error', err);
								});
				
