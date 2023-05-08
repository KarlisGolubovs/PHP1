<?php declare(strict_types=1);

namespace App\Core;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class View
{
    private Environment $twig;

    public function __construct(string $templatePath, array $properties)
    {
        $loader = new FilesystemLoader($templatePath);
        $this->twig = new Environment($loader);

        foreach ($properties as $key => $value) {
            $this->twig->addGlobal($key, $value);
        }
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function render(string $templateName): string
    {
        return $this->twig->render($templateName);
    }
}

