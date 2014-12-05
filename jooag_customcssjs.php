<?php
/**
 * @package 	JooAg CustomCssJs
 * @version 	3.x.0 Beta
 * @for 	Joomla 3.3+ 
 * @author 	Joomla Agentur - http://www.joomla-agentur.de
 * @copyright 	Copyright (c) 2009 - 2015 Joomla-Agentur All rights reserved.
 * @license 	GNU General Public License version 2 or later;
 * @description A small Plugin to include custom CSS and JS files
 */

defined('_JEXEC') or die;

class plgSystemJooag_CustomCssJs extends JPlugin {
	
	public function onAfterInitialise() {
	
    	$app = JFactory::getApplication();
    	$doc = JFactory::getDocument();

    	if ($app->isAdmin()){
			if( file_exists($this->params->get('backcss')) and $this->params->get('backcssposition') == '1'){
				$doc->addStyleSheet($this->params->get('backcss'));
			}
			if( file_exists($this->params->get('backjs')) and $this->params->get('backjsposition') == '1'){
				$doc->addScript($this->params->get('backjs'));
			}	
        }
		else{ 
			if( file_exists($this->params->get('frontcss')) and $this->params->get('frontcssposition') == '1'){
				$doc->addStyleSheet($this->params->get('frontcss'));
			}	
			
			if( file_exists($this->params->get('frontjs')) and $this->params->get('frontjsposition') == '1'){
				$doc->addScript($this->params->get('frontjs'));
			}	
        }
    }
	
	public function onBeforeRender() {
	
    	$app = JFactory::getApplication();
    	$doc = JFactory::getDocument();

    	if ($app->isAdmin()){
			if( file_exists($this->params->get('backcss')) and $this->params->get('backcssposition') == '0'){
				$doc->addStyleSheet($this->params->get('backcss'));
			}
			if( file_exists($this->params->get('backjs')) and $this->params->get('backjsposition') == '0'){
				$doc->addScript($this->params->get('backjs'));
			}	
        }
		else{ 
			if( file_exists($this->params->get('frontcss')) and $this->params->get('frontcssposition') == '0'){
				$doc->addStyleSheet($this->params->get('frontcss'));
			}	
			
			if( file_exists($this->params->get('frontjs')) and $this->params->get('frontjsposition') == '0'){
				$doc->addScript($this->params->get('frontjs'));
			}	
        }
    }
}