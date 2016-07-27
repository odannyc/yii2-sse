<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package yii2-sse
 */
namespace odannyc\Yii2SSE;

use Sse\Event;
use Sse\SSE;
use yii\base\Component;

/**
 * Main wrapper for the LibSSE-php package.
 */
class LibSSE extends Component
{
    private $sseInstance;

    /**
     * @param $event
     * @param $handler
     */
    public function addEventListener($event, Event $handler)
    {
        $this->getInstance()->addEventListener($event, $handler);
    }

    /**
     * @return null
     */
    public function start()
    {
        $this->getInstance()->start();
    }

    /**
     * @return SSE
     */
    private function getInstance()
    {
        if ($this->sseInstance == null) {
            $this->sseInstance = new SSE();
        }

        return $this->sseInstance;
    }
}