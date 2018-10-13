window.onload = function (e) 
				{
					liff.init(function (data) {});
					liff.getProfile().then(function (profile) {
						document.getElementById('displayname').value = profile.displayName;
					    liff.sendMessages([
											{
											type: 'text',
											text: 'From:' + profile.displayName
											}
										]);
					}
					);
					
				};
				
