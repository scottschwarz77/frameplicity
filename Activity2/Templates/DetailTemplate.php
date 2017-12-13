<?php

class DetailTemplate extends Component {
	
	public function containerBegin() {
		emit('<br><br>');
		emit('<div class="row">');
	}
	
	private function leftPanelBegin() {
		emit('<div class="one column">');
	}

	private function leftPanelEnd() {
		emit('</div>');
	}

	private function rightPanelBegin() {
		emit('<div class = "two columns">&nbsp;</div>');
		emit('<div class = "nine columns">');
	}

	private function rightPanelEnd() {
		emit('</div>');
	}

	private function containerEnd() {
		emit('</div>');
	}

	public function render() {
		$foundPage = Engine::getFoundPage();
		$this->containerBegin();
			$this->leftPanelBegin();
				renderWidget("PageListWidget");
			$this->leftPanelEnd();
			$this->rightPanelBegin();
				renderWidget("PageTitleWidget");
				emit($foundPage->getBody());
			$this->rightPanelEnd();
		$this->containerEnd();
	}
}


?>   
     
    
