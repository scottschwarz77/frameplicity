<?php

class PageListWidget extends Component { 
  
    private function listItem($liTag, $pageObj, $attributes) {
        emit($liTag." href=\"".$pageObj->getURL()."\">".$attributes->{'title'}."</a>");
    }

    public function render() {
        emit("<h2>Tutorial</h2>");
        $foundFolder = clone Engine::getFoundFolder();
		$selectedFileIndex = $foundFolder->getCurrentPageIndex();
		$foundFolder->gotoFirstPage();
	    $count = $foundFolder->getPageCount();
	    for ($index = 0; $index < $count; $index++) {
            if ($index == $selectedFileIndex)
                $liTag = "<a class=\"button button-primary\"";
            else
                $liTag = "<a class='button'";
			$pageObj = $foundFolder->getCurrentPage();
		    $attributes = $pageObj->getAttributes();
            PageListWidget::listItem($liTag,$pageObj,$attributes);
            $foundFolder->gotoNextPage();
        }
    }
}
?>