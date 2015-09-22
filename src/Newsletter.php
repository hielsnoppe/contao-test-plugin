<?php

namespace Nl2Go\Plugins\Contao;

use \Contao\Backend;
use \Contao\Newsletter as ContaoNewsletter;
use \Contao\NewsletterRecipientsModel;

class Newsletter extends ContaoNewsletter {

    public function send (\DataContainer $dc) {

        exit('I broke send');
    }

    public function generateEmailObject (\Database\Result $objNewsletter, $arrAttachments) {

        exit('I broke generateEmailObject');
    }

    protected function sendNewsletter (\Email $objEmail, \Database\Result $objNewsletter, $arrRecipient, $text, $html, $css=null) {

        exit('I broke sendNewsletter');
    }

    public function importRecipients () {

        echo('I broke importRecipients');
        exit();
    }

    public function removeSubscriptions ($intUser, $strMode) {

        exit('I broke removeSubscriptions');
    }

    public function createNewUser ($intUser, $arrData) {

        exit('I broke createNewUser');
    }

    public function activateAccount ($objUser) {

        exit('I broke activateAccount');
    }

    public function synchronize ($varValue, $objUser, $objModule=null) {

        exit('I broke synchronize');
    }

    public function updateAccount () {

        exit('I broke updateAccount');
    }

    public function getNewsletters ($objModule) {

        exit('I broke getNewsletters');
    }

    public function getSearchablePages ($arrPages, $intRoot=0, $blnIsSitemap=false) {

        exit('I broke getSearchablePages');
    }
}
