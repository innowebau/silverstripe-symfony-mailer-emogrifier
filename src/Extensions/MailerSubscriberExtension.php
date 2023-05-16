<?php

namespace Innoweb\SymfonyMailerEmogrifier\Extensions;

use Pelago\Emogrifier\CssInliner;
use SilverStripe\Control\Email\Email;
use SilverStripe\Core\Extension;
use Symfony\Component\Mailer\Event\MessageEvent;
use SilverStripe\Assets\File;
use SilverStripe\Core\Config\Configurable;
use SilverStripe\Core\Path;

class MailerSubscriberExtension extends Extension
{
    use Configurable;

    private static $css_file = null;

    private $css = null;

    private function getCss(): ?string
    {
        if (!$this->css && ($file = $this->config()->css_file)) {
            $this->loadCssFromFile($file);
        }
		return $this->css;
    }

    private function loadCssFromFile($file)
    {
        if (file_exists($file)) {
            $path = $file;
        } else {
            $path = Path::join(BASE_PATH, $file);
            if (!file_exists($path)) {
                throw new \InvalidArgumentException('File at "' . $path . '" does not exist');
            }
        }

        if (strtolower(File::get_file_extension($path)) !== 'css') {
            throw new \InvalidArgumentException('File "' . $path . '" does not have .css extension.');
        }

        $this->css = file_get_contents($path);

    }

    protected function updateOnMessage(Email $email, MessageEvent $event)
    {
        if ($body = $email->getHtmlBody()) {
            $html = CssInliner::fromHtml($body)->inlineCss($this->getCss() ?? '')->render();
            $email->html($html);
        }
    }
}

