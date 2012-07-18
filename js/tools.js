function changeFontSize(inc) {
	var q = document.getElementsByTagName('p');
	for ( m = 0; m < 2; m++) {
		for ( n = 0; n < q.length; n++) {
			if (q[n].style.fontSize) {
				var size = parseInt(q[n].style.fontSize.replace("px", ""));} 
			else {
				var size = 14;}
			q[n].style.fontSize = size + inc + 'px';
		}
		q = document.getElementsByTagName('li');
	}
}
