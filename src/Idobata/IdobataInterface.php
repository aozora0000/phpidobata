<?php
    namespace Idobata;
    Interface IdobataInterface
    {
        /**
         *  create Idobata instance
         *
         *  @params integer $fook_id
         *  @return this
         */
        public function __construct($hook_id);

        /**
         *  setting message
         *
         *  @params string $message
         *  @return this
         */
        public function setMessage($message);

        /**
         *  setting label
         *
         *  @params string $label
         *  @params string $class
         *  @return this
         */
        public function setLabel($class,$label);

        /**
         *  setting badge
         *
         *  @params string $badge
         *  @params string $class
         *  @return this
         */
        public function setBadge($class,$badge);

        /**
         *  setting timestamp after message
         *
         *  @params string $timestamp
         *  @return this
         */
        public function setTimestamp($timestamp);

        /**
         *  create sendbody method
         *
         *  @params string $label
         *  @params string $badge
         *  @params string $message
         *  @return string
         */
        //private static function createBody($label,$badge,$message);

        /**
         *  send message
         *
         *  @return boolean
         */
        public function send();
    }
