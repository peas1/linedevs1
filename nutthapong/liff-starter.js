window.onload = function (e) 
				{
					liff.init(function (data) {});
					liff.getProfile().then(function (profile) {
						var disname = document.getElementById('displayname');
						disname.value = profile.displayName;
					
					}
					);
					
				};
				
