<?php

class MasterTemplate {
	public function render() {
		emit('<script language="javascript">');
		emit('window.location.replace("');
		emit(URLParser::getBaseURL().'/my-first-tutorial-page/");');
		emit('</script>');
	}
}

