<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 31.10.14
 * Time: 0:06
 */

interface Item {
    public function crack();
}

class Forum implements Item {
    public function crack() {
        return true;
    }
}

class Social implements Item {
    public function crack() {
        return true;
    }
}

class HomePage implements Item {
    public function crack() {
        return true;
    }
}

class Soft implements Item {
    public function crack() {
        return false;
    }
}

class Email implements Item {
    public function crack() {
        return false;
    }
}


class Xaker {
    public static function crack($name) {
        if($name instanceof Item) {
            $ob = new $name;
            return $ob->crack();
        } else {
            trigger_error("Wrong class name", E_USER_ERROR);
        }
    }
}

$call = "Soft";
echo $result = Xaker::crack($call);