<?php
declare(strict_types=1);

namespace App\Command;

use App\Factory\OrderFactory;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Service\Order as OrderService;

class RegisterShipmentCommand extends Command
{
    /**
     * @var string
     */
    private $commandName;

    /**
     * @var OrderService
     */
    private $orderService;

    public function __construct(string $commandName, OrderService $orderService, string $name = null)
    {
        $this->commandName = $commandName;
        $this->orderService = $orderService;
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this
            ->setName($this->commandName)
            ->setDescription('Registering shipment provider key')
            ->addArgument('providerKey', InputArgument::REQUIRED, 'The shipping provider key');
    }

    /**
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $providerKey = $input->getArgument('providerKey');
        $order = OrderFactory::createMocked($providerKey);
        $this->orderService->registerShipping($order);

        return 0;
    }
}
