<?php

namespace App\Service\Data;

interface dataServiceInterface {
    public function getData($url);
    
    public function setPostData($params);
} 