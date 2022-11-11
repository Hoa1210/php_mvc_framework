<?php
class Controller
{

    public function loadModel($modelName)
    {
        $modelName = 'm_' . $modelName;

        if (file_exists('models/' . $modelName . '.php')) {
            require_once 'models/' . $modelName . '.php';
            return new $modelName();
        }
    }
    public function loadView($viewName, $data = [])
    {
        
        if (file_exists('views/' . $viewName . '.php')) {
            if (strlen(strstr($viewName, "auth")) > 0) {
                // kiểm tra trong $viewName có auth không , bằng cách lấy ra chuỗi con trong $viewName rồi kiểm tra độ dài 
                require_once 'views/' . $viewName . '.php';
            } else {
                require_once 'views/layouts/master.php';
            }
        }
    }
    public function base_url($url = '')
    {
        $a = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
        if ($a == 'http://localhost') {
            $a = _WEB_ROOT;
        }
        return $a . '/' . $url;
    }

    public function redirect($url)
    {
        header("Location: {$url}");
        exit();
    }
}
