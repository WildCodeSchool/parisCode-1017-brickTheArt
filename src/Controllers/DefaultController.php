<?php

namespace BrickTheArt\Controllers;

use BrickTheArt\Model\Repository\ContactManager;
use Twig_Loader_Filesystem;
use Twig_Environment;
use Twig_Extension_Debug;

/**
 * Class DefaultController
 */
class DefaultController
{
	/**
	 * @var Twig_Environment
	 */
	protected $twig;

	/**
	 * Twig DefaultController constructor.
	 */
	public function __construct()
	{
		$loader = new Twig_Loader_Filesystem('../src/Views/');
		$this->twig = new Twig_Environment($loader, array(
			'cache' => false,
			'debug' => true
		));
		$this->twig->addExtension(new Twig_Extension_Debug());
	}

}