<?php

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

class FooterWidget {
	public function render() {
		emit("<br>");
		emit('<div class="row">');
		emit('<div class = "twelve columns"><center><h4>Site Footer</h4></center></div>');
		emit('</div></div>');
		emit('</body>');
		emit('</html>');
	}
}

?>