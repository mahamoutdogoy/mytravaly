$crud(function(){
	$crud( 'textarea.texteditor' ).ckeditor({toolbar:'Full'});
	$crud( 'textarea.mini-texteditor' ).ckeditor({toolbar:'Basic',width:700});
});