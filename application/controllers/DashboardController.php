<?php
/* Duo Column Dashboard Module | (c) 2025 | GPLv2+ */

namespace Icinga\Module\Duocolumn\Controllers;

use Icinga\Web\Controller;
use Icinga\Web\Widget\Dashboard;
use Icinga\Web\Widget\Tabextension\DashboardSettings;
use Icinga\Web\Url;

/**
 * Duo Column Dashboard Controller
 * 
 * Displays the dashboard with all dashlets in a two column layout
 * instead of the default responsive multi-column grid.
 */
class DashboardController extends Controller
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    public function init()
    {
        $this->dashboard = new Dashboard();
        $this->dashboard->setUser($this->Auth()->getUser());
        $this->dashboard->load();
    }

    /**
     * Display the dashboard in duo column layout
     */
    public function indexAction()
    {
        $this->createTabs();
        
        if (! $this->dashboard->hasPanes()) {
            $this->view->title = 'Dashboard - Duo Column';
        } else {
            $panes = array_filter(
                $this->dashboard->getPanes(),
                function ($pane) {
                    return ! $pane->getDisabled();
                }
            );
            
            if (empty($panes)) {
                $this->view->title = 'Dashboard - Duo Column';
                $this->getTabs()->add('dashboard', array(
                    'active'    => true,
                    'title'     => $this->translate('Dashboard'),
                    'url'       => Url::fromRequest()
                ));
            } else {
                if ($this->_getParam('pane')) {
                    $pane = $this->_getParam('pane');
                    $this->dashboard->activate($pane);
                }
                
                if ($this->dashboard === null) {
                    $this->view->title = 'Dashboard - Duo Column';
                } else {
                    $this->view->title = $this->dashboard->getActivePane()->getTitle() . ' :: Duo Column Dashboard';
                    $this->view->dashboard = $this->dashboard;
                }
            }
        }
    }

    /**
     * Create tab aggregation with pane tabs and settings
     */
    private function createTabs()
    {
        $tabs = $this->dashboard->getTabs();
        
        // Update tab URLs to point to our duo column controller
        foreach ($tabs as $tab) {
            $url = $tab->getUrl();
            if ($url && strpos($url->getPath(), 'dashboard') !== false) {
                $url->setPath('duocolumn/dashboard');
            }
        }
        
        // Add a "Grid View" tab to switch back to normal view
        $tabs->add('grid-view', array(
            'title' => $this->translate('Switch to grid layout'),
            'label' => $this->translate('Grid View'),
            'icon'  => 'th',
            'url'   => 'dashboard',
            'urlParams' => array('pane' => $this->_getParam('pane'))
        ));
        
        $tabs->extend(new DashboardSettings());
        $this->view->tabs = $tabs;
    }
}
