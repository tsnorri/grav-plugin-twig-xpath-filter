<?php
/*
 * Copyright (c) 2017 Tuukka Norri
 * This code is licensed under MIT license (see LICENSE for details).
 */


class TwigXPathFilterExtension extends \Twig_Extension
{
	public function getName()
	{
		return 'TwigXPathFilterExtension';
	}
	
	public function getFilters()
	{
		return [
			'xpath' => new \Twig_SimpleFilter('xpath', function ($domContent, $xpathExp, $returnNodeList = false) {
				if (!$domContent)
					return null;
				
				// Create a DOM from the given content and a DOMXpath from the model.
				$dom = new DOMDocument();
				$dom->encoding = "UTF-8";
				$dom->loadHTML('<?xml encoding="utf-8" ?>' . $domContent); // XML encoding needed to treat the input as UTF-8.
				$xpath = new DOMXpath($dom);
				
				// Evaluate the expression.
				// If query() does not throw on invalid XPath, do it anyway.
				$nodes = $xpath->query($xpathExp);
				if (false === $nodes)
					throw new RuntimeException(sprintf("Invalid XPath expression '%s'", $xpathExp));
				
				if ($returnNodeList)
					return $nodes;
				
				// Get the HTML for each node in the list.
				$innerHTML= ''; 
				foreach ($nodes as $node)
					$innerHTML .= $node->ownerDocument->saveHTML($node);
				
				return $innerHTML;
			})
		];
	}
}

?>
