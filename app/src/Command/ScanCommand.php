<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

#[AsCommand(
  name: 'anonrelay:scan',
  description: 'Scan and apply redirection rules to the configured inbox',
)]
class ScanCommand extends Command {
  public function __construct(private ParameterBagInterface $parameterBag) {
    parent::__construct();
  }
  
  protected function execute(InputInterface $input, OutputInterface $output): int {
    $io = new SymfonyStyle($input, $output);
    
    $imapPath = $this->parameterBag->get('app.imap.path');
    $imapUsername = $this->parameterBag->get('app.imap.username');
    $imapPassword = $this->parameterBag->get('app.imap.password');
    
    $io->success('You have successfully scanned all inboxes!');
    
    return Command::SUCCESS;
  }
}
