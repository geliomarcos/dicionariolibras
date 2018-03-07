<?php
    App::uses('Component', 'Controller');
    class CryptComponent extends Component{
        public function cryptParams($param = null) {
            return bin2hex(Security::cipher(serialize($param),Configure::read('Security.salt')));
        }

        public function decryptParams($param = null) {
            return unserialize(Security::cipher(pack("H*",$param),Configure::read('Security.salt')));
        }
    }
?>