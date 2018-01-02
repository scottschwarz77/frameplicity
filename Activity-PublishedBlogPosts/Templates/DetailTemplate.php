<?php

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

class DetailTemplate {

	private function contentRowBegin() {
		emit('<div class="row">');
		emit('<div class="one column"></div>');
		emit('<div class="ten columns">');
		}

	private function contentRowEnd() {
		emit('</div>');
		emit('<div class="one column"></div>');
		emit('</div>');
		emit('<br>');
		}

	public function render() {
		$this->contentRowBegin();
		renderWidget("PageTitleWidget");
		emit(Engine::getFoundPage()->getBody());
		$this->contentRowEnd();
	}
}

?>