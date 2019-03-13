<?php
namespace Postcode\Check\Model;

use Postcode\Check\Api\HelloInterface;
 
class Hello implements HelloInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name Users name.
     * @return string Greeting message with users name.
     */
    public function name($name) {

        $returnArray['text'] = "Welcome";

        $returnArray['message'] = $name;

        return json_encode($returnArray);

        
    }
}