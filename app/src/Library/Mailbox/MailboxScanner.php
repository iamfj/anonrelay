<?php

namespace App\Library\Mailbox;

use Ds\Set;
use PhpImap\Mailbox;

class MailboxScanner {
  
  /**
   * @param Mailbox $mailbox
   *
   * @return Set
   */
  public function scan(Mailbox $mailbox): Set {
    $mails = new Set();
    $mailIds = $mailbox->searchMailbox();
    
    if ($mailIds) {
      foreach ($mailIds as $mailId) {
        $mail = $mailbox->getMail($mailId);
        $toAddresses = array_keys($mail->to);
        $fromAddress = $mail->fromAddress;
        
        $mails->add(MailboxTransaction::create($mailId, $fromAddress, $toAddresses));
      }
    }
    
    return $mails;
  }
}