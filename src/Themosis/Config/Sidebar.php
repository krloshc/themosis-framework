<?php

namespace Themosis\Config;

use Themosis\Hook\Action;

class Sidebar
{
    /**
     * Save list of sidebars.
     */
    protected $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
        Action::listen('init', $this, 'install')->dispatch();
    }

    /**
     * Run by the 'init' hook.
     * Execute the "register_sidebar" function from WordPress.
     */
    public function install()
    {
        if (is_array($this->data) && !empty($this->data)) {
            foreach ($this->data as $sidebar) {
                register_sidebar($sidebar);
            }
        }
    }
}
