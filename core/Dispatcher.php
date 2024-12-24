<?php
    namespace Core;

    /* https://code.mu/ru/php/book/oop/mvc/framework/view/ */

    class Dispatcher
    {
        public function getPage(Track $track)
        {
            $className = ucfirst($track->controller) . 'Controller';
            $fullName = '\\Project\\Controllers\\' . $className;

            try
            {
                $controller = new $fullName;

                if (method_exists($controller, $track->action))
                {
                    $result = $controller->{$track->action}($track->params);
                    
                    if ($result)
                    {
                        return $result;
                    }
                    else
                    {
                        return new Page('default');
                    }
                }
                else
                {
                    echo "Метод $track->action не найден в классе $fullName"; die();
                }
            }
            catch (\Exception $error)
            {
                echo $error->getMessage(); die();
            }
        }
    }
