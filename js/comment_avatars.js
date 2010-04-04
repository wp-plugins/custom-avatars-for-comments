function comment_avatars_js( counter, e ) {
	comment_avatars_js_deselect_all();
	e.className='selected';
	document.getElementById('comment-avatars-select-' + counter ).checked='true';
}

function comment_avatars_js_deselect_all( ) {
	var children = document.getElementById('comment-avatars-select-wrapper').getElementsByTagName("img");
	for ( i = 0; i < children.length; i++ ) {
		children[i].className='nothing';
	}
}
