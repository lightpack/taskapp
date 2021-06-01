<?php

class Console
{
    private $args = [];
    private $script;

    public function register(
        string $short = '',
        string $long = '',
        bool $hasValue = false,
        string $help = '',
        callable $callback = null
    ) {
        $this->args[] = [
            'short' => $short,
            'long' => $long,
            'has_value' => $hasValue,
            'help' => $help,
            'callback' => $callback,
        ];
    }

    public function run()
    {
        $options = $this->getOptions();

        foreach($options['long'] as $key => $option) {
            foreach($this->args as $arg) {
                if($arg['long'] === $key) {
                    if($arg['has_value'] && $option === null) {
                        $this->displayHelp();
                        exit;
                    }

                    if($arg['callback']) {
                        $arg['callback']($option);
                    }

                    return;
                }
            }
        }

        foreach($options['short'] as $key => $option) {
            foreach($this->args as $arg) {
                if($arg['short'] === $key) {
                    if($arg['has_value'] && $option === null) {
                        $this->displayHelp();
                        exit;
                    }

                    if($arg['callback']) {
                        $arg['callback']($option);
                    }

                    return;
                }
            }
        }
    }

    private function getOptions()
    {
        $parsedOptions = ['long' => [], 'short' => []];

        global $argv;
        $this->script = $argv[0];
        array_shift($argv);

        foreach ($argv as $option) {
            $option = explode('=', $option);

            if (strpos($option[0], '--') === 0) {
                $key = 'long';
            } else if (strpos($option[0], '-') === 0) {
                $key = 'short';
            }

            $data = trim($option[1] ?? null);
            $parsedOptions[$key][ltrim($option[0], '\s-')] = $data ? $data : null;
        }

        return $parsedOptions;
    }

    private function displayHelp()
    {
        echo "Usage: {$this->script}\n";

        foreach($this->args as $arg) {
            $help = $arg['help'];
            echo "$help\n";
        }
    }
}

$console = new Console;

$console->register('c', 'cipher', true, 'Cryptographic hashing', function($value) {
    echo 'HASH:' . $value . "\n";
});

$console->run();
