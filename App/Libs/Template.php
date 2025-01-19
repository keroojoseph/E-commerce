<?php

namespace App\Libs;

class Template
{
    private $_templateParts;
    private $_action_view;
    private $_data;
    public function __construct(array $template)
    {
        $this->_templateParts = $template;
    }

    /**
     * @param mixed $actionViewFile
     */
    public function setActionViewFile($actionViewFile)
    {
        $this->_action_view = $actionViewFile;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->_data = $data;
    }

    private function renderTemplateHeaderStart()
    {
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templateHeaderStart.php';
    }

    private function renderTemplateHeaderEnd()
    {
        extract($this->_data);
        require_once TEMPLATE_PATH . 'templateHeaderEnd.php';
    }

    private function renderTemplateFooter()
    {
        extract($this->_data);
        require_once TEMPLATE_PATH . 'footer.php';
    }

    private function renderTemplateBlocks()
    {
        if(!array_key_exists('template', $this->_templateParts)) {
            trigger_error('Sorry Not Available template key', E_USER_ERROR);
        } else {
            $parts = $this->_templateParts['template'];

            if(!empty($parts)) {
                extract($this->_data);
                foreach($parts as $partKey => $partValue) {

                    if($partKey === ':view')
                    {
                        require_once $this->_action_view;
                    } else {
                        include_once $partValue;
                    }
                }
            }
        }
    }

    private function renderHeaderResources()
    {
        $output = '';

        if(!array_key_exists('header_resource', $this->_templateParts)) {
            trigger_error('Sorry Not Available header_resource key', E_USER_ERROR);
        } else {
            $resources = $this->_templateParts['header_resource'];

            // Generate Css links
            $css = $resources['css'];

            if(!empty($css)) {
                foreach($css as $cssKey => $cssValue) {
                    $output .= '<link href="'.$cssValue.'" rel="stylesheet">';
                }
            }

            // Generate JS scripts
            $js = $resources['js'];

            if(!empty($js)) {
                foreach($js as $jsKey => $jsValue) {
                    $output .= '<script src="'.$jsValue.'"></script>';
                }
            }
        }
        echo $output;
    }

    private function renderFooterResources()
    {
        $output = '';

        if(!array_key_exists('footer_resource', $this->_templateParts)) {
            trigger_error('Sorry Not Available footer_resource key', E_USER_ERROR);
        } else {
            $resources = $this->_templateParts['footer_resource'];

            if(!empty($resources)) {
                foreach($resources as $resourcesKey => $resourcesValue) {
                    $output .= '<script src="'.$resourcesValue.'"></script>';
                }
            }
        }
        echo $output;
    }

    public function renderApp()
    {
        $this->renderTemplateHeaderStart();
        $this->renderHeaderResources();
        $this->renderTemplateHeaderEnd();
        $this->renderTemplateBlocks();
        $this->renderTemplateFooter();
    }
}