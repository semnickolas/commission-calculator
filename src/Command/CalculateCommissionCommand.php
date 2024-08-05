<?php

namespace App\Command;

use App\Service\CommissionProcessorInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'calculate-commission',
    description: 'Calculate commission'
)]
class CalculateCommissionCommand extends Command
{
    private const string EXAMPLE_FILE = '/code/example.txt';

    public function __construct(private readonly CommissionProcessorInterface $commissionProcessor)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('filepath', InputOption::VALUE_REQUIRED, 'filepath', self::EXAMPLE_FILE);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $style = new SymfonyStyle($input, $output);
        $filename = $input->getArgument('filepath');

        $commissions = $this->commissionProcessor->process($filename);
        foreach ($commissions as $commission) {
            $style->writeln($commission);
        }

        return self::SUCCESS;
    }


}