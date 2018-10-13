window.onload = function (e) 
{
  liff.getProfile().then(function (profile) 
  {
	  document.getElementById('lid').textContent = profile.userId;
	  document.getElementById('displayname').textContent = profile.displayName;
  }  
};
