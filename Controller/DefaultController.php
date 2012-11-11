<?php
/**
 * 
 * @package phpBBStaticPagesBundle
 * @copyright (c) 2012 phpBB Group
 * @license http://opensource.org/licenses/gpl-3.0.php GNU General Public License v3
 * @author Unknown Bliss
 * 
 */

namespace phpBB\StaticPagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function defaultAction($slug)
	{
		$static_templates_location = ':Static:';
		$template_slug = str_replace('/', '.', $slug);
		$template_location = $static_templates_location . $template_slug . '.html.twig';
		$static_variables = array(
			'slug'	=> $slug,
		);

		if(!$this->engine->exists($template_location))
		{
			throw $this->createNotFoundException('This page could not be found');
		}

		return $this->render($template_location, $static_variables);
	}
}
