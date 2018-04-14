<?php
class System
{
        static function currentTimeMillis()
        {
                list($usec, $sec) = explode(" ",microtime());
                return $sec.substr($usec, 2, 3);
        }

}

class NetAddress
{
        private $Name = 'localhost';
        private $IP = '127.0.0.1';
        static function getLocalHost() // static
        {
                $address = new NetAddress();
                $address->Name = $_ENV["COMPUTERNAME"];
                $address->IP = $_SERVER["SERVER_ADDR"];
                return $address;
        }
        function toString()
        {
                return strtolower($this->Name.'/'.$this->IP);
        }
}
class Random
{
        static function nextLong()
        {
                $tmp = rand(0,1)?'-':'';
                return $tmp.rand(1000, 9999).rand(1000, 9999).rand(1000, 9999).rand(100, 999).rand(100, 999);
        }
}
// 三段
// 一段是微秒 一段是地址 一段是随机数
class Guid
{
        private $valueBeforeMD5;
        private $valueAfterMD5;
        public function __construct()
        {
                $this->getGuid();
        }
//
        function getGuid()
        {
                $address = NetAddress::getLocalHost();
                $this->valueBeforeMD5 = $address->toString().':'.System::currentTimeMillis().':'.Random::nextLong();
                $this->valueAfterMD5 = md5($this->valueBeforeMD5);
        }
        function newGuid()
        {
                $Guid = new Guid();
                return $Guid;
        }
        function toString()
        {
                $raw = strtoupper($this->valueAfterMD5);
                return substr($raw,0,8).substr($raw,-8);
        }
}
?>