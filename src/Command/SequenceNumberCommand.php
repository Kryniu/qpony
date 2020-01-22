<?php


namespace App\Command;


use App\Service\SequenceNumberService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SequenceNumberCommand extends Command
{
    protected static $defaultName = 'app:sequenceNumber';
    /**
     * @var SequenceNumberService
     */
    private $sequenceNumberService;

    public function __construct(SequenceNumberService $sequenceNumberService, string $name = null)
    {
        parent::__construct($name);
        $this->sequenceNumberService = $sequenceNumberService;
    }

    protected function configure()
    {
        $this->setDescription('Command get max number from sequence');
        $this->addArgument('n', InputArgument::REQUIRED, 'Input');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $number = $input->getArgument('n');
        $output->writeln('Input: ' . $number);
        if (!is_numeric($number)) {
            return 0;
        }
        $maxNumber = $this->sequenceNumberService->getMaxNumber($number);
        $output->writeln('Output: ' . $maxNumber);

        return $maxNumber;
    }
}