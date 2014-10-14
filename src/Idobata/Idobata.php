<?php
    namespace Idobata;
    class Idobata implements IdobataInterface
    {
        const ENDPOINT = "https://idobata.io/hook/%s";
        protected $api,$label,$badge,$message;

        public function __construct($hook_id)
        {
            $this->api = sprintf(self::ENDPOINT,$hook_id);
            $this->message = "";
            $this->badge   = "";
            $this->label   = "";
        }

        public function setMessage($message)
        {
            $this->message = $message."<br/>";
            return $this;
        }

        public function setLabel($class,$label)
        {
            $this->label = sprintf("<span class='label %s'>%s</span>",$class,$label);
            return $this;
        }

        public function setBadge($class,$badge)
        {
            $this->badge = sprintf("<span class='badge %s'>%s</span>",$class,$badge);
            return $this;
        }

        public function setTimestamp($timestamp = null)
        {
            $this->message .= (is_null($timestamp)) ? sprintf("<b>%s</b>",date("Y-m-d H:i:s"))."<br/>" : sprintf("<b>%s</b>",$timestamp)."<br/>";
            return $this;
        }

        private static function createBody($label,$badge,$message)
        {
            $body = "";
            $body .= ($label == "") ? "" : $label."<br/>";
            $body .= ($badge == "") ? "" : $badge."<br/>";
            $body .= ($message == "") ? "" : $message;
            return $body;
        }

        public function send()
        {
            \Requests::register_autoloader();
            $params = array(
                "source" => self::createBody($this->label,$this->badge,$this->message),
                "format" =>"html"
            );
            $response = \Requests::post($this->api,array(),$params);
            if($response->success) {
                return true;
            } else {
                $errorMessage = json_decode($response->body);
                throw new \Exception($errorMessage->message);
                return false;
            }
        }
    }
