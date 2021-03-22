b_url = '../backend.php?uploadfiles';

$("form#data").submit(function(e) {
 	var progressBar = $('#progress_bar');
	e.preventDefault();    
    var formData = new FormData(this);
    $.ajax({
        url: b_url,
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data)
        },
        cache: false,
        contentType: false,
        processData: false,
		success: function( respond, textStatus, jqXHR ){
			// Åñëè âñå ÎÊ
			if( typeof respond.error === 'undefined' ){
				// Ôàéëû óñïåøíî çàãðóæåíû, äåëàåì ÷òî íèáóäü çäåñü (íàïðèìåð ïåðåçàãðóçêà îñíîâíîãî îêíà)
				var html = '';
				$('.ajax-respond').html( html );
			}
			else{
				console.log('ÎØÈÁÊÈ ÎÒÂÅÒÀ ñåðâåðà: ' + respond.error );
			}
		}, 
		error: function( jqXHR, textStatus, errorThrown ){
			console.log('ÎØÈÁÊÈ AJAX çàïðîñà: ' + textStatus );
		}, 
		xhr: function(){
			var xhr = $.ajaxSettings.xhr(); // ïîëó÷àåì îáúåêò XMLHttpRequest
			xhr.upload.addEventListener('progress', function(evt){ // äîáàâëÿåì îáðàáîò÷èê ñîáûòèÿ progress (onprogress)
				if (evt.lengthComputable) { // åñëè èçâåñòíî êîëè÷åñòâî áàéò
				// âûñ÷èòûâàåì ïðîöåíò çàãðóæåííîãî
					var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
					// óñòàíàâëèâàåì çíà÷åíèå â àòðèáóò value òåãà progress
					// è ýòî æå çíà÷åíèå àëüòåðíàòèâíûì òåêñòîì äëÿ áðàóçåðîâ, íå ïîääåðæèâàþùèõ &lt;progress&gt;
					progressBar.val(percentComplete).text('Çàãðóæåíî ' + percentComplete + '%');
				}
			}, false);
			return xhr;
		}
    });
});