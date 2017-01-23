<?php

namespace Opbol\Menu;

class Menu {

    /**
     * Menu collection
     *
     * @var Collection
     */
    protected $menus;

    /**
     * Initializing the menu builder
     */
    public function __construct()
    {
        // creating a collection for storing menus
        $this->menus = new Collection();
    }

    /**
     * Create a new menu instance
     *
     * @param  string $name
     * @param  callable $callback
     * @return \Opbol\Menu\Menu
     */
    public function make($name, $callback)
    {
        $menu = $this->menus->get($name);
        if (!$menu) {
            $this->menus->put($name, ($menu = new Builder($name)));
        }

        if (is_callable($callback)) {
            // Registering the items
            call_user_func($callback, $menu);
        }

        return $menu;
    }

    public function has($key)
    {
        return $this->menus->has($key);
    }

    /**
     * Return Menu instance from the collection by key
     *
     * @param  string $key
     * @return \Opbol\Menu\Item
     */
    public function get($key)
    {
        return $this->menus->get($key);
    }

    /**
     * Alias for getCollection
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->menus;
    }

}
