<?php
    namespace Core;

    class View
    {
        public function render(Page $page)
        {
            return $this->renderLayout($page, $this->renderView($page));
        }

        private function renderLayout(Page $page, $content)
        {
            $layoutPath = SDR . "/project/layouts/{$page->layout}.php";

            if (file_exists($layoutPath))
            {
                ob_start();
                    $title = $page->title;
                    include $layoutPath;
                return ob_get_clean();
            }            
        }

        private function renderView(Page $page)
        {
            $viewPath = SDR . "/project/views/{$page->view}.php";

            if (file_exists($viewPath))
            {
                ob_start();
                    $data = $page->data;
                    extract($data);
                    include $viewPath;
                return ob_get_clean();
            }
        }
    }
