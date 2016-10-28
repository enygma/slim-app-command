<?php

namespace App\Command\Route;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class NewCommand extends Command
{
    public function configure()
    {
        $this->setName('route:new')
            ->setDescription('Adds a new route to the application')
            ->setHelp('This command allows you to add a new route to the application');

        $this->addArgument('route', InputArgument::REQUIRED, 'The route path to add');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $route = explode('/', $input->getArgument('route'));
        if (count($route) > 2) {
            throw new \InvalidArgumentException('Invalid route, must be in format: "<controller>/<action>"');
        }

        $output->writeln('Adding route: '.implode('/', $route));

        $this->addController($route);
        $this->addTemplate($route);

        /**
         * this command should:
         * - create a new directory in the templates folder for the
         */
    }

    private function addController(array $route)
    {
        list($controller, $action) = $route;
    }
    private function addTemplate(array $route)
    {
        list($controller, $action) = $route;
    }
}
