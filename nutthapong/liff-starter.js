window.onload = function (e) 
{
    liff.init(function (data) 
	{
        initializeApp(data);
    });
};

function initializeApp(data) 
{
    document.getElementById('lid').textContent = data.language;
    document.getElementById('displayname').textContent = data.context.viewType;
}

