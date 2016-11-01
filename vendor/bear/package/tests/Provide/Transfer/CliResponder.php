<?php
/**
 * This file is part of the *** package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace BEAR\Sunday\Provide\Transfer;

use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Extension\Transfer\TransferInterface;

class CliResponder implements TransferInterface
{
    public function __invoke(ResourceObject $resourceObject)
    {
        // code
        http_response_code($resourceObject->code);

        // header
        foreach ($resourceObject->headers as $label => $value) {
            header("{$label}: {$value}", false);
        }

        // RFC 4627
        // @see http://www.rfc-editor.org/rfc/rfc4627.txt
        header('content-type: application/json; charset=utf-8');

        // body
        echo (string) $resourceObject;
    }
}
