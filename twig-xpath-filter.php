<?php
/*
 * Copyright (c) 2017 Tuukka Norri
 * This code is licensed under MIT license (see LICENSE for details).
 */

namespace Grav\Plugin;

use Grav\Common\Plugin;

class TwigXPathFilterPlugin extends Plugin
{
	public static function getSubscribedEvents()
	{
		return [
			'onPluginsInitialized' => ['onPluginsInitialized', 0]
		];
	}

	public function onPluginsInitialized()
	{
		// Don't proceed if we are in the admin plugin.
		if ($this->isAdmin())
		{
			return;
		}

		$this->enable([
			'onTwigExtensions' => ['onTwigExtensions', 0]
		]);
	}

	public function onTwigExtensions()
	{
		require_once(__DIR__ . '/twig/TwigXPathFilterExtension.php');
		$this->grav['twig']->twig->addExtension(new \TwigXPathFilterExtension());
	}
}

?>
