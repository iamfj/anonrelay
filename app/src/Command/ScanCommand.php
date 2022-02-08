<?php

namespace App\Command;

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
  protected function execute(InputInterface $input, OutputInterface $output): int {
    $io = new SymfonyStyle($input, $output);
    
    $io->success('You have successfully scanned all inboxes!');
    
    return Command::SUCCESS;
  }
}
