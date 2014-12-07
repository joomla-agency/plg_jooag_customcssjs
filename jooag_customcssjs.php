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
			if( strpos($this->params->get('backcss'), 'css') and $this->params->get('backcssposition') == '1'){
				$doc->addStyleSheet(JURI::root().'media/customcssjs/'.$this->params->get('backcss'));
			}
			if( strpos($this->params->get('backjs'), 'js') and $this->params->get('backjsposition') == '1'){
				$doc->addScript(JURI::root().'media/customcssjs/'.$this->params->get('backjs'));
			}	
        }
		else{ 
			if( strpos($this->params->get('frontcss'), 'css') and $this->params->get('frontcssposition') == '1'){
				$doc->addStyleSheet('media/customcssjs/'.$this->params->get('frontcss'));
			}		
			if( strpos($this->params->get('frontjs'), 'js') and $this->params->get('frontjsposition') == '1'){
				$doc->addScript('media/customcssjs/'.$this->params->get('frontjs'));
			}	
        }
    }
	
	public function onBeforeRender() {
	
    	$app = JFactory::getApplication();
    	$doc = JFactory::getDocument();

    	if ($app->isAdmin()){
			if( strpos($this->params->get('backcss'), 'css') and $this->params->get('backcssposition') == '0'){
				$doc->addStyleSheet('media/customcssjs/'.$this->params->get('backcss'));
			}
			if( strpos($this->params->get('backjs'), 'js') and $this->params->get('backjsposition') == '0'){
				$doc->addScript('media/customcssjs/'.$this->params->get('backjs'));
			}	
        }
		else{ 
			if( strpos($this->params->get('frontcss'), 'css') and $this->params->get('frontcssposition') == '0'){
				$doc->addStyleSheet('media/customcssjs/'.$this->params->get('frontcss'));
			}		
			if( strpos($this->params->get('frontjs'), 'js') and $this->params->get('frontjsposition') == '0'){
				$doc->addScript('media/customcssjs/'.$this->params->get('frontjs'));
			}	
        }
    }
}