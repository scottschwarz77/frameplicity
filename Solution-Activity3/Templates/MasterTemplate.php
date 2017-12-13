<?php

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

class MasterTemplate {
	private function contentRowBegin() {
		emit('<div class="row">');
		emit('<div class="one column"></div>');
		emit('<div class="ten columns">');
  	}
		
	private function contentRowEnd() {
		emit("<hr style='border-width:2px'>");
		emit('</div><div class="one column"></div></div>');
		emit("<br>");
	}

	public function render() {
		$blogEntryFolder = Engine::getFoundFolder();
		while ($blogEntryFolder->iteratorInBounds()) {
			$attributes = $blogEntryFolder->getCurrentPage()->getAttributes();
			if ($attributes->{'published'} == "true") {
				$this->contentRowBegin();
				$currentPage = $blogEntryFolder->getCurrentPage();
				renderWidget("PageTitleWidget");
				$content = $currentPage->getBody();
				emit(substr($content,0,strpos($content,"<preview/>")));
				emit("<b><a href=".$currentPage->getURL().">Read the full post</a></b>");
				$this->contentRowEnd();
			}
			$blogEntryFolder->gotoNextPage();
		}
	}
}

?>