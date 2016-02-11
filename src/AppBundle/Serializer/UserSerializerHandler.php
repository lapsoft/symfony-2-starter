<?php
namespace AppBundle\Serializer;

use Sonata\CoreBundle\Serializer\BaseSerializerHandler;

class UserSerializerHandler extends BaseSerializerHandler
{
    public static function getType()
    {
        return 'post_type';
    }
}
