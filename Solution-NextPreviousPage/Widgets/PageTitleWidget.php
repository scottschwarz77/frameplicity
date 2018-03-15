<?php

/* Copyright (c) 2017 Scott Schwarz (scottschwarz77@hotmail.com)
   For the full copyright and license information, please view the LICENSE file located in the top-level folder of this source code distribution. */

class PageTitleWidget {
  
    private function sectionBegin() {
        emit('<div class="row">');
    }

    private function sectionEnd() {
        emit('</div>');
    }

    private function renderTitle() {
        $attributes = Engine::getCurrentFoundPage()->getAttributes();
        emit("<H4><B>".$attributes->{'title'}."</B></H4>");
    }
    
    public function render() {
        $this->sectionBegin();
        $this->renderTitle();
        $this->sectionEnd();
    }

}

?>