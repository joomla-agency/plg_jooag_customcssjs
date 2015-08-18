<?php
/**
 * @package 	JooAg CustomCssJs
 * @version 	3.1.0
 * @for 	Joomla 3.4+ 
 * @author 	Joomla Agentur - http://www.joomla-agentur.de
 * @copyright 	Copyright (c) 2009 - 2015 Joomla-Agentur All rights reserved.
 * @license 	GNU General Public License version 2 or later;
 * @description A small Plugin to include custom CSS and JS files
 */

defined('_JEXEC') or die;

class plgSystemJooag_CustomCssJs extends JPlugin {
	
	public function onAfterInitialise()
	{
		$this->checkState('frontend', 'frontFilesFirst');
		$this->checkState('backend', 'backFilesFirst');
	}
	
	public function onBeforeRender()
	{
		$this->checkState('frontend', 'frontFilesLast');
		$this->checkState('backend', 'backFilesLast');
	}
	
	public function checkState($state, $xmlName){
		
		$app = JFactory::getApplication();
		
		if($state == 'frontend' and $app->isSite())
		{
			$this->checkAddFileType($xmlName);
		}
		
		if($state == 'backend' and $app->isAdmin())
		{
			$this->checkAddFileType($xmlName);
		}
	}
	
	public function checkAddFileType($xmlName)
	{
		$doc = JFactory::getDocument();
					
		if($this->params->get($xmlName))
		{
			foreach($this->params->get($xmlName) as $file)
			{
				if(pathinfo('media/customcssjs/'.$file)['extension'] == 'css')
				{
					$doc->addStyleSheet(JURI::root().'media/customcssjs/'.$file);
				}

				if(pathinfo('media/customcssjs/'.$file)['extension'] == 'js')
				{
					$doc->addScript(JURI::root().'media/customcssjs/'.$file);
				}
			}
		}
	}
}