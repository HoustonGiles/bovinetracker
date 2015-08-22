<?php
namespace Bovinetracker;

class Router {
    protected $config;

    public function start($route) {

        $this->config = \Bovinetracker\Config::get('routes');

        if (empty($route) || $route == '/') {
            if (isset($this->config['default'])) {
                $route = $this->config['default'];
            } else {
                $this->error($e->getMessage());
            }
        }

        try {
            foreach ($this->config['routes'] as $path => $defaults) {
                $regex = '@' . preg_replace(
                    '@:([\w]+)@',
                    '(?P<$1>[^/]+)',
                    str_replace(')', ')?', (string) $path)
                ) . '@';
                $matches = [];
                if (preg_match($regex, $route, $matches)) {
                    $options = $defaults;
                    foreach ($matches as $key => $value) {
                        if (is_numeric($key)) {
                            continue;
                        }
                        $options[$key] = $value;
                        if (isset($defaults[$key])) {
                            if (strpos($defaults[$key], ":$key") !== false) {
                                $options[$key] = str_replace(":$key", $value, $defaults[$key]);
                            }
                        }
                    }
                    if (isset($options['controller']) && isset($options['action'])) {
                        $callable = [$options['controller'], $options['action'] . 'Action'];
                        if (is_callable($callable)) {
                            $callable = [new $options['controller'], $options['action'] . 'Action'];
                            $callable($options);
                            return;
                        } else {
                            $this->error('Page not found.');
                        }
                    } else {
                        $this->error('Page not found.');
                    }
                }
            }
        } catch (\Bovinetracker\Controller\Exception $e) {
            $this->error($e->getMessage());
        }

    }

    public function error($message = '') {
        if (isset($this->config['errors'])) {
            $route = $this->config['errors'];
            $this->start($route.'/'.$message);
        } else {
            echo "An unknown error occurred, please try again!";
        }

        exit;
    }

}