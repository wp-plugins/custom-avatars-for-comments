function comment_avatars_js( counter, e ) {

	var children = document.getElementById('comment-avatars-select-wrapper').getElementsByTagName("img");

	//alert ( children.length );

	for ( i = 0; i < children.length; i++ ) {
		children[i].className='nothing';
	}
	
	e.className='selected';
	
	document.getElementById('comment_avatar_select_' + counter ).checked='true';
}
