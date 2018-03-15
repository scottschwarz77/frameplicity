    <?php

    class NextPreviousPageWidget extends Component {

        private function createButton($page,$text) {
            emit("<a class='button' href=".$page->getURL().">".$text."</a>");
        }

        private function createSpacing() {
            emit("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        }
        
        public function render() {
            $onFirstPage = false;
            $onLastPage = false;
            $foundFolder = Engine::getFoundFolder();
            $pageIndex = $foundFolder->getCurrentPageIndex();
            
            $folderForPrevious = clone $foundFolder;
            $folderForNext = clone $foundFolder;
            
            if ($pageIndex == 0)
                $onFirstPage = true;
            if ($pageIndex == $foundFolder->getPageCount()-1)
                $onLastPage = true;                     
            if ($onFirstPage == false) {
                $folderForPrevious->gotoPreviousPage();
                $this->createButton($folderForPrevious->getCurrentPage(),"Previous");
			}
            if ( ($onFirstPage == false) && ($onLastPage == false) )
                $this->createSpacing();
            if ($onLastPage == false) {
                $folderForNext->gotoNextPage();
                $this->createButton($folderForNext->getCurrentPage(),"Next");
			}
        }
    }
    ?>
    </div>   
</div>