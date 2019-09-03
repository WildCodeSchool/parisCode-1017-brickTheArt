<?php

namespace BrickTheArt\Controllers;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class DefaultController
{
	/** @var Environment */
	protected $twig;

	public function __construct()
	{
		$loader = new FilesystemLoader('../src/Views/');
		$this->twig = new Environment($loader, array(
			'cache' => false,
			'debug' => true
		));
		$this->twig->addExtension(new DebugExtension());
	}
}
