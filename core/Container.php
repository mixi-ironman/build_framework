<?php
namespace Core;

    class Container {
    protected $instances = [];

    // Đăng ký một class vào container
    public function bind($key, $resolver) {
        $this->instances[$key] = $resolver;
    }

    // Lấy class từ container
    public function make($key) {
        if (isset($this->instances[$key])) {
            return call_user_func($this->instances[$key]);
        }

        throw new \Exception("Class $key không được tìm thấy trong container.");
    }
}