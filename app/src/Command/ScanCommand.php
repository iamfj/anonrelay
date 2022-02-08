<?php

namespace App\Command;

use App\Library\Mailbox\MailboxScanner;
use Exception;
use SecIT\ImapBundle\Service\Imap;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
  name: 'anonrelay:scan',
  description: 'Scan and apply redirection rules to the configured inbox',
)]
class ScanCommand extends Command {
  
  /**
   * @param Imap $imap
   */
  public function __construct(private Imap $imap) {
    parent::__construct();
  }
  
  /**
   * @param InputInterface  $input
   * @param OutputInterface $output
   *
   * @return int
   */
  protected function execute(InputInterface $input, OutputInterface $output): int {
    $mailboxScanner = new MailboxScanner();
    $io = new SymfonyStyle($input, $output);
    
    try {
      $mailboxConnection = $this->imap->get('main');
      $mailboxTransactions = $mailboxScanner->scan($mailboxConnection);
      // ToDo: Implement further transaction handling
      
      $io->success('You have successfully scanned all inboxes!');
    } catch (Exception $e) {
      $io->error($e->getMessage());
    }
    
    return Command::SUCCESS;
  }
}
