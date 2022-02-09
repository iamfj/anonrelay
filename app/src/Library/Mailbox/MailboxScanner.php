<?php

namespace App\Library\Mailbox;

use PhpImap\Mailbox;

class MailboxScanner {
  
  /**
   * @param Mailbox $mailbox
   *
   * @return array
   */
  public function scan(Mailbox $mailbox): array {
    $mails = [];
    $mailIds = $mailbox->searchMailbox();
    
    if ($mailIds) {
      foreach ($mailIds as $mailId) {
        $mail = $mailbox->getMail($mailId);
        $toAddresses = array_keys($mail->to);
        $fromAddress = $mail->fromAddress;
        
        $mails[] = MailboxTransaction::create($mailId, $fromAddress, $toAddresses);
      }
    }
    
    return $mails;
  }
}