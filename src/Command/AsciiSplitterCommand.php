<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 5/7/18
 * Time: 19:48
 */

namespace App\Command;


use App\Utils\Asciify;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AsciiSplitterCommand extends Command
{

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('asciify:word')
            // configure an argument
            ->addArgument('string', InputArgument::REQUIRED, 'The word for converting to ascii.')
            // the short description shown while running "php bin/console list"
            ->setDescription('Split the word in its equivalent ascii code.')
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you see letter by letter theirs ascii code');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // retrieve the argument value using getArgument()
        $string = $input->getArgument('string');
        $word   = new Asciify($string);

        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            '+----------------+',
            '| letter | ascii |',
            '+----------------+',
        ]);

        foreach ($word->splitStringToAscii() as $column) {
            $output->writeln([
                 '     ' . $column['letter'] . '   |   ' . $column['ascii'],
                '------------------',
            ]);
        }


    }
}