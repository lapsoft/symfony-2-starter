<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),

			new JMS\SerializerBundle\JMSSerializerBundle(),
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
			new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\TranslationBundle\SonataTranslationBundle(),
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            new Sonata\ClassificationBundle\SonataClassificationBundle(),
			new Sonata\MediaBundle\SonataMediaBundle(),
			new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
			new Sonata\SeoBundle\SonataSeoBundle(),
            new Sonata\CacheBundle\SonataCacheBundle(),
			new Sonata\FormatterBundle\SonataFormatterBundle(),
			new Sonata\NewsBundle\SonataNewsBundle(),
			
			new Genemu\Bundle\FormBundle\GenemuFormBundle(), // Select2, Datepicker etc. https://github.com/genemu/GenemuFormBundle
			new Liip\ImagineBundle\LiipImagineBundle(), // img filters https://github.com/liip/LiipImagineBundle
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(), // doctrine extensions Sluggable, Sortable etc. https://symfony.com/doc/master/bundles/StofDoctrineExtensionsBundle/index.html
            new FOS\UserBundle\FOSUserBundle(),
			new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
			new Lexik\Bundle\FormFilterBundle\LexikFormFilterBundle(),

            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Knp\DoctrineBehaviors\Bundle\DoctrineBehaviorsBundle(),
            new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle(),
			
            new Application\Sonata\ClassificationBundle\ApplicationSonataClassificationBundle(),
            new Application\Sonata\MediaBundle\ApplicationSonataMediaBundle(),
			new Application\Sonata\UserBundle\ApplicationSonataUserBundle(),
            new Application\Sonata\NewsBundle\ApplicationSonataNewsBundle(),

//          new Knp\Bundle\SnappyBundle\KnpSnappyBundle(), // screenshoots
//            
//            new Sonata\NotificationBundle\SonataNotificationBundle(),
//            new Application\Sonata\NotificationBundle\ApplicationSonataNotificationBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
    
    public function __construct($environment, $debug)
    {
        date_default_timezone_set( 'Europe/Berlin' );
        ini_set('memory_limit', '256M');
        parent::__construct($environment, $debug);
    }
}
