<?php
    use Idobata;

    class IdobataTest extends PHPUnit_Framework_TestCase {

        protected function setUp() {
            $hook_id = "__HOOK_ID__";
            $this->idobata = new Idobata($hook_id);
        }

        /*
         *
         * @expectedException PHPUnit_Framework_Error
         */
        public function testSendMassageCaseSuccess() {
            $this->assertTrue($this->idobata->setMessage("test送信です")->send());
        }

        public function testSendMessageCaseFailed() {
            try {
                $this->idobata->setMessage("")->send();
                $this->fail('例外発生なし');
            } catch (Exception $e) {
                $this->assertTrue(true);
            }
        }

        public function testSendLabelCaseSuccess() {
            $this->assertTrue($this->idobata->setLabel(Idobata::LABEL_WARNING,"わーにんぐ")->send());
        }

        public function testSendLabelCaseFailed() {
            try {
                $this->idobata->setLabel()->send();
                $this->fail('例外発生なし');
            } catch (Exception $e) {
                $this->assertTrue(true);
            }
        }

        public function testSendBadgeCaseSuccess() {
            $this->assertTrue($this->idobata->setBadge(Idobata::BADGE_IMPORTANT,999)->send());
        }

        public function testSendBadgeCaseFailed() {
            try {
                $this->idobata->setBadge()->send();
                $this->fail('例外発生なし');
            } catch (Exception $e) {
                $this->assertTrue(true);
            }
        }

        public function testSendTimeStampCaseSuccess() {
            $this->assertTrue($this->idobata->setMessage("バッチ処理終了")->setTimestamp("2014-05-04 12:00:00")->send());
        }
    }
