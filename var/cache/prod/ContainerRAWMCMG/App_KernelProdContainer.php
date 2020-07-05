<?php

namespace ContainerRAWMCMG;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/*
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final
 */
class App_KernelProdContainer extends Container
{
    private $buildParameters;
    private $containerDir;
    private $targetDir;
    private $parameters = [];
    private $getService;

    public function __construct(array $buildParameters = [], $containerDir = __DIR__)
    {
        $this->getService = \Closure::fromCallable([$this, 'getService']);
        $this->buildParameters = $buildParameters;
        $this->containerDir = $containerDir;
        $this->targetDir = \dirname($containerDir);
        $this->parameters = $this->getDefaultParameters();

        $this->services = $this->privates = [];
        $this->syntheticIds = [
            'kernel' => true,
        ];
        $this->methodMap = [
            'App\\Controller\\CategorieController' => 'getCategorieControllerService',
            'App\\Controller\\ClientController' => 'getClientControllerService',
            'App\\Controller\\ClientDateInterval' => 'getClientDateIntervalService',
            'App\\Controller\\CountUserController' => 'getCountUserControllerService',
            'App\\Controller\\FournisseurController' => 'getFournisseurControllerService',
            'App\\Controller\\HomeController' => 'getHomeControllerService',
            'App\\Controller\\ProduitController' => 'getProduitControllerService',
            'App\\EventsSubscriber\\User\\UserRegister' => 'getUserRegisterService',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController' => 'getRedirectControllerService',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController' => 'getTemplateControllerService',
            'api_platform.action.documentation' => 'getApiPlatform_Action_DocumentationService',
            'api_platform.action.entrypoint' => 'getApiPlatform_Action_EntrypointService',
            'api_platform.action.exception' => 'getApiPlatform_Action_ExceptionService',
            'api_platform.action.not_found' => 'getApiPlatform_Action_NotFoundService',
            'api_platform.action.placeholder' => 'getApiPlatform_Action_PlaceholderService',
            'api_platform.jsonld.action.context' => 'getApiPlatform_Jsonld_Action_ContextService',
            'api_platform.swagger.action.ui' => 'getApiPlatform_Swagger_Action_UiService',
            'cache.app' => 'getCache_AppService',
            'cache.app_clearer' => 'getCache_AppClearerService',
            'cache.global_clearer' => 'getCache_GlobalClearerService',
            'cache.system' => 'getCache_SystemService',
            'cache.system_clearer' => 'getCache_SystemClearerService',
            'cache_clearer' => 'getCacheClearerService',
            'cache_warmer' => 'getCacheWarmerService',
            'console.command.public_alias.api_platform.json_schema.json_schema_generate_command' => 'getConsole_Command_PublicAlias_ApiPlatform_JsonSchema_JsonSchemaGenerateCommandService',
            'console.command.public_alias.api_platform.swagger.command.swagger_command' => 'getConsole_Command_PublicAlias_ApiPlatform_Swagger_Command_SwaggerCommandService',
            'console.command_loader' => 'getConsole_CommandLoaderService',
            'container.env_var_processors_locator' => 'getContainer_EnvVarProcessorsLocatorService',
            'doctrine' => 'getDoctrineService',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService',
            'doctrine.orm.default_entity_manager' => 'getDoctrine_Orm_DefaultEntityManagerService',
            'error_controller' => 'getErrorControllerService',
            'event_dispatcher' => 'getEventDispatcherService',
            'filesystem' => 'getFilesystemService',
            'form.factory' => 'getForm_FactoryService',
            'form.type.file' => 'getForm_Type_FileService',
            'gesdinet.jwtrefreshtoken' => 'getGesdinet_JwtrefreshtokenService',
            'gesdinet.jwtrefreshtoken.refresh_token_manager' => 'getGesdinet_Jwtrefreshtoken_RefreshTokenManagerService',
            'http_kernel' => 'getHttpKernelService',
            'lexik_jwt_authentication.check_config_command' => 'getLexikJwtAuthentication_CheckConfigCommandService',
            'lexik_jwt_authentication.encoder' => 'getLexikJwtAuthentication_EncoderService',
            'lexik_jwt_authentication.generate_token_command' => 'getLexikJwtAuthentication_GenerateTokenCommandService',
            'lexik_jwt_authentication.jwt_manager' => 'getLexikJwtAuthentication_JwtManagerService',
            'lexik_jwt_authentication.key_loader' => 'getLexikJwtAuthentication_KeyLoaderService',
            'request_stack' => 'getRequestStackService',
            'router' => 'getRouterService',
            'routing.loader' => 'getRouting_LoaderService',
            'security.authentication_utils' => 'getSecurity_AuthenticationUtilsService',
            'security.authorization_checker' => 'getSecurity_AuthorizationCheckerService',
            'security.csrf.token_manager' => 'getSecurity_Csrf_TokenManagerService',
            'security.password_encoder' => 'getSecurity_PasswordEncoderService',
            'security.token_storage' => 'getSecurity_TokenStorageService',
            'serializer' => 'getSerializerService',
            'services_resetter' => 'getServicesResetterService',
            'session' => 'getSessionService',
            'swiftmailer.mailer.default' => 'getSwiftmailer_Mailer_DefaultService',
            'swiftmailer.mailer.default.transport.real' => 'getSwiftmailer_Mailer_Default_Transport_RealService',
            'swiftmailer.transport' => 'getSwiftmailer_TransportService',
            'translator' => 'getTranslatorService',
            'twig' => 'getTwigService',
            'validator' => 'getValidatorService',
        ];
        $this->aliases = [
            'ApiPlatform\\Core\\Action\\NotFoundAction' => 'api_platform.action.not_found',
            'api_platform.action.delete_item' => 'api_platform.action.placeholder',
            'api_platform.action.get_collection' => 'api_platform.action.placeholder',
            'api_platform.action.get_item' => 'api_platform.action.placeholder',
            'api_platform.action.get_subresource' => 'api_platform.action.placeholder',
            'api_platform.action.patch_item' => 'api_platform.action.placeholder',
            'api_platform.action.post_collection' => 'api_platform.action.placeholder',
            'api_platform.action.put_item' => 'api_platform.action.placeholder',
            'database_connection' => 'doctrine.dbal.default_connection',
            'doctrine.orm.entity_manager' => 'doctrine.orm.default_entity_manager',
            'mailer' => 'swiftmailer.mailer.default',
        ];
    }

    public function compile(): void
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled(): bool
    {
        return true;
    }

    public function getRemovedIds(): array
    {
        return require $this->containerDir.\DIRECTORY_SEPARATOR.'removed-ids.php';
    }

    /*
     * Gets the public 'App\Controller\CategorieController' shared autowired service.
     *
     * @return \App\Controller\CategorieController
     */
    protected function getCategorieControllerService()
    {
        $this->services['App\\Controller\\CategorieController'] = $instance = new \App\Controller\CategorieController(($this->services['validator'] ?? $this->getValidatorService()), ($this->services['serializer'] ?? $this->getSerializerService()), ($this->privates['App\\Repository\\CategorieRepository'] ?? $this->getCategorieRepositoryService()), ($this->services['doctrine.orm.default_entity_manager'] ?? $this->getDoctrine_Orm_DefaultEntityManagerService()));

        $instance->setContainer(($this->privates['.service_locator.pNNo5z3'] ?? $this->get_ServiceLocator_PNNo5z3Service())->withContext('App\\Controller\\CategorieController', $this));

        return $instance;
    }

    /*
     * Gets the public 'App\Controller\ClientController' shared autowired service.
     *
     * @return \App\Controller\ClientController
     */
    protected function getClientControllerService()
    {
        $this->services['App\\Controller\\ClientController'] = $instance = new \App\Controller\ClientController();

        $instance->setContainer(($this->privates['.service_locator.pNNo5z3'] ?? $this->get_ServiceLocator_PNNo5z3Service())->withContext('App\\Controller\\ClientController', $this));

        return $instance;
    }

    /*
     * Gets the public 'App\Controller\ClientDateInterval' shared autowired service.
     *
     * @return \App\Controller\ClientDateInterval
     */
    protected function getClientDateIntervalService()
    {
        return $this->services['App\\Controller\\ClientDateInterval'] = new \App\Controller\ClientDateInterval(($this->privates['App\\Repository\\ClientRepository'] ?? $this->getClientRepositoryService()));
    }

    /*
     * Gets the public 'App\Controller\CountUserController' shared autowired service.
     *
     * @return \App\Controller\CountUserController
     */
    protected function getCountUserControllerService()
    {
        $this->services['App\\Controller\\CountUserController'] = $instance = new \App\Controller\CountUserController(($this->privates['App\\Repository\\UserRepository'] ?? $this->getUserRepositoryService()));

        $instance->setContainer(($this->privates['.service_locator.pNNo5z3'] ?? $this->get_ServiceLocator_PNNo5z3Service())->withContext('App\\Controller\\CountUserController', $this));

        return $instance;
    }

    /*
     * Gets the public 'App\Controller\FournisseurController' shared autowired service.
     *
     * @return \App\Controller\FournisseurController
     */
    protected function getFournisseurControllerService()
    {
        $this->services['App\\Controller\\FournisseurController'] = $instance = new \App\Controller\FournisseurController(($this->services['serializer'] ?? $this->getSerializerService()));

        $instance->setContainer(($this->privates['.service_locator.pNNo5z3'] ?? $this->get_ServiceLocator_PNNo5z3Service())->withContext('App\\Controller\\FournisseurController', $this));

        return $instance;
    }

    /*
     * Gets the public 'App\Controller\HomeController' shared autowired service.
     *
     * @return \App\Controller\HomeController
     */
    protected function getHomeControllerService()
    {
        $this->services['App\\Controller\\HomeController'] = $instance = new \App\Controller\HomeController();

        $instance->setContainer(($this->privates['.service_locator.pNNo5z3'] ?? $this->get_ServiceLocator_PNNo5z3Service())->withContext('App\\Controller\\HomeController', $this));

        return $instance;
    }

    /*
     * Gets the public 'App\Controller\ProduitController' shared autowired service.
     *
     * @return \App\Controller\ProduitController
     */
    protected function getProduitControllerService()
    {
        $this->services['App\\Controller\\ProduitController'] = $instance = new \App\Controller\ProduitController(($this->services['validator'] ?? $this->getValidatorService()), ($this->services['serializer'] ?? $this->getSerializerService()), ($this->privates['App\\Repository\\CategorieRepository'] ?? $this->getCategorieRepositoryService()), ($this->privates['App\\Repository\\ProduitRepository'] ?? $this->getProduitRepositoryService()), ($this->privates['App\\Repository\\FournisseurRepository'] ?? $this->getFournisseurRepositoryService()), ($this->services['doctrine.orm.default_entity_manager'] ?? $this->getDoctrine_Orm_DefaultEntityManagerService()));

        $instance->setContainer(($this->privates['.service_locator.pNNo5z3'] ?? $this->get_ServiceLocator_PNNo5z3Service())->withContext('App\\Controller\\ProduitController', $this));

        return $instance;
    }

    /*
     * Gets the public 'App\EventsSubscriber\User\UserRegister' shared autowired service.
     *
     * @return \App\EventsSubscriber\User\UserRegister
     */
    protected function getUserRegisterService()
    {
        $this->services['App\\EventsSubscriber\\User\\UserRegister'] = $instance = new \App\EventsSubscriber\User\UserRegister(($this->services['security.password_encoder'] ?? $this->getSecurity_PasswordEncoderService()), ($this->services['swiftmailer.mailer.default'] ?? $this->getSwiftmailer_Mailer_DefaultService()), ($this->privates['parameter_bag'] ?? ($this->privates['parameter_bag'] = new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($this))));

        $instance->setContainer(($this->privates['.service_locator.pNNo5z3'] ?? $this->get_ServiceLocator_PNNo5z3Service())->withContext('App\\EventsSubscriber\\User\\UserRegister', $this));

        return $instance;
    }

    /*
     * Gets the public 'Symfony\Bundle\FrameworkBundle\Controller\RedirectController' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Controller\RedirectController
     */
    protected function getRedirectControllerService()
    {
        return $this->services['Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController'] = new \Symfony\Bundle\FrameworkBundle\Controller\RedirectController(($this->services['router'] ?? $this->getRouterService()), 80, 443);
    }

    /*
     * Gets the public 'Symfony\Bundle\FrameworkBundle\Controller\TemplateController' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Controller\TemplateController
     */
    protected function getTemplateControllerService()
    {
        return $this->services['Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController'] = new \Symfony\Bundle\FrameworkBundle\Controller\TemplateController(($this->services['twig'] ?? $this->getTwigService()));
    }

    /*
     * Gets the public 'api_platform.action.documentation' shared service.
     *
     * @return \ApiPlatform\Core\Documentation\Action\DocumentationAction
     */
    protected function getApiPlatform_Action_DocumentationService()
    {
        return $this->services['api_platform.action.documentation'] = new \ApiPlatform\Core\Documentation\Action\DocumentationAction(($this->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()), '', '', '0.0.0', NULL, $this->parameters['api_platform.swagger.versions']);
    }

    /*
     * Gets the public 'api_platform.action.entrypoint' shared service.
     *
     * @return \ApiPlatform\Core\Action\EntrypointAction
     */
    protected function getApiPlatform_Action_EntrypointService()
    {
        return $this->services['api_platform.action.entrypoint'] = new \ApiPlatform\Core\Action\EntrypointAction(($this->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()));
    }

    /*
     * Gets the public 'api_platform.action.exception' shared service.
     *
     * @return \ApiPlatform\Core\Action\ExceptionAction
     */
    protected function getApiPlatform_Action_ExceptionService()
    {
        return $this->services['api_platform.action.exception'] = new \ApiPlatform\Core\Action\ExceptionAction(($this->services['serializer'] ?? $this->getSerializerService()), $this->parameters['api_platform.error_formats'], $this->parameters['api_platform.exception_to_status']);
    }

    /*
     * Gets the public 'api_platform.action.not_found' shared service.
     *
     * @return \ApiPlatform\Core\Action\NotFoundAction
     */
    protected function getApiPlatform_Action_NotFoundService()
    {
        return $this->services['api_platform.action.not_found'] = new \ApiPlatform\Core\Action\NotFoundAction();
    }

    /*
     * Gets the public 'api_platform.action.placeholder' shared service.
     *
     * @return \ApiPlatform\Core\Action\PlaceholderAction
     */
    protected function getApiPlatform_Action_PlaceholderService()
    {
        return $this->services['api_platform.action.placeholder'] = new \ApiPlatform\Core\Action\PlaceholderAction();
    }

    /*
     * Gets the public 'api_platform.jsonld.action.context' shared service.
     *
     * @return \ApiPlatform\Core\JsonLd\Action\ContextAction
     */
    protected function getApiPlatform_Jsonld_Action_ContextService()
    {
        return $this->services['api_platform.jsonld.action.context'] = new \ApiPlatform\Core\JsonLd\Action\ContextAction(($this->privates['api_platform.jsonld.context_builder'] ?? $this->getApiPlatform_Jsonld_ContextBuilderService()), ($this->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()), ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()));
    }

    /*
     * Gets the public 'api_platform.swagger.action.ui' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Symfony\Bundle\Action\SwaggerUiAction
     */
    protected function getApiPlatform_Swagger_Action_UiService()
    {
        return $this->services['api_platform.swagger.action.ui'] = new \ApiPlatform\Core\Bridge\Symfony\Bundle\Action\SwaggerUiAction(($this->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()), ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), ($this->services['serializer'] ?? $this->getSerializerService()), ($this->services['twig'] ?? $this->getTwigService()), ($this->services['router'] ?? $this->getRouterService()), '', '', '0.0.0', $this->parameters['api_platform.formats'], false, '', '', 'oauth2', 'application', '/oauth/v2/token', '/oauth/v2/auth', [], true, true, true, false, false, false, $this->parameters['api_platform.swagger.versions']);
    }

    /*
     * Gets the public 'cache.app' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\FilesystemAdapter
     */
    protected function getCache_AppService()
    {
        $this->services['cache.app'] = $instance = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('9pEl8gCd6O', 0, ($this->targetDir.''.'/pools'), ($this->privates['cache.default_marshaller'] ?? ($this->privates['cache.default_marshaller'] = new \Symfony\Component\Cache\Marshaller\DefaultMarshaller(NULL))));

        $instance->setLogger(($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));

        return $instance;
    }

    /*
     * Gets the public 'cache.app_clearer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer
     */
    protected function getCache_AppClearerService()
    {
        return $this->services['cache.app_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer(['cache.app' => ($this->services['cache.app'] ?? $this->getCache_AppService()), 'doctrine.result_cache_pool' => ($this->privates['doctrine.result_cache_pool'] ?? $this->getDoctrine_ResultCachePoolService())]);
    }

    /*
     * Gets the public 'cache.global_clearer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer
     */
    protected function getCache_GlobalClearerService()
    {
        return $this->services['cache.global_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer(['cache.app' => ($this->services['cache.app'] ?? $this->getCache_AppService()), 'cache.system' => ($this->services['cache.system'] ?? $this->getCache_SystemService()), 'cache.validator' => ($this->privates['cache.validator'] ?? $this->getCache_ValidatorService()), 'cache.serializer' => ($this->privates['cache.serializer'] ?? $this->getCache_SerializerService()), 'cache.annotations' => ($this->privates['cache.annotations'] ?? $this->getCache_AnnotationsService()), 'cache.property_info' => ($this->privates['cache.property_info'] ?? $this->getCache_PropertyInfoService()), 'doctrine.result_cache_pool' => ($this->privates['doctrine.result_cache_pool'] ?? $this->getDoctrine_ResultCachePoolService()), 'doctrine.system_cache_pool' => ($this->privates['doctrine.system_cache_pool'] ?? $this->getDoctrine_SystemCachePoolService()), 'cache.property_access' => ($this->privates['cache.property_access'] ?? $this->getCache_PropertyAccessService()), 'cache.security_expression_language' => ($this->privates['cache.security_expression_language'] ?? $this->getCache_SecurityExpressionLanguageService()), 'cache.webpack_encore' => ($this->privates['cache.webpack_encore'] ?? $this->getCache_WebpackEncoreService()), 'api_platform.cache.route_name_resolver' => ($this->privates['api_platform.cache.route_name_resolver'] ?? $this->getApiPlatform_Cache_RouteNameResolverService()), 'api_platform.cache.identifiers_extractor' => ($this->privates['api_platform.cache.identifiers_extractor'] ?? $this->getApiPlatform_Cache_IdentifiersExtractorService()), 'api_platform.cache.subresource_operation_factory' => ($this->privates['api_platform.cache.subresource_operation_factory'] ?? $this->getApiPlatform_Cache_SubresourceOperationFactoryService()), 'api_platform.cache.metadata.resource' => ($this->privates['api_platform.cache.metadata.resource'] ?? $this->getApiPlatform_Cache_Metadata_ResourceService()), 'api_platform.cache.metadata.property' => ($this->privates['api_platform.cache.metadata.property'] ?? $this->getApiPlatform_Cache_Metadata_PropertyService())]);
    }

    /*
     * Gets the public 'cache.system' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getCache_SystemService()
    {
        return $this->services['cache.system'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('CHB1CSl++7', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the public 'cache.system_clearer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer
     */
    protected function getCache_SystemClearerService()
    {
        return $this->services['cache.system_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer(['cache.system' => ($this->services['cache.system'] ?? $this->getCache_SystemService()), 'cache.validator' => ($this->privates['cache.validator'] ?? $this->getCache_ValidatorService()), 'cache.serializer' => ($this->privates['cache.serializer'] ?? $this->getCache_SerializerService()), 'cache.annotations' => ($this->privates['cache.annotations'] ?? $this->getCache_AnnotationsService()), 'cache.property_info' => ($this->privates['cache.property_info'] ?? $this->getCache_PropertyInfoService()), 'doctrine.system_cache_pool' => ($this->privates['doctrine.system_cache_pool'] ?? $this->getDoctrine_SystemCachePoolService()), 'cache.property_access' => ($this->privates['cache.property_access'] ?? $this->getCache_PropertyAccessService()), 'cache.security_expression_language' => ($this->privates['cache.security_expression_language'] ?? $this->getCache_SecurityExpressionLanguageService()), 'cache.webpack_encore' => ($this->privates['cache.webpack_encore'] ?? $this->getCache_WebpackEncoreService()), 'api_platform.cache.route_name_resolver' => ($this->privates['api_platform.cache.route_name_resolver'] ?? $this->getApiPlatform_Cache_RouteNameResolverService()), 'api_platform.cache.identifiers_extractor' => ($this->privates['api_platform.cache.identifiers_extractor'] ?? $this->getApiPlatform_Cache_IdentifiersExtractorService()), 'api_platform.cache.subresource_operation_factory' => ($this->privates['api_platform.cache.subresource_operation_factory'] ?? $this->getApiPlatform_Cache_SubresourceOperationFactoryService()), 'api_platform.cache.metadata.resource' => ($this->privates['api_platform.cache.metadata.resource'] ?? $this->getApiPlatform_Cache_Metadata_ResourceService()), 'api_platform.cache.metadata.property' => ($this->privates['api_platform.cache.metadata.property'] ?? $this->getApiPlatform_Cache_Metadata_PropertyService())]);
    }

    /*
     * Gets the public 'cache_clearer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer
     */
    protected function getCacheClearerService()
    {
        return $this->services['cache_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer(new RewindableGenerator(function () {
            yield 0 => ($this->services['cache.system_clearer'] ?? $this->getCache_SystemClearerService());
        }, 1));
    }

    /*
     * Gets the public 'cache_warmer' shared service.
     *
     * @return \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate
     */
    protected function getCacheWarmerService()
    {
        return $this->services['cache_warmer'] = new \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate(new RewindableGenerator(function () {
            yield 0 => ($this->privates['validator.mapping.cache_warmer'] ?? $this->getValidator_Mapping_CacheWarmerService());
            yield 1 => ($this->privates['translation.warmer'] ?? $this->getTranslation_WarmerService());
            yield 2 => ($this->privates['router.cache_warmer'] ?? $this->getRouter_CacheWarmerService());
            yield 3 => ($this->privates['annotations.cache_warmer'] ?? $this->getAnnotations_CacheWarmerService());
            yield 4 => ($this->privates['serializer.mapping.cache_warmer'] ?? $this->getSerializer_Mapping_CacheWarmerService());
            yield 5 => ($this->privates['twig.template_cache_warmer'] ?? $this->getTwig_TemplateCacheWarmerService());
            yield 6 => ($this->privates['doctrine.orm.proxy_cache_warmer'] ?? $this->getDoctrine_Orm_ProxyCacheWarmerService());
            yield 7 => ($this->privates['webpack_encore.entrypoint_lookup.cache_warmer'] ?? $this->getWebpackEncore_EntrypointLookup_CacheWarmerService());
        }, 8), false, ($this->targetDir.''.'/App_KernelProdContainerDeprecations.log'));
    }

    /*
     * Gets the public 'console.command.public_alias.api_platform.json_schema.json_schema_generate_command' shared service.
     *
     * @return \ApiPlatform\Core\JsonSchema\Command\JsonSchemaGenerateCommand
     */
    protected function getConsole_Command_PublicAlias_ApiPlatform_JsonSchema_JsonSchemaGenerateCommandService()
    {
        return $this->services['console.command.public_alias.api_platform.json_schema.json_schema_generate_command'] = new \ApiPlatform\Core\JsonSchema\Command\JsonSchemaGenerateCommand(($this->privates['api_platform.hydra.json_schema.schema_factory'] ?? $this->getApiPlatform_Hydra_JsonSchema_SchemaFactoryService()), $this->parameters['api_platform.formats']);
    }

    /*
     * Gets the public 'console.command.public_alias.api_platform.swagger.command.swagger_command' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Symfony\Bundle\Command\SwaggerCommand
     */
    protected function getConsole_Command_PublicAlias_ApiPlatform_Swagger_Command_SwaggerCommandService()
    {
        return $this->services['console.command.public_alias.api_platform.swagger.command.swagger_command'] = new \ApiPlatform\Core\Bridge\Symfony\Bundle\Command\SwaggerCommand(($this->services['serializer'] ?? $this->getSerializerService()), ($this->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()), '', '', '0.0.0', NULL, $this->parameters['api_platform.swagger.versions']);
    }

    /*
     * Gets the public 'console.command_loader' shared service.
     *
     * @return \Symfony\Component\Console\CommandLoader\ContainerCommandLoader
     */
    protected function getConsole_CommandLoaderService()
    {
        return $this->services['console.command_loader'] = new \Symfony\Component\Console\CommandLoader\ContainerCommandLoader(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'Gesdinet\\JWTRefreshTokenBundle\\Command\\ClearInvalidRefreshTokensCommand' => ['privates', 'Gesdinet\\JWTRefreshTokenBundle\\Command\\ClearInvalidRefreshTokensCommand', 'getClearInvalidRefreshTokensCommandService', false],
            'Gesdinet\\JWTRefreshTokenBundle\\Command\\RevokeRefreshTokenCommand' => ['privates', 'Gesdinet\\JWTRefreshTokenBundle\\Command\\RevokeRefreshTokenCommand', 'getRevokeRefreshTokenCommandService', false],
            'console.command.about' => ['privates', 'console.command.about', 'getConsole_Command_AboutService', false],
            'console.command.assets_install' => ['privates', 'console.command.assets_install', 'getConsole_Command_AssetsInstallService', false],
            'console.command.cache_clear' => ['privates', 'console.command.cache_clear', 'getConsole_Command_CacheClearService', false],
            'console.command.cache_pool_clear' => ['privates', 'console.command.cache_pool_clear', 'getConsole_Command_CachePoolClearService', false],
            'console.command.cache_pool_delete' => ['privates', 'console.command.cache_pool_delete', 'getConsole_Command_CachePoolDeleteService', false],
            'console.command.cache_pool_list' => ['privates', 'console.command.cache_pool_list', 'getConsole_Command_CachePoolListService', false],
            'console.command.cache_pool_prune' => ['privates', 'console.command.cache_pool_prune', 'getConsole_Command_CachePoolPruneService', false],
            'console.command.cache_warmup' => ['privates', 'console.command.cache_warmup', 'getConsole_Command_CacheWarmupService', false],
            'console.command.config_debug' => ['privates', 'console.command.config_debug', 'getConsole_Command_ConfigDebugService', false],
            'console.command.config_dump_reference' => ['privates', 'console.command.config_dump_reference', 'getConsole_Command_ConfigDumpReferenceService', false],
            'console.command.container_debug' => ['privates', 'console.command.container_debug', 'getConsole_Command_ContainerDebugService', false],
            'console.command.container_lint' => ['privates', 'console.command.container_lint', 'getConsole_Command_ContainerLintService', false],
            'console.command.debug_autowiring' => ['privates', 'console.command.debug_autowiring', 'getConsole_Command_DebugAutowiringService', false],
            'console.command.event_dispatcher_debug' => ['privates', 'console.command.event_dispatcher_debug', 'getConsole_Command_EventDispatcherDebugService', false],
            'console.command.form_debug' => ['privates', 'console.command.form_debug', 'getConsole_Command_FormDebugService', false],
            'console.command.router_debug' => ['privates', 'console.command.router_debug', 'getConsole_Command_RouterDebugService', false],
            'console.command.router_match' => ['privates', 'console.command.router_match', 'getConsole_Command_RouterMatchService', false],
            'console.command.secrets_decrypt_to_local' => ['privates', 'console.command.secrets_decrypt_to_local', 'getConsole_Command_SecretsDecryptToLocalService', false],
            'console.command.secrets_encrypt_from_local' => ['privates', 'console.command.secrets_encrypt_from_local', 'getConsole_Command_SecretsEncryptFromLocalService', false],
            'console.command.secrets_generate_key' => ['privates', 'console.command.secrets_generate_key', 'getConsole_Command_SecretsGenerateKeyService', false],
            'console.command.secrets_list' => ['privates', 'console.command.secrets_list', 'getConsole_Command_SecretsListService', false],
            'console.command.secrets_remove' => ['privates', 'console.command.secrets_remove', 'getConsole_Command_SecretsRemoveService', false],
            'console.command.secrets_set' => ['privates', 'console.command.secrets_set', 'getConsole_Command_SecretsSetService', false],
            'console.command.translation_debug' => ['privates', 'console.command.translation_debug', 'getConsole_Command_TranslationDebugService', false],
            'console.command.translation_update' => ['privates', 'console.command.translation_update', 'getConsole_Command_TranslationUpdateService', false],
            'console.command.xliff_lint' => ['privates', 'console.command.xliff_lint', 'getConsole_Command_XliffLintService', false],
            'console.command.yaml_lint' => ['privates', 'console.command.yaml_lint', 'getConsole_Command_YamlLintService', false],
            'doctrine.cache_clear_metadata_command' => ['privates', 'doctrine.cache_clear_metadata_command', 'getDoctrine_CacheClearMetadataCommandService', false],
            'doctrine.cache_clear_query_cache_command' => ['privates', 'doctrine.cache_clear_query_cache_command', 'getDoctrine_CacheClearQueryCacheCommandService', false],
            'doctrine.cache_clear_result_command' => ['privates', 'doctrine.cache_clear_result_command', 'getDoctrine_CacheClearResultCommandService', false],
            'doctrine.cache_collection_region_command' => ['privates', 'doctrine.cache_collection_region_command', 'getDoctrine_CacheCollectionRegionCommandService', false],
            'doctrine.clear_entity_region_command' => ['privates', 'doctrine.clear_entity_region_command', 'getDoctrine_ClearEntityRegionCommandService', false],
            'doctrine.clear_query_region_command' => ['privates', 'doctrine.clear_query_region_command', 'getDoctrine_ClearQueryRegionCommandService', false],
            'doctrine.database_create_command' => ['privates', 'doctrine.database_create_command', 'getDoctrine_DatabaseCreateCommandService', false],
            'doctrine.database_drop_command' => ['privates', 'doctrine.database_drop_command', 'getDoctrine_DatabaseDropCommandService', false],
            'doctrine.database_import_command' => ['privates', 'doctrine.database_import_command', 'getDoctrine_DatabaseImportCommandService', false],
            'doctrine.ensure_production_settings_command' => ['privates', 'doctrine.ensure_production_settings_command', 'getDoctrine_EnsureProductionSettingsCommandService', false],
            'doctrine.mapping_convert_command' => ['privates', 'doctrine.mapping_convert_command', 'getDoctrine_MappingConvertCommandService', false],
            'doctrine.mapping_import_command' => ['privates', 'doctrine.mapping_import_command', 'getDoctrine_MappingImportCommandService', false],
            'doctrine.mapping_info_command' => ['privates', 'doctrine.mapping_info_command', 'getDoctrine_MappingInfoCommandService', false],
            'doctrine.query_dql_command' => ['privates', 'doctrine.query_dql_command', 'getDoctrine_QueryDqlCommandService', false],
            'doctrine.query_sql_command' => ['privates', 'doctrine.query_sql_command', 'getDoctrine_QuerySqlCommandService', false],
            'doctrine.schema_create_command' => ['privates', 'doctrine.schema_create_command', 'getDoctrine_SchemaCreateCommandService', false],
            'doctrine.schema_drop_command' => ['privates', 'doctrine.schema_drop_command', 'getDoctrine_SchemaDropCommandService', false],
            'doctrine.schema_update_command' => ['privates', 'doctrine.schema_update_command', 'getDoctrine_SchemaUpdateCommandService', false],
            'doctrine.schema_validate_command' => ['privates', 'doctrine.schema_validate_command', 'getDoctrine_SchemaValidateCommandService', false],
            'doctrine_migrations.diff_command' => ['privates', 'doctrine_migrations.diff_command', 'getDoctrineMigrations_DiffCommandService', false],
            'doctrine_migrations.dump_schema_command' => ['privates', 'doctrine_migrations.dump_schema_command', 'getDoctrineMigrations_DumpSchemaCommandService', false],
            'doctrine_migrations.execute_command' => ['privates', 'doctrine_migrations.execute_command', 'getDoctrineMigrations_ExecuteCommandService', false],
            'doctrine_migrations.generate_command' => ['privates', 'doctrine_migrations.generate_command', 'getDoctrineMigrations_GenerateCommandService', false],
            'doctrine_migrations.latest_command' => ['privates', 'doctrine_migrations.latest_command', 'getDoctrineMigrations_LatestCommandService', false],
            'doctrine_migrations.migrate_command' => ['privates', 'doctrine_migrations.migrate_command', 'getDoctrineMigrations_MigrateCommandService', false],
            'doctrine_migrations.rollup_command' => ['privates', 'doctrine_migrations.rollup_command', 'getDoctrineMigrations_RollupCommandService', false],
            'doctrine_migrations.status_command' => ['privates', 'doctrine_migrations.status_command', 'getDoctrineMigrations_StatusCommandService', false],
            'doctrine_migrations.up_to_date_command' => ['privates', 'doctrine_migrations.up_to_date_command', 'getDoctrineMigrations_UpToDateCommandService', false],
            'doctrine_migrations.version_command' => ['privates', 'doctrine_migrations.version_command', 'getDoctrineMigrations_VersionCommandService', false],
            'lexik_jwt_authentication.check_config_command' => ['services', 'lexik_jwt_authentication.check_config_command', 'getLexikJwtAuthentication_CheckConfigCommandService', false],
            'lexik_jwt_authentication.generate_token_command' => ['services', 'lexik_jwt_authentication.generate_token_command', 'getLexikJwtAuthentication_GenerateTokenCommandService', false],
            'security.command.user_password_encoder' => ['privates', 'security.command.user_password_encoder', 'getSecurity_Command_UserPasswordEncoderService', false],
            'swiftmailer.command.debug' => ['privates', 'swiftmailer.command.debug', 'getSwiftmailer_Command_DebugService', false],
            'swiftmailer.command.new_email' => ['privates', 'swiftmailer.command.new_email', 'getSwiftmailer_Command_NewEmailService', false],
            'swiftmailer.command.send_email' => ['privates', 'swiftmailer.command.send_email', 'getSwiftmailer_Command_SendEmailService', false],
            'twig.command.debug' => ['privates', 'twig.command.debug', 'getTwig_Command_DebugService', false],
            'twig.command.lint' => ['privates', 'twig.command.lint', 'getTwig_Command_LintService', false],
        ], [
            'Gesdinet\\JWTRefreshTokenBundle\\Command\\ClearInvalidRefreshTokensCommand' => 'Gesdinet\\JWTRefreshTokenBundle\\Command\\ClearInvalidRefreshTokensCommand',
            'Gesdinet\\JWTRefreshTokenBundle\\Command\\RevokeRefreshTokenCommand' => 'Gesdinet\\JWTRefreshTokenBundle\\Command\\RevokeRefreshTokenCommand',
            'console.command.about' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\AboutCommand',
            'console.command.assets_install' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\AssetsInstallCommand',
            'console.command.cache_clear' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\CacheClearCommand',
            'console.command.cache_pool_clear' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\CachePoolClearCommand',
            'console.command.cache_pool_delete' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\CachePoolDeleteCommand',
            'console.command.cache_pool_list' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\CachePoolListCommand',
            'console.command.cache_pool_prune' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\CachePoolPruneCommand',
            'console.command.cache_warmup' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\CacheWarmupCommand',
            'console.command.config_debug' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\ConfigDebugCommand',
            'console.command.config_dump_reference' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\ConfigDumpReferenceCommand',
            'console.command.container_debug' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\ContainerDebugCommand',
            'console.command.container_lint' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\ContainerLintCommand',
            'console.command.debug_autowiring' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\DebugAutowiringCommand',
            'console.command.event_dispatcher_debug' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\EventDispatcherDebugCommand',
            'console.command.form_debug' => 'Symfony\\Component\\Form\\Command\\DebugCommand',
            'console.command.router_debug' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\RouterDebugCommand',
            'console.command.router_match' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\RouterMatchCommand',
            'console.command.secrets_decrypt_to_local' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\SecretsDecryptToLocalCommand',
            'console.command.secrets_encrypt_from_local' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\SecretsEncryptFromLocalCommand',
            'console.command.secrets_generate_key' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\SecretsGenerateKeysCommand',
            'console.command.secrets_list' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\SecretsListCommand',
            'console.command.secrets_remove' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\SecretsRemoveCommand',
            'console.command.secrets_set' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\SecretsSetCommand',
            'console.command.translation_debug' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\TranslationDebugCommand',
            'console.command.translation_update' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\TranslationUpdateCommand',
            'console.command.xliff_lint' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\XliffLintCommand',
            'console.command.yaml_lint' => 'Symfony\\Bundle\\FrameworkBundle\\Command\\YamlLintCommand',
            'doctrine.cache_clear_metadata_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\ClearMetadataCacheDoctrineCommand',
            'doctrine.cache_clear_query_cache_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\ClearQueryCacheDoctrineCommand',
            'doctrine.cache_clear_result_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\ClearResultCacheDoctrineCommand',
            'doctrine.cache_collection_region_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\CollectionRegionDoctrineCommand',
            'doctrine.clear_entity_region_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\EntityRegionCacheDoctrineCommand',
            'doctrine.clear_query_region_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\QueryRegionCacheDoctrineCommand',
            'doctrine.database_create_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\CreateDatabaseDoctrineCommand',
            'doctrine.database_drop_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\DropDatabaseDoctrineCommand',
            'doctrine.database_import_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\ImportDoctrineCommand',
            'doctrine.ensure_production_settings_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\EnsureProductionSettingsDoctrineCommand',
            'doctrine.mapping_convert_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\ConvertMappingDoctrineCommand',
            'doctrine.mapping_import_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\ImportMappingDoctrineCommand',
            'doctrine.mapping_info_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\InfoDoctrineCommand',
            'doctrine.query_dql_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\RunDqlDoctrineCommand',
            'doctrine.query_sql_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\RunSqlDoctrineCommand',
            'doctrine.schema_create_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\CreateSchemaDoctrineCommand',
            'doctrine.schema_drop_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\DropSchemaDoctrineCommand',
            'doctrine.schema_update_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\UpdateSchemaDoctrineCommand',
            'doctrine.schema_validate_command' => 'Doctrine\\Bundle\\DoctrineBundle\\Command\\Proxy\\ValidateSchemaCommand',
            'doctrine_migrations.diff_command' => 'Doctrine\\Bundle\\MigrationsBundle\\Command\\MigrationsDiffDoctrineCommand',
            'doctrine_migrations.dump_schema_command' => 'Doctrine\\Bundle\\MigrationsBundle\\Command\\MigrationsDumpSchemaDoctrineCommand',
            'doctrine_migrations.execute_command' => 'Doctrine\\Bundle\\MigrationsBundle\\Command\\MigrationsExecuteDoctrineCommand',
            'doctrine_migrations.generate_command' => 'Doctrine\\Bundle\\MigrationsBundle\\Command\\MigrationsGenerateDoctrineCommand',
            'doctrine_migrations.latest_command' => 'Doctrine\\Bundle\\MigrationsBundle\\Command\\MigrationsLatestDoctrineCommand',
            'doctrine_migrations.migrate_command' => 'Doctrine\\Bundle\\MigrationsBundle\\Command\\MigrationsMigrateDoctrineCommand',
            'doctrine_migrations.rollup_command' => 'Doctrine\\Bundle\\MigrationsBundle\\Command\\MigrationsRollupDoctrineCommand',
            'doctrine_migrations.status_command' => 'Doctrine\\Bundle\\MigrationsBundle\\Command\\MigrationsStatusDoctrineCommand',
            'doctrine_migrations.up_to_date_command' => 'Doctrine\\Bundle\\MigrationsBundle\\Command\\MigrationsUpToDateDoctrineCommand',
            'doctrine_migrations.version_command' => 'Doctrine\\Bundle\\MigrationsBundle\\Command\\MigrationsVersionDoctrineCommand',
            'lexik_jwt_authentication.check_config_command' => 'Lexik\\Bundle\\JWTAuthenticationBundle\\Command\\CheckConfigCommand',
            'lexik_jwt_authentication.generate_token_command' => 'Lexik\\Bundle\\JWTAuthenticationBundle\\Command\\GenerateTokenCommand',
            'security.command.user_password_encoder' => 'Symfony\\Bundle\\SecurityBundle\\Command\\UserPasswordEncoderCommand',
            'swiftmailer.command.debug' => 'Symfony\\Bundle\\SwiftmailerBundle\\Command\\DebugCommand',
            'swiftmailer.command.new_email' => 'Symfony\\Bundle\\SwiftmailerBundle\\Command\\NewEmailCommand',
            'swiftmailer.command.send_email' => 'Symfony\\Bundle\\SwiftmailerBundle\\Command\\SendEmailCommand',
            'twig.command.debug' => 'Symfony\\Bridge\\Twig\\Command\\DebugCommand',
            'twig.command.lint' => 'Symfony\\Bundle\\TwigBundle\\Command\\LintCommand',
        ]), ['about' => 'console.command.about', 'assets:install' => 'console.command.assets_install', 'cache:clear' => 'console.command.cache_clear', 'cache:pool:clear' => 'console.command.cache_pool_clear', 'cache:pool:prune' => 'console.command.cache_pool_prune', 'cache:pool:delete' => 'console.command.cache_pool_delete', 'cache:pool:list' => 'console.command.cache_pool_list', 'cache:warmup' => 'console.command.cache_warmup', 'debug:config' => 'console.command.config_debug', 'config:dump-reference' => 'console.command.config_dump_reference', 'debug:container' => 'console.command.container_debug', 'lint:container' => 'console.command.container_lint', 'debug:autowiring' => 'console.command.debug_autowiring', 'debug:event-dispatcher' => 'console.command.event_dispatcher_debug', 'debug:router' => 'console.command.router_debug', 'router:match' => 'console.command.router_match', 'debug:translation' => 'console.command.translation_debug', 'translation:update' => 'console.command.translation_update', 'lint:xliff' => 'console.command.xliff_lint', 'lint:yaml' => 'console.command.yaml_lint', 'debug:form' => 'console.command.form_debug', 'secrets:set' => 'console.command.secrets_set', 'secrets:remove' => 'console.command.secrets_remove', 'secrets:generate-keys' => 'console.command.secrets_generate_key', 'secrets:list' => 'console.command.secrets_list', 'secrets:decrypt-to-local' => 'console.command.secrets_decrypt_to_local', 'secrets:encrypt-from-local' => 'console.command.secrets_encrypt_from_local', 'debug:twig' => 'twig.command.debug', 'lint:twig' => 'twig.command.lint', 'doctrine:database:create' => 'doctrine.database_create_command', 'doctrine:database:drop' => 'doctrine.database_drop_command', 'doctrine:database:import' => 'doctrine.database_import_command', 'doctrine:query:sql' => 'doctrine.query_sql_command', 'doctrine:cache:clear-metadata' => 'doctrine.cache_clear_metadata_command', 'doctrine:cache:clear-query' => 'doctrine.cache_clear_query_cache_command', 'doctrine:cache:clear-result' => 'doctrine.cache_clear_result_command', 'doctrine:cache:clear-collection-region' => 'doctrine.cache_collection_region_command', 'doctrine:mapping:convert' => 'doctrine.mapping_convert_command', 'doctrine:schema:create' => 'doctrine.schema_create_command', 'doctrine:schema:drop' => 'doctrine.schema_drop_command', 'doctrine:ensure-production-settings' => 'doctrine.ensure_production_settings_command', 'doctrine:cache:clear-entity-region' => 'doctrine.clear_entity_region_command', 'doctrine:mapping:info' => 'doctrine.mapping_info_command', 'doctrine:cache:clear-query-region' => 'doctrine.clear_query_region_command', 'doctrine:query:dql' => 'doctrine.query_dql_command', 'doctrine:schema:update' => 'doctrine.schema_update_command', 'doctrine:schema:validate' => 'doctrine.schema_validate_command', 'doctrine:mapping:import' => 'doctrine.mapping_import_command', 'doctrine:migrations:diff' => 'doctrine_migrations.diff_command', 'doctrine:migrations:dump-schema' => 'doctrine_migrations.dump_schema_command', 'doctrine:migrations:execute' => 'doctrine_migrations.execute_command', 'doctrine:migrations:generate' => 'doctrine_migrations.generate_command', 'doctrine:migrations:latest' => 'doctrine_migrations.latest_command', 'doctrine:migrations:migrate' => 'doctrine_migrations.migrate_command', 'doctrine:migrations:rollup' => 'doctrine_migrations.rollup_command', 'doctrine:migrations:status' => 'doctrine_migrations.status_command', 'doctrine:migrations:up-to-date' => 'doctrine_migrations.up_to_date_command', 'doctrine:migrations:version' => 'doctrine_migrations.version_command', 'security:encode-password' => 'security.command.user_password_encoder', 'lexik:jwt:check-config' => 'lexik_jwt_authentication.check_config_command', 'lexik:jwt:generate-token' => 'lexik_jwt_authentication.generate_token_command', 'gesdinet:jwt:clear' => 'Gesdinet\\JWTRefreshTokenBundle\\Command\\ClearInvalidRefreshTokensCommand', 'gesdinet:jwt:revoke' => 'Gesdinet\\JWTRefreshTokenBundle\\Command\\RevokeRefreshTokenCommand', 'debug:swiftmailer' => 'swiftmailer.command.debug', 'swiftmailer:email:send' => 'swiftmailer.command.new_email', 'swiftmailer:spool:send' => 'swiftmailer.command.send_email']);
    }

    /*
     * Gets the public 'container.env_var_processors_locator' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function getContainer_EnvVarProcessorsLocatorService()
    {
        return $this->services['container.env_var_processors_locator'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'base64' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'bool' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'const' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'csv' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'default' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'file' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'float' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'int' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'json' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'key' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'query_string' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'require' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'resolve' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'string' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'trim' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
            'url' => ['privates', 'container.env_var_processor', 'getContainer_EnvVarProcessorService', false],
        ], [
            'base64' => '?',
            'bool' => '?',
            'const' => '?',
            'csv' => '?',
            'default' => '?',
            'file' => '?',
            'float' => '?',
            'int' => '?',
            'json' => '?',
            'key' => '?',
            'query_string' => '?',
            'require' => '?',
            'resolve' => '?',
            'string' => '?',
            'trim' => '?',
            'url' => '?',
        ]);
    }

    /*
     * Gets the public 'doctrine' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, $this->parameters['doctrine.connections'], $this->parameters['doctrine.entity_managers'], 'default', 'default');
    }

    /*
     * Gets the public 'doctrine.dbal.default_connection' shared service.
     *
     * @return \Doctrine\DBAL\Connection
     */
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        $a = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'doctrine.orm.default_listeners.attach_entity_listeners' => ['privates', 'doctrine.orm.default_listeners.attach_entity_listeners', 'getDoctrine_Orm_DefaultListeners_AttachEntityListenersService', false],
        ], [
            'doctrine.orm.default_listeners.attach_entity_listeners' => '?',
        ]));
        $a->addEventListener([0 => 'loadClassMetadata'], 'doctrine.orm.default_listeners.attach_entity_listeners');

        return $this->services['doctrine.dbal.default_connection'] = (new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory([]))->createConnection(['url' => $this->getEnv('resolve:DATABASE_URL'), 'host' => 'localhost', 'port' => NULL, 'user' => 'root', 'password' => NULL, 'driver' => 'pdo_mysql', 'driverOptions' => [], 'defaultTableOptions' => []], new \Doctrine\DBAL\Configuration(), $a, []);
    }

    /*
     * Gets the public 'doctrine.orm.default_entity_manager' shared service.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getDoctrine_Orm_DefaultEntityManagerService($lazyLoad = true)
    {
        $a = new \Doctrine\ORM\Configuration();

        $b = new \Symfony\Component\Cache\DoctrineProvider(($this->privates['doctrine.system_cache_pool'] ?? $this->getDoctrine_SystemCachePoolService()));
        $c = new \Doctrine\Persistence\Mapping\Driver\MappingDriverChain();

        $d = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()), $this->parameters['api_platform.resource_class_directories']);
        $e = new \Doctrine\ORM\Mapping\Driver\XmlDriver(new \Doctrine\Common\Persistence\Mapping\Driver\SymfonyFileLocator([(\dirname(__DIR__, 4).'/vendor/gesdinet/jwt-refresh-token-bundle/Resources/config/orm/doctrine-orm') => 'Gesdinet\\JWTRefreshTokenBundle\\Entity', (\dirname(__DIR__, 4).'/vendor/gesdinet/jwt-refresh-token-bundle/Resources/config/orm/doctrine-entity') => 'Gesdinet\\JWTRefreshTokenBundle\\Entity'], '.orm.xml'));

        $c->addDriver($d, 'App\\Entity');
        $c->addDriver($d, 'Gesdinet\\JWTRefreshTokenBundle\\Entity');
        $c->addDriver($e, 'Gesdinet\\JWTRefreshTokenBundle\\Entity');
        $c->addDriver($e, 'Gesdinet\\JWTRefreshTokenBundle\\Entity');

        $a->setEntityNamespaces(['App' => 'App\\Entity', 'GesdinetJWTRefreshTokenBundle' => 'Gesdinet\\JWTRefreshTokenBundle\\Entity']);
        $a->setMetadataCacheImpl($b);
        $a->setQueryCacheImpl($b);
        $a->setResultCacheImpl(new \Symfony\Component\Cache\DoctrineProvider(($this->privates['doctrine.result_cache_pool'] ?? $this->getDoctrine_ResultCachePoolService())));
        $a->setMetadataDriverImpl($c);
        $a->setProxyDir(($this->targetDir.''.'/doctrine/orm/Proxies'));
        $a->setProxyNamespace('Proxies');
        $a->setAutoGenerateProxyClasses(false);
        $a->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $a->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $a->setNamingStrategy(new \Doctrine\ORM\Mapping\UnderscoreNamingStrategy(0, true));
        $a->setQuoteStrategy(new \Doctrine\ORM\Mapping\DefaultQuoteStrategy());
        $a->setEntityListenerResolver(new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver($this));
        $a->setRepositoryFactory(new \Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'App\\Repository\\CategorieRepository' => ['privates', 'App\\Repository\\CategorieRepository', 'getCategorieRepositoryService', false],
            'App\\Repository\\ClientRepository' => ['privates', 'App\\Repository\\ClientRepository', 'getClientRepositoryService', false],
            'App\\Repository\\DepotRepository' => ['privates', 'App\\Repository\\DepotRepository', 'getDepotRepositoryService', false],
            'App\\Repository\\FournisseurRepository' => ['privates', 'App\\Repository\\FournisseurRepository', 'getFournisseurRepositoryService', false],
            'App\\Repository\\ProduitRepository' => ['privates', 'App\\Repository\\ProduitRepository', 'getProduitRepositoryService', false],
            'App\\Repository\\UserRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', false],
            'App\\Repository\\VenteRepository' => ['privates', 'App\\Repository\\VenteRepository', 'getVenteRepositoryService', false],
        ], [
            'App\\Repository\\CategorieRepository' => '?',
            'App\\Repository\\ClientRepository' => '?',
            'App\\Repository\\DepotRepository' => '?',
            'App\\Repository\\FournisseurRepository' => '?',
            'App\\Repository\\ProduitRepository' => '?',
            'App\\Repository\\UserRepository' => '?',
            'App\\Repository\\VenteRepository' => '?',
        ])));

        $this->services['doctrine.orm.default_entity_manager'] = $instance = \Doctrine\ORM\EntityManager::create(($this->services['doctrine.dbal.default_connection'] ?? $this->getDoctrine_Dbal_DefaultConnectionService()), $a);

        (new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator([], []))->configure($instance);

        return $instance;
    }

    /*
     * Gets the public 'error_controller' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\ErrorController
     */
    protected function getErrorControllerService()
    {
        $a = ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()));

        return $this->services['error_controller'] = new \Symfony\Component\HttpKernel\Controller\ErrorController(($this->services['http_kernel'] ?? $this->getHttpKernelService()), 'error_controller', new \Symfony\Component\ErrorHandler\ErrorRenderer\SerializerErrorRenderer(($this->services['serializer'] ?? $this->getSerializerService()), \Symfony\Component\ErrorHandler\ErrorRenderer\SerializerErrorRenderer::getPreferredFormat($a), new \Symfony\Bridge\Twig\ErrorRenderer\TwigErrorRenderer(($this->services['twig'] ?? $this->getTwigService()), new \Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer(\Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer::isDebug($a, false), 'UTF-8', ($this->privates['debug.file_link_formatter'] ?? ($this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL))), \dirname(__DIR__, 4), \Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer::getAndCleanOutputBuffer($a), ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService())), \Symfony\Bridge\Twig\ErrorRenderer\TwigErrorRenderer::isDebug($a, false)), \Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer::isDebug($a, false)));
    }

    /*
     * Gets the public 'event_dispatcher' shared service.
     *
     * @return \Symfony\Component\EventDispatcher\EventDispatcher
     */
    protected function getEventDispatcherService()
    {
        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\EventDispatcher\EventDispatcher();

        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['webpack_encore.exception_listener'] ?? $this->getWebpackEncore_ExceptionListenerService());
        }, 1 => 'onKernelException'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['nelmio_cors.cors_listener'] ?? $this->getNelmioCors_CorsListenerService());
        }, 1 => 'onKernelRequest'], 250);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['nelmio_cors.cors_listener'] ?? $this->getNelmioCors_CorsListenerService());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['api_platform.listener.request.add_format'] ?? $this->getApiPlatform_Listener_Request_AddFormatService());
        }, 1 => 'onKernelRequest'], 7);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['api_platform.listener.request.read'] ?? $this->getApiPlatform_Listener_Request_ReadService());
        }, 1 => 'onKernelRequest'], 4);
        $instance->addListener('kernel.view', [0 => function () {
            return ($this->privates['api_platform.listener.view.write'] ?? $this->getApiPlatform_Listener_View_WriteService());
        }, 1 => 'onKernelView'], 32);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['api_platform.listener.request.deserialize'] ?? $this->getApiPlatform_Listener_Request_DeserializeService());
        }, 1 => 'onKernelRequest'], 2);
        $instance->addListener('kernel.view', [0 => function () {
            return ($this->privates['api_platform.listener.view.serialize'] ?? $this->getApiPlatform_Listener_View_SerializeService());
        }, 1 => 'onKernelView'], 16);
        $instance->addListener('kernel.view', [0 => function () {
            return ($this->privates['api_platform.listener.view.respond'] ?? $this->getApiPlatform_Listener_View_RespondService());
        }, 1 => 'onKernelView'], 8);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['api_platform.listener.exception.validation'] ?? $this->getApiPlatform_Listener_Exception_ValidationService());
        }, 1 => 'onKernelException'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['api_platform.listener.exception'] ?? $this->getApiPlatform_Listener_ExceptionService());
        }, 1 => 'onKernelException'], -96);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['api_platform.swagger.listener.ui'] ?? ($this->privates['api_platform.swagger.listener.ui'] = new \ApiPlatform\Core\Bridge\Symfony\Bundle\EventListener\SwaggerUiListener()));
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['api_platform.hydra.listener.response.add_link_header'] ?? $this->getApiPlatform_Hydra_Listener_Response_AddLinkHeaderService());
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['api_platform.http_cache.listener.response.configure'] ?? $this->getApiPlatform_HttpCache_Listener_Response_ConfigureService());
        }, 1 => 'onKernelResponse'], -1);
        $instance->addListener('kernel.view', [0 => function () {
            return ($this->privates['api_platform.listener.view.validate'] ?? $this->getApiPlatform_Listener_View_ValidateService());
        }, 1 => 'onKernelView'], 64);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['api_platform.listener.view.validate_query_parameters'] ?? $this->getApiPlatform_Listener_View_ValidateQueryParametersService());
        }, 1 => 'onKernelRequest'], 16);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['api_platform.security.listener.request.deny_access'] ?? $this->getApiPlatform_Security_Listener_Request_DenyAccessService());
        }, 1 => 'onSecurity'], 3);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['api_platform.security.listener.request.deny_access'] ?? $this->getApiPlatform_Security_Listener_Request_DenyAccessService());
        }, 1 => 'onSecurityPostDenormalize'], 1);
        $instance->addListener('lexik_jwt_authentication.on_authentication_success', [0 => function () {
            return ($this->privates['gesdinet.jwtrefreshtoken.send_token'] ?? $this->getGesdinet_Jwtrefreshtoken_SendTokenService());
        }, 1 => 'attachRefreshToken'], 0);
        $instance->addListener('kernel.view', [0 => function () {
            return ($this->privates['App\\EventsSubscriber\\PasswordEncoderSubscriber'] ?? $this->getPasswordEncoderSubscriberService());
        }, 1 => 'encodePassword'], 33);
        $instance->addListener('kernel.view', [0 => function () {
            return ($this->services['App\\EventsSubscriber\\User\\UserRegister'] ?? $this->getUserRegisterService());
        }, 1 => 'sendEmailRegister'], 31);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['response_listener'] ?? ($this->privates['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8')));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['streamed_response_listener'] ?? ($this->privates['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener()));
        }, 1 => 'onKernelResponse'], -1024);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'setDefaultLocale'], 100);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'onKernelRequest'], 16);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['validate_request_listener'] ?? ($this->privates['validate_request_listener'] = new \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener()));
        }, 1 => 'onKernelRequest'], 256);
        $instance->addListener('kernel.controller_arguments', [0 => function () {
            return ($this->privates['exception_listener'] ?? $this->getExceptionListenerService());
        }, 1 => 'onControllerArguments'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['exception_listener'] ?? $this->getExceptionListenerService());
        }, 1 => 'logKernelException'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['exception_listener'] ?? $this->getExceptionListenerService());
        }, 1 => 'onKernelException'], -128);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['locale_aware_listener'] ?? $this->getLocaleAwareListenerService());
        }, 1 => 'onKernelRequest'], 15);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['locale_aware_listener'] ?? $this->getLocaleAwareListenerService());
        }, 1 => 'onKernelFinishRequest'], -15);
        $instance->addListener('console.error', [0 => function () {
            return ($this->privates['console.error_listener'] ?? $this->getConsole_ErrorListenerService());
        }, 1 => 'onConsoleError'], -128);
        $instance->addListener('console.terminate', [0 => function () {
            return ($this->privates['console.error_listener'] ?? $this->getConsole_ErrorListenerService());
        }, 1 => 'onConsoleTerminate'], -128);
        $instance->addListener('console.error', [0 => function () {
            return ($this->privates['console.suggest_missing_package_subscriber'] ?? ($this->privates['console.suggest_missing_package_subscriber'] = new \Symfony\Bundle\FrameworkBundle\EventListener\SuggestMissingPackageSubscriber()));
        }, 1 => 'onConsoleError'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onKernelRequest'], 128);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onKernelResponse'], -1000);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onFinishRequest'], 0);
        $instance->addListener('Symfony\\Component\\Mailer\\Event\\MessageEvent', [0 => function () {
            return ($this->privates['mailer.envelope_listener'] ?? ($this->privates['mailer.envelope_listener'] = new \Symfony\Component\Mailer\EventListener\EnvelopeListener(NULL, NULL)));
        }, 1 => 'onMessage'], -255);
        $instance->addListener('Symfony\\Component\\Mailer\\Event\\MessageEvent', [0 => function () {
            return ($this->privates['mailer.logger_message_listener'] ?? ($this->privates['mailer.logger_message_listener'] = new \Symfony\Component\Mailer\EventListener\MessageLoggerListener()));
        }, 1 => 'onMessage'], -255);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'configure'], 2048);
        $instance->addListener('console.command', [0 => function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'configure'], 2048);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelRequest'], 32);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelException'], -64);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['web_link.add_link_header_listener'] ?? ($this->privates['web_link.add_link_header_listener'] = new \Symfony\Component\WebLink\EventListener\AddLinkHeaderListener()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('Symfony\\Component\\Mailer\\Event\\MessageEvent', [0 => function () {
            return ($this->privates['twig.mailer.message_listener'] ?? $this->getTwig_Mailer_MessageListenerService());
        }, 1 => 'onMessage'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['sensio_framework_extra.controller.listener'] ?? $this->getSensioFrameworkExtra_Controller_ListenerService());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['sensio_framework_extra.converter.listener'] ?? $this->getSensioFrameworkExtra_Converter_ListenerService());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['sensio_framework_extra.view.listener'] ?? $this->getSensioFrameworkExtra_View_ListenerService());
        }, 1 => 'onKernelController'], -128);
        $instance->addListener('kernel.view', [0 => function () {
            return ($this->privates['sensio_framework_extra.view.listener'] ?? $this->getSensioFrameworkExtra_View_ListenerService());
        }, 1 => 'onKernelView'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['sensio_framework_extra.cache.listener'] ?? ($this->privates['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener()));
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['sensio_framework_extra.cache.listener'] ?? ($this->privates['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.controller_arguments', [0 => function () {
            return ($this->privates['sensio_framework_extra.security.listener'] ?? $this->getSensioFrameworkExtra_Security_ListenerService());
        }, 1 => 'onKernelControllerArguments'], 0);
        $instance->addListener('kernel.controller_arguments', [0 => function () {
            return ($this->privates['framework_extra_bundle.event.is_granted'] ?? $this->getFrameworkExtraBundle_Event_IsGrantedService());
        }, 1 => 'onKernelControllerArguments'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['security.firewall'] ?? $this->getSecurity_FirewallService());
        }, 1 => 'configureLogoutUrlGenerator'], 8);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['security.firewall'] ?? $this->getSecurity_FirewallService());
        }, 1 => 'onKernelRequest'], 8);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['security.firewall'] ?? $this->getSecurity_FirewallService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['security.rememberme.response_listener'] ?? ($this->privates['security.rememberme.response_listener'] = new \Symfony\Component\Security\Http\RememberMe\ResponseListener()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('console.command', [0 => function () {
            return ($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService());
        }, 1 => 'onCommand'], 255);
        $instance->addListener('console.terminate', [0 => function () {
            return ($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService());
        }, 1 => 'onTerminate'], -255);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['swiftmailer.email_sender.listener'] ?? $this->getSwiftmailer_EmailSender_ListenerService());
        }, 1 => 'onException'], 0);
        $instance->addListener('kernel.terminate', [0 => function () {
            return ($this->privates['swiftmailer.email_sender.listener'] ?? $this->getSwiftmailer_EmailSender_ListenerService());
        }, 1 => 'onTerminate'], 0);
        $instance->addListener('console.error', [0 => function () {
            return ($this->privates['swiftmailer.email_sender.listener'] ?? $this->getSwiftmailer_EmailSender_ListenerService());
        }, 1 => 'onException'], 0);
        $instance->addListener('console.terminate', [0 => function () {
            return ($this->privates['swiftmailer.email_sender.listener'] ?? $this->getSwiftmailer_EmailSender_ListenerService());
        }, 1 => 'onTerminate'], 0);

        return $instance;
    }

    /*
     * Gets the public 'filesystem' shared service.
     *
     * @return \Symfony\Component\Filesystem\Filesystem
     */
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem();
    }

    /*
     * Gets the public 'form.factory' shared service.
     *
     * @return \Symfony\Component\Form\FormFactory
     */
    protected function getForm_FactoryService()
    {
        return $this->services['form.factory'] = new \Symfony\Component\Form\FormFactory(($this->privates['form.registry'] ?? $this->getForm_RegistryService()));
    }

    /*
     * Gets the public 'form.type.file' shared service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\FileType
     */
    protected function getForm_Type_FileService()
    {
        return $this->services['form.type.file'] = new \Symfony\Component\Form\Extension\Core\Type\FileType(($this->services['translator'] ?? $this->getTranslatorService()));
    }

    /*
     * Gets the public 'gesdinet.jwtrefreshtoken' shared service.
     *
     * @return \Gesdinet\JWTRefreshTokenBundle\Service\RefreshToken
     */
    protected function getGesdinet_JwtrefreshtokenService()
    {
        $a = ($this->services['gesdinet.jwtrefreshtoken.refresh_token_manager'] ?? $this->getGesdinet_Jwtrefreshtoken_RefreshTokenManagerService());

        return $this->services['gesdinet.jwtrefreshtoken'] = new \Gesdinet\JWTRefreshTokenBundle\Service\RefreshToken(new \Gesdinet\JWTRefreshTokenBundle\Security\Authenticator\RefreshTokenAuthenticator(new \Symfony\Component\Security\Core\User\UserChecker(), 'refresh_token'), new \Gesdinet\JWTRefreshTokenBundle\Security\Provider\RefreshTokenProvider($a), ($this->privates['lexik_jwt_authentication.handler.authentication_success'] ?? $this->getLexikJwtAuthentication_Handler_AuthenticationSuccessService()), ($this->privates['lexik_jwt_authentication.handler.authentication_failure'] ?? $this->getLexikJwtAuthentication_Handler_AuthenticationFailureService()), $a, 2592000, 'api', false, ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));
    }

    /*
     * Gets the public 'gesdinet.jwtrefreshtoken.refresh_token_manager' shared service.
     *
     * @return \Gesdinet\JWTRefreshTokenBundle\Doctrine\RefreshTokenManager
     */
    protected function getGesdinet_Jwtrefreshtoken_RefreshTokenManagerService()
    {
        return $this->services['gesdinet.jwtrefreshtoken.refresh_token_manager'] = new \Gesdinet\JWTRefreshTokenBundle\Doctrine\RefreshTokenManager(($this->services['doctrine.orm.default_entity_manager'] ?? $this->getDoctrine_Orm_DefaultEntityManagerService()), 'Gesdinet\\JWTRefreshTokenBundle\\Entity\\RefreshToken');
    }

    /*
     * Gets the public 'http_kernel' shared service.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\HttpKernel(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), new \Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver($this, ($this->privates['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService())), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), new \Symfony\Component\HttpKernel\Controller\ArgumentResolver(($this->privates['argument_metadata_factory'] ?? ($this->privates['argument_metadata_factory'] = new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory())), new RewindableGenerator(function () {
            yield 0 => ($this->privates['argument_resolver.request_attribute'] ?? ($this->privates['argument_resolver.request_attribute'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver()));
            yield 1 => ($this->privates['argument_resolver.request'] ?? ($this->privates['argument_resolver.request'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver()));
            yield 2 => ($this->privates['argument_resolver.session'] ?? ($this->privates['argument_resolver.session'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver()));
            yield 3 => ($this->privates['security.user_value_resolver'] ?? $this->getSecurity_UserValueResolverService());
            yield 4 => ($this->privates['argument_resolver.service'] ?? $this->getArgumentResolver_ServiceService());
            yield 5 => ($this->privates['argument_resolver.default'] ?? ($this->privates['argument_resolver.default'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver()));
            yield 6 => ($this->privates['argument_resolver.variadic'] ?? ($this->privates['argument_resolver.variadic'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver()));
        }, 7)));
    }

    /*
     * Gets the public 'lexik_jwt_authentication.check_config_command' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Command\CheckConfigCommand
     */
    protected function getLexikJwtAuthentication_CheckConfigCommandService()
    {
        $this->services['lexik_jwt_authentication.check_config_command'] = $instance = new \Lexik\Bundle\JWTAuthenticationBundle\Command\CheckConfigCommand(($this->services['lexik_jwt_authentication.key_loader'] ?? ($this->services['lexik_jwt_authentication.key_loader'] = new \Lexik\Bundle\JWTAuthenticationBundle\Services\KeyLoader\RawKeyLoader($this->getEnv('resolve:JWT_SECRET_KEY'), $this->getEnv('resolve:JWT_PUBLIC_KEY'), $this->getEnv('JWT_PASSPHRASE')))), 'RS256');

        $instance->setName('lexik:jwt:check-config');

        return $instance;
    }

    /*
     * Gets the public 'lexik_jwt_authentication.encoder' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Encoder\LcobucciJWTEncoder
     */
    protected function getLexikJwtAuthentication_EncoderService()
    {
        return $this->services['lexik_jwt_authentication.encoder'] = new \Lexik\Bundle\JWTAuthenticationBundle\Encoder\LcobucciJWTEncoder(new \Lexik\Bundle\JWTAuthenticationBundle\Services\JWSProvider\LcobucciJWSProvider(($this->services['lexik_jwt_authentication.key_loader'] ?? ($this->services['lexik_jwt_authentication.key_loader'] = new \Lexik\Bundle\JWTAuthenticationBundle\Services\KeyLoader\RawKeyLoader($this->getEnv('resolve:JWT_SECRET_KEY'), $this->getEnv('resolve:JWT_PUBLIC_KEY'), $this->getEnv('JWT_PASSPHRASE')))), 'openssl', 'RS256', 3600, 0));
    }

    /*
     * Gets the public 'lexik_jwt_authentication.generate_token_command' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Command\GenerateTokenCommand
     */
    protected function getLexikJwtAuthentication_GenerateTokenCommandService()
    {
        $this->services['lexik_jwt_authentication.generate_token_command'] = $instance = new \Lexik\Bundle\JWTAuthenticationBundle\Command\GenerateTokenCommand(($this->services['lexik_jwt_authentication.jwt_manager'] ?? $this->getLexikJwtAuthentication_JwtManagerService()), new RewindableGenerator(function () {
            yield 0 => ($this->privates['security.user.provider.concrete.app_user_provider'] ?? $this->getSecurity_User_Provider_Concrete_AppUserProviderService());
        }, 1));

        $instance->setName('lexik:jwt:generate-token');

        return $instance;
    }

    /*
     * Gets the public 'lexik_jwt_authentication.jwt_manager' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager
     */
    protected function getLexikJwtAuthentication_JwtManagerService()
    {
        $this->services['lexik_jwt_authentication.jwt_manager'] = $instance = new \Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager(($this->services['lexik_jwt_authentication.encoder'] ?? $this->getLexikJwtAuthentication_EncoderService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), 'username');

        $instance->setUserIdentityField('username');

        return $instance;
    }

    /*
     * Gets the public 'lexik_jwt_authentication.key_loader' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Services\KeyLoader\RawKeyLoader
     */
    protected function getLexikJwtAuthentication_KeyLoaderService()
    {
        return $this->services['lexik_jwt_authentication.key_loader'] = new \Lexik\Bundle\JWTAuthenticationBundle\Services\KeyLoader\RawKeyLoader($this->getEnv('resolve:JWT_SECRET_KEY'), $this->getEnv('resolve:JWT_PUBLIC_KEY'), $this->getEnv('JWT_PASSPHRASE'));
    }

    /*
     * Gets the public 'request_stack' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\RequestStack
     */
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }

    /*
     * Gets the public 'router' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\Router
     */
    protected function getRouterService()
    {
        $a = new \Symfony\Bridge\Monolog\Logger('router');
        $a->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        $this->services['router'] = $instance = new \Symfony\Bundle\FrameworkBundle\Routing\Router((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'routing.loader' => ['services', 'routing.loader', 'getRouting_LoaderService', false],
        ], [
            'routing.loader' => 'Symfony\\Component\\Config\\Loader\\LoaderInterface',
        ]))->withContext('router.default', $this), 'kernel::loadRoutes', ['cache_dir' => $this->targetDir.'', 'debug' => false, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\CompiledUrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\CompiledUrlGeneratorDumper', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableCompiledUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\CompiledUrlMatcherDumper', 'strict_requirements' => NULL, 'resource_type' => 'service'], ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()), ($this->privates['parameter_bag'] ?? ($this->privates['parameter_bag'] = new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($this))), $a, 'en');

        $instance->setConfigCacheFactory(($this->privates['config_cache_factory'] ?? ($this->privates['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory())));

        return $instance;
    }

    /*
     * Gets the public 'routing.loader' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader
     */
    protected function getRouting_LoaderService()
    {
        $a = new \Symfony\Component\Config\Loader\LoaderResolver();

        $b = ($this->services['kernel'] ?? $this->get('kernel', 1));

        $c = new \Symfony\Component\HttpKernel\Config\FileLocator($b);
        $d = new \Symfony\Bundle\FrameworkBundle\Routing\AnnotatedRouteControllerLoader(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()));

        $a->addLoader(new \Symfony\Component\Routing\Loader\XmlFileLoader($c));
        $a->addLoader(new \Symfony\Component\Routing\Loader\YamlFileLoader($c));
        $a->addLoader(new \Symfony\Component\Routing\Loader\PhpFileLoader($c));
        $a->addLoader(new \Symfony\Component\Routing\Loader\GlobFileLoader($c));
        $a->addLoader(new \Symfony\Component\Routing\Loader\DirectoryLoader($c));
        $a->addLoader(new \Symfony\Component\Routing\Loader\ContainerLoader(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'kernel' => ['services', 'kernel', 'getKernelService', false],
        ], [
            'kernel' => 'App\\Kernel',
        ])));
        $a->addLoader(new \ApiPlatform\Core\Bridge\Symfony\Routing\ApiLoader($b, ($this->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()), ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), ($this->privates['api_platform.operation_path_resolver.custom'] ?? $this->getApiPlatform_OperationPathResolver_CustomService()), $this, $this->parameters['api_platform.formats'], $this->parameters['api_platform.resource_class_directories'], ($this->privates['api_platform.subresource_operation_factory.cached'] ?? $this->getApiPlatform_SubresourceOperationFactory_CachedService()), false, true, true, false, false));
        $a->addLoader($d);
        $a->addLoader(new \Symfony\Component\Routing\Loader\AnnotationDirectoryLoader($c, $d));
        $a->addLoader(new \Symfony\Component\Routing\Loader\AnnotationFileLoader($c, $d));

        return $this->services['routing.loader'] = new \Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader($a, ['utf8' => true]);
    }

    /*
     * Gets the public 'security.authentication_utils' shared service.
     *
     * @return \Symfony\Component\Security\Http\Authentication\AuthenticationUtils
     */
    protected function getSecurity_AuthenticationUtilsService()
    {
        return $this->services['security.authentication_utils'] = new \Symfony\Component\Security\Http\Authentication\AuthenticationUtils(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /*
     * Gets the public 'security.authorization_checker' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\AuthorizationChecker
     */
    protected function getSecurity_AuthorizationCheckerService()
    {
        return $this->services['security.authorization_checker'] = new \Symfony\Component\Security\Core\Authorization\AuthorizationChecker(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()), ($this->privates['security.access.decision_manager'] ?? $this->getSecurity_Access_DecisionManagerService()), false);
    }

    /*
     * Gets the public 'security.csrf.token_manager' shared service.
     *
     * @return \Symfony\Component\Security\Csrf\CsrfTokenManager
     */
    protected function getSecurity_Csrf_TokenManagerService()
    {
        return $this->services['security.csrf.token_manager'] = new \Symfony\Component\Security\Csrf\CsrfTokenManager(new \Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator(), new \Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage(($this->services['session'] ?? $this->getSessionService())), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /*
     * Gets the public 'security.password_encoder' shared service.
     *
     * @return \Symfony\Component\Security\Core\Encoder\UserPasswordEncoder
     */
    protected function getSecurity_PasswordEncoderService()
    {
        return $this->services['security.password_encoder'] = new \Symfony\Component\Security\Core\Encoder\UserPasswordEncoder(($this->privates['security.encoder_factory.generic'] ?? $this->getSecurity_EncoderFactory_GenericService()));
    }

    /*
     * Gets the public 'security.token_storage' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage
     */
    protected function getSecurity_TokenStorageService()
    {
        return $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\UsageTrackingTokenStorage(($this->privates['security.untracked_token_storage'] ?? ($this->privates['security.untracked_token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'session' => ['services', 'session', 'getSessionService', false],
        ], [
            'session' => '?',
        ]));
    }

    /*
     * Gets the public 'serializer' shared service.
     *
     * @return \Symfony\Component\Serializer\Serializer
     */
    protected function getSerializerService()
    {
        $a = ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService());
        $b = ($this->privates['api_platform.metadata.property.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_NameCollectionFactory_CachedService());
        $c = ($this->privates['api_platform.metadata.property.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_MetadataFactory_CachedService());
        $d = ($this->privates['api_platform.router'] ?? $this->getApiPlatform_RouterService());
        $e = ($this->privates['api_platform.subresource_operation_factory.cached'] ?? $this->getApiPlatform_SubresourceOperationFactory_CachedService());
        $f = ($this->privates['api_platform.filter_locator'] ?? ($this->privates['api_platform.filter_locator'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [], [])));

        $g = new \ApiPlatform\Core\Swagger\Serializer\ApiGatewayNormalizer(new \ApiPlatform\Core\Swagger\Serializer\DocumentationNormalizer($a, $b, $c, ($this->privates['api_platform.hydra.json_schema.schema_factory'] ?? $this->getApiPlatform_Hydra_JsonSchema_SchemaFactoryService()), ($this->privates['api_platform.json_schema.type_factory'] ?? $this->getApiPlatform_JsonSchema_TypeFactoryService()), new \ApiPlatform\Core\Bridge\Symfony\Routing\RouterOperationPathResolver($d, ($this->privates['api_platform.operation_path_resolver.custom'] ?? $this->getApiPlatform_OperationPathResolver_CustomService()), $e), NULL, $f, NULL, false, 'oauth2', 'application', '/oauth/v2/token', '/oauth/v2/auth', [], [], $e, true, 'page', false, 'itemsPerPage', $this->parameters['api_platform.formats'], false, 'pagination', [], $this->parameters['api_platform.swagger.versions']));
        $h = ($this->privates['serializer.name_converter.metadata_aware'] ?? $this->getSerializer_NameConverter_MetadataAwareService());
        $i = ($this->privates['api_platform.resource_class_resolver'] ?? $this->getApiPlatform_ResourceClassResolverService());
        $j = ($this->privates['api_platform.iri_converter'] ?? $this->getApiPlatform_IriConverterService());
        $k = ($this->privates['api_platform.jsonld.context_builder'] ?? $this->getApiPlatform_Jsonld_ContextBuilderService());
        $l = ($this->privates['property_accessor'] ?? $this->getPropertyAccessorService());
        $m = ($this->privates['serializer.mapping.cache_class_metadata_factory'] ?? $this->getSerializer_Mapping_CacheClassMetadataFactoryService());
        $n = new \Symfony\Component\Serializer\Normalizer\ObjectNormalizer($m, $h, $l, ($this->privates['property_info.cache'] ?? $this->getPropertyInfo_CacheService()), new \Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata($m), NULL, []);

        return $this->services['serializer'] = new \Symfony\Component\Serializer\Serializer([0 => $g, 1 => new \ApiPlatform\Core\Hydra\Serializer\ConstraintViolationListNormalizer($d, [], $h), 2 => new \ApiPlatform\Core\Problem\Serializer\ConstraintViolationListNormalizer([], $h), 3 => $g, 4 => new \ApiPlatform\Core\Hydra\Serializer\DocumentationNormalizer($a, $b, $c, $i, NULL, $d, $e, $h), 5 => new \ApiPlatform\Core\Hydra\Serializer\EntrypointNormalizer($a, $j, $d), 6 => new \ApiPlatform\Core\Hydra\Serializer\ErrorNormalizer($d, false), 7 => new \ApiPlatform\Core\Problem\Serializer\ErrorNormalizer(false), 8 => new \Symfony\Component\Serializer\Normalizer\ProblemNormalizer(false), 9 => new \ApiPlatform\Core\JsonLd\Serializer\ItemNormalizer($a, $b, $c, $j, $i, $k, $l, $h, $m, [], new RewindableGenerator(function () {
            return new \EmptyIterator();
        }, 0), false), 10 => new \ApiPlatform\Core\Serializer\ItemNormalizer($b, $c, $j, $i, $l, $h, $m, ($this->privates['api_platform.item_data_provider'] ?? $this->getApiPlatform_ItemDataProviderService()), false, NULL, new RewindableGenerator(function () {
            return new \EmptyIterator();
        }, 0), $a, false), 11 => new \Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer(), 12 => new \Symfony\Component\Serializer\Normalizer\DateTimeNormalizer(), 13 => new \Symfony\Component\Serializer\Normalizer\ConstraintViolationListNormalizer([], $h), 14 => new \Symfony\Component\Serializer\Normalizer\DateTimeZoneNormalizer(), 15 => new \Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer(), 16 => new \Symfony\Component\Serializer\Normalizer\DataUriNormalizer(($this->privates['mime_types'] ?? $this->getMimeTypesService())), 17 => new \ApiPlatform\Core\Hydra\Serializer\CollectionFiltersNormalizer(new \ApiPlatform\Core\Hydra\Serializer\PartialCollectionViewNormalizer(new \ApiPlatform\Core\Hydra\Serializer\CollectionNormalizer($k, $i, $j), 'page', 'pagination', $a, $l), $a, $i, $f), 18 => new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), 19 => new \ApiPlatform\Core\JsonLd\Serializer\ObjectNormalizer($n, $j, $k), 20 => $n], [0 => new \Symfony\Component\Serializer\Encoder\XmlEncoder(), 1 => new \Symfony\Component\Serializer\Encoder\JsonEncoder(), 2 => new \Symfony\Component\Serializer\Encoder\YamlEncoder(), 3 => new \Symfony\Component\Serializer\Encoder\CsvEncoder(), 4 => new \ApiPlatform\Core\Serializer\JsonEncoder('jsonld'), 5 => new \ApiPlatform\Core\Serializer\JsonEncoder('jsonproblem')]);
    }

    /*
     * Gets the public 'services_resetter' shared service.
     *
     * @return \Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter
     */
    protected function getServicesResetterService()
    {
        return $this->services['services_resetter'] = new \Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter(new RewindableGenerator(function () {
            if (isset($this->services['cache.app'])) {
                yield 'cache.app' => ($this->services['cache.app'] ?? null);
            }
            if (isset($this->services['cache.system'])) {
                yield 'cache.system' => ($this->services['cache.system'] ?? null);
            }
            if (isset($this->privates['cache.validator'])) {
                yield 'cache.validator' => ($this->privates['cache.validator'] ?? null);
            }
            if (isset($this->privates['cache.serializer'])) {
                yield 'cache.serializer' => ($this->privates['cache.serializer'] ?? null);
            }
            if (isset($this->privates['cache.annotations'])) {
                yield 'cache.annotations' => ($this->privates['cache.annotations'] ?? null);
            }
            if (isset($this->privates['cache.property_info'])) {
                yield 'cache.property_info' => ($this->privates['cache.property_info'] ?? null);
            }
            if (isset($this->privates['doctrine.result_cache_pool'])) {
                yield 'doctrine.result_cache_pool' => ($this->privates['doctrine.result_cache_pool'] ?? null);
            }
            if (isset($this->privates['doctrine.system_cache_pool'])) {
                yield 'doctrine.system_cache_pool' => ($this->privates['doctrine.system_cache_pool'] ?? null);
            }
            if (isset($this->privates['form.choice_list_factory.cached'])) {
                yield 'form.choice_list_factory.cached' => ($this->privates['form.choice_list_factory.cached'] ?? null);
            }
            if (isset($this->privates['debug.stopwatch'])) {
                yield 'debug.stopwatch' => ($this->privates['debug.stopwatch'] ?? null);
            }
            if (isset($this->services['doctrine'])) {
                yield 'doctrine' => ($this->services['doctrine'] ?? null);
            }
            if (isset($this->privates['form.type.entity'])) {
                yield 'form.type.entity' => ($this->privates['form.type.entity'] ?? null);
            }
            if (isset($this->services['security.token_storage'])) {
                yield 'security.token_storage' => ($this->services['security.token_storage'] ?? null);
            }
            if (isset($this->privates['cache.security_expression_language'])) {
                yield 'cache.security_expression_language' => ($this->privates['cache.security_expression_language'] ?? null);
            }
            if (isset($this->privates['monolog.handler.main'])) {
                yield 'monolog.handler.main' => ($this->privates['monolog.handler.main'] ?? null);
            }
            if (isset($this->privates['monolog.handler.console'])) {
                yield 'monolog.handler.console' => ($this->privates['monolog.handler.console'] ?? null);
            }
            if (isset($this->privates['webpack_encore.tag_renderer'])) {
                yield 'webpack_encore.tag_renderer' => ($this->privates['webpack_encore.tag_renderer'] ?? null);
            }
            if (isset($this->privates['cache.webpack_encore'])) {
                yield 'cache.webpack_encore' => ($this->privates['cache.webpack_encore'] ?? null);
            }
            if (isset($this->privates['webpack_encore.entrypoint_lookup[_default]'])) {
                yield 'webpack_encore.entrypoint_lookup[_default]' => ($this->privates['webpack_encore.entrypoint_lookup[_default]'] ?? null);
            }
            if (isset($this->privates['api_platform.cache.route_name_resolver'])) {
                yield 'api_platform.cache.route_name_resolver' => ($this->privates['api_platform.cache.route_name_resolver'] ?? null);
            }
            if (isset($this->privates['api_platform.cache.identifiers_extractor'])) {
                yield 'api_platform.cache.identifiers_extractor' => ($this->privates['api_platform.cache.identifiers_extractor'] ?? null);
            }
            if (isset($this->privates['api_platform.cache.subresource_operation_factory'])) {
                yield 'api_platform.cache.subresource_operation_factory' => ($this->privates['api_platform.cache.subresource_operation_factory'] ?? null);
            }
            if (isset($this->privates['api_platform.cache.metadata.resource'])) {
                yield 'api_platform.cache.metadata.resource' => ($this->privates['api_platform.cache.metadata.resource'] ?? null);
            }
            if (isset($this->privates['api_platform.cache.metadata.property'])) {
                yield 'api_platform.cache.metadata.property' => ($this->privates['api_platform.cache.metadata.property'] ?? null);
            }
            if (isset($this->privates['swiftmailer.email_sender.listener'])) {
                yield 'swiftmailer.email_sender.listener' => ($this->privates['swiftmailer.email_sender.listener'] ?? null);
            }
        }, function () {
            return 0 + (int) (isset($this->services['cache.app'])) + (int) (isset($this->services['cache.system'])) + (int) (isset($this->privates['cache.validator'])) + (int) (isset($this->privates['cache.serializer'])) + (int) (isset($this->privates['cache.annotations'])) + (int) (isset($this->privates['cache.property_info'])) + (int) (isset($this->privates['doctrine.result_cache_pool'])) + (int) (isset($this->privates['doctrine.system_cache_pool'])) + (int) (isset($this->privates['form.choice_list_factory.cached'])) + (int) (isset($this->privates['debug.stopwatch'])) + (int) (isset($this->services['doctrine'])) + (int) (isset($this->privates['form.type.entity'])) + (int) (isset($this->services['security.token_storage'])) + (int) (isset($this->privates['cache.security_expression_language'])) + (int) (isset($this->privates['monolog.handler.main'])) + (int) (isset($this->privates['monolog.handler.console'])) + (int) (isset($this->privates['webpack_encore.tag_renderer'])) + (int) (isset($this->privates['cache.webpack_encore'])) + (int) (isset($this->privates['webpack_encore.entrypoint_lookup[_default]'])) + (int) (isset($this->privates['api_platform.cache.route_name_resolver'])) + (int) (isset($this->privates['api_platform.cache.identifiers_extractor'])) + (int) (isset($this->privates['api_platform.cache.subresource_operation_factory'])) + (int) (isset($this->privates['api_platform.cache.metadata.resource'])) + (int) (isset($this->privates['api_platform.cache.metadata.property'])) + (int) (isset($this->privates['swiftmailer.email_sender.listener']));
        }), ['cache.app' => [0 => 'reset'], 'cache.system' => [0 => 'reset'], 'cache.validator' => [0 => 'reset'], 'cache.serializer' => [0 => 'reset'], 'cache.annotations' => [0 => 'reset'], 'cache.property_info' => [0 => 'reset'], 'doctrine.result_cache_pool' => [0 => 'reset'], 'doctrine.system_cache_pool' => [0 => 'reset'], 'form.choice_list_factory.cached' => [0 => 'reset'], 'debug.stopwatch' => [0 => 'reset'], 'doctrine' => [0 => 'reset'], 'form.type.entity' => [0 => 'reset'], 'security.token_storage' => [0 => 'disableUsageTracking', 1 => 'setToken'], 'cache.security_expression_language' => [0 => 'reset'], 'monolog.handler.main' => [0 => 'reset'], 'monolog.handler.console' => [0 => 'reset'], 'webpack_encore.tag_renderer' => [0 => 'reset'], 'cache.webpack_encore' => [0 => 'reset'], 'webpack_encore.entrypoint_lookup[_default]' => [0 => 'reset'], 'api_platform.cache.route_name_resolver' => [0 => 'reset'], 'api_platform.cache.identifiers_extractor' => [0 => 'reset'], 'api_platform.cache.subresource_operation_factory' => [0 => 'reset'], 'api_platform.cache.metadata.resource' => [0 => 'reset'], 'api_platform.cache.metadata.property' => [0 => 'reset'], 'swiftmailer.email_sender.listener' => [0 => 'reset']]);
    }

    /*
     * Gets the public 'session' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Session
     */
    protected function getSessionService()
    {
        return $this->services['session'] = new \Symfony\Component\HttpFoundation\Session\Session(($this->privates['session.storage.native'] ?? $this->getSession_Storage_NativeService()));
    }

    /*
     * Gets the public 'swiftmailer.mailer.default' shared service.
     *
     * @return \Swift_Mailer
     */
    protected function getSwiftmailer_Mailer_DefaultService()
    {
        return $this->services['swiftmailer.mailer.default'] = new \Swift_Mailer(($this->services['swiftmailer.transport'] ?? $this->getSwiftmailer_TransportService()));
    }

    /*
     * Gets the public 'swiftmailer.mailer.default.transport.real' shared service.
     *
     * @return \Swift_Transport
     */
    protected function getSwiftmailer_Mailer_Default_Transport_RealService()
    {
        return $this->services['swiftmailer.mailer.default.transport.real'] = \Symfony\Bundle\SwiftmailerBundle\DependencyInjection\SwiftmailerTransportFactory::createTransport(['transport' => 'smtp', 'url' => $this->getEnv('MAILER_URL'), 'username' => NULL, 'password' => NULL, 'host' => 'localhost', 'port' => NULL, 'timeout' => 30, 'source_ip' => NULL, 'local_domain' => NULL, 'encryption' => NULL, 'auth_mode' => NULL, 'command' => '/usr/sbin/sendmail -bs'], ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()), ($this->privates['swiftmailer.mailer.default.transport.eventdispatcher'] ?? ($this->privates['swiftmailer.mailer.default.transport.eventdispatcher'] = new \Swift_Events_SimpleEventDispatcher())));
    }

    /*
     * Gets the public 'swiftmailer.transport' shared service.
     *
     * @return \Swift_Transport_SpoolTransport
     */
    protected function getSwiftmailer_TransportService()
    {
        return $this->services['swiftmailer.transport'] = new \Swift_Transport_SpoolTransport(($this->privates['swiftmailer.mailer.default.transport.eventdispatcher'] ?? ($this->privates['swiftmailer.mailer.default.transport.eventdispatcher'] = new \Swift_Events_SimpleEventDispatcher())), new \Swift_MemorySpool());
    }

    /*
     * Gets the public 'translator' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\Translator
     */
    protected function getTranslatorService()
    {
        $this->services['translator'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'translation.loader.csv' => ['privates', 'translation.loader.csv', 'getTranslation_Loader_CsvService', false],
            'translation.loader.dat' => ['privates', 'translation.loader.dat', 'getTranslation_Loader_DatService', false],
            'translation.loader.ini' => ['privates', 'translation.loader.ini', 'getTranslation_Loader_IniService', false],
            'translation.loader.json' => ['privates', 'translation.loader.json', 'getTranslation_Loader_JsonService', false],
            'translation.loader.mo' => ['privates', 'translation.loader.mo', 'getTranslation_Loader_MoService', false],
            'translation.loader.php' => ['privates', 'translation.loader.php', 'getTranslation_Loader_PhpService', false],
            'translation.loader.po' => ['privates', 'translation.loader.po', 'getTranslation_Loader_PoService', false],
            'translation.loader.qt' => ['privates', 'translation.loader.qt', 'getTranslation_Loader_QtService', false],
            'translation.loader.res' => ['privates', 'translation.loader.res', 'getTranslation_Loader_ResService', false],
            'translation.loader.xliff' => ['privates', 'translation.loader.xliff', 'getTranslation_Loader_XliffService', false],
            'translation.loader.yml' => ['privates', 'translation.loader.yml', 'getTranslation_Loader_YmlService', false],
        ], [
            'translation.loader.csv' => '?',
            'translation.loader.dat' => '?',
            'translation.loader.ini' => '?',
            'translation.loader.json' => '?',
            'translation.loader.mo' => '?',
            'translation.loader.php' => '?',
            'translation.loader.po' => '?',
            'translation.loader.qt' => '?',
            'translation.loader.res' => '?',
            'translation.loader.xliff' => '?',
            'translation.loader.yml' => '?',
        ]), new \Symfony\Component\Translation\Formatter\MessageFormatter(new \Symfony\Component\Translation\IdentityTranslator()), 'en', ['translation.loader.php' => [0 => 'php'], 'translation.loader.yml' => [0 => 'yaml', 1 => 'yml'], 'translation.loader.xliff' => [0 => 'xlf', 1 => 'xliff'], 'translation.loader.po' => [0 => 'po'], 'translation.loader.mo' => [0 => 'mo'], 'translation.loader.qt' => [0 => 'ts'], 'translation.loader.csv' => [0 => 'csv'], 'translation.loader.res' => [0 => 'res'], 'translation.loader.dat' => [0 => 'dat'], 'translation.loader.ini' => [0 => 'ini'], 'translation.loader.json' => [0 => 'json']], ['cache_dir' => ($this->targetDir.''.'/translations'), 'debug' => false, 'resource_files' => ['af' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.af.xlf')], 'ar' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.ar.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.ar.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.ar.xlf')], 'az' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.az.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.az.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.az.xlf')], 'be' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.be.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.be.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.be.xlf')], 'bg' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.bg.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.bg.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.bg.xlf')], 'ca' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.ca.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.ca.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.ca.xlf')], 'cs' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.cs.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.cs.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.cs.xlf')], 'cy' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.cy.xlf')], 'da' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.da.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.da.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.da.xlf')], 'de' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.de.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.de.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.de.xlf')], 'el' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.el.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.el.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.el.xlf')], 'en' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.en.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.en.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.en.xlf')], 'es' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.es.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.es.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.es.xlf')], 'et' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.et.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.et.xlf')], 'eu' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.eu.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.eu.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.eu.xlf')], 'fa' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.fa.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.fa.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.fa.xlf')], 'fi' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.fi.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.fi.xlf')], 'fr' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.fr.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.fr.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.fr.xlf')], 'gl' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.gl.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.gl.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.gl.xlf')], 'he' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.he.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.he.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.he.xlf')], 'hr' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.hr.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.hr.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.hr.xlf')], 'hu' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.hu.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.hu.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.hu.xlf')], 'hy' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.hy.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.hy.xlf')], 'id' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.id.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.id.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.id.xlf')], 'it' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.it.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.it.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.it.xlf')], 'ja' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.ja.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.ja.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.ja.xlf')], 'lb' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.lb.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.lb.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.lb.xlf')], 'lt' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.lt.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.lt.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.lt.xlf')], 'lv' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.lv.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.lv.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.lv.xlf')], 'mn' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.mn.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.mn.xlf')], 'nb' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.nb.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.nb.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.nb.xlf')], 'nl' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.nl.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.nl.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.nl.xlf')], 'nn' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.nn.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.nn.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.nn.xlf')], 'no' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.no.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.no.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.no.xlf')], 'pl' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.pl.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.pl.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.pl.xlf')], 'pt' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.pt.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.pt.xlf')], 'pt_BR' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.pt_BR.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.pt_BR.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.pt_BR.xlf')], 'ro' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.ro.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.ro.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.ro.xlf')], 'ru' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.ru.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.ru.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.ru.xlf')], 'sk' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.sk.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.sk.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.sk.xlf')], 'sl' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.sl.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.sl.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.sl.xlf')], 'sq' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.sq.xlf')], 'sr_Cyrl' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.sr_Cyrl.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.sr_Cyrl.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.sr_Cyrl.xlf')], 'sr_Latn' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.sr_Latn.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.sr_Latn.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.sr_Latn.xlf')], 'sv' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.sv.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.sv.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.sv.xlf')], 'th' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.th.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.th.xlf')], 'tl' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.tl.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.tl.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.tl.xlf')], 'tr' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.tr.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.tr.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.tr.xlf')], 'uk' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.uk.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.uk.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.uk.xlf')], 'vi' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.vi.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.vi.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.vi.xlf')], 'zh_CN' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.zh_CN.xlf'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations/validators.zh_CN.xlf'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.zh_CN.xlf')], 'zh_TW' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations/validators.zh_TW.xlf')], 'pt_PT' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations/security.pt_PT.xlf')]], 'scanned_directories' => [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations'), 3 => (\dirname(__DIR__, 4).'/translations'), 4 => (\dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/translations'), 5 => (\dirname(__DIR__, 4).'/vendor/symfony/twig-bundle/translations'), 6 => (\dirname(__DIR__, 4).'/vendor/twig/extra-bundle/src/translations'), 7 => (\dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src/translations'), 8 => (\dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/translations'), 9 => (\dirname(__DIR__, 4).'/vendor/doctrine/doctrine-migrations-bundle/translations'), 10 => (\dirname(__DIR__, 4).'/vendor/symfony/security-bundle/translations'), 11 => (\dirname(__DIR__, 4).'/vendor/symfony/monolog-bundle/translations'), 12 => (\dirname(__DIR__, 4).'/vendor/symfony/webpack-encore-bundle/src/translations'), 13 => (\dirname(__DIR__, 4).'/vendor/nelmio/cors-bundle/translations'), 14 => (\dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Symfony/Bundle/translations'), 15 => (\dirname(__DIR__, 4).'/vendor/lexik/jwt-authentication-bundle/translations'), 16 => (\dirname(__DIR__, 4).'/vendor/gesdinet/jwt-refresh-token-bundle/translations'), 17 => (\dirname(__DIR__, 4).'/vendor/symfony/swiftmailer-bundle/translations')], 'cache_vary' => ['scanned_directories' => [0 => 'vendor/symfony/validator/Resources/translations', 1 => 'vendor/symfony/form/Resources/translations', 2 => 'vendor/symfony/security-core/Resources/translations', 3 => 'translations', 4 => 'vendor/symfony/framework-bundle/translations', 5 => 'vendor/symfony/twig-bundle/translations', 6 => 'vendor/twig/extra-bundle/src/translations', 7 => 'vendor/sensio/framework-extra-bundle/src/translations', 8 => 'vendor/doctrine/doctrine-bundle/translations', 9 => 'vendor/doctrine/doctrine-migrations-bundle/translations', 10 => 'vendor/symfony/security-bundle/translations', 11 => 'vendor/symfony/monolog-bundle/translations', 12 => 'vendor/symfony/webpack-encore-bundle/src/translations', 13 => 'vendor/nelmio/cors-bundle/translations', 14 => 'vendor/api-platform/core/src/Bridge/Symfony/Bundle/translations', 15 => 'vendor/lexik/jwt-authentication-bundle/translations', 16 => 'vendor/gesdinet/jwt-refresh-token-bundle/translations', 17 => 'vendor/symfony/swiftmailer-bundle/translations']]]);

        $instance->setConfigCacheFactory(($this->privates['config_cache_factory'] ?? ($this->privates['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory())));
        $instance->setFallbackLocales([0 => 'en']);

        return $instance;
    }

    /*
     * Gets the public 'twig' shared service.
     *
     * @return \Twig\Environment
     */
    protected function getTwigService()
    {
        $a = new \Twig\Loader\FilesystemLoader([], \dirname(__DIR__, 4));
        $a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Resources/views'), 'Framework');
        $a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Resources/views'), '!Framework');
        $a->addPath((\dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Resources/views'), 'Doctrine');
        $a->addPath((\dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Resources/views'), '!Doctrine');
        $a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/security-bundle/Resources/views'), 'Security');
        $a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/security-bundle/Resources/views'), '!Security');
        $a->addPath((\dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Symfony/Bundle/Resources/views'), 'ApiPlatform');
        $a->addPath((\dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Symfony/Bundle/Resources/views'), '!ApiPlatform');
        $a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/swiftmailer-bundle/Resources/views'), 'Swiftmailer');
        $a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/swiftmailer-bundle/Resources/views'), '!Swiftmailer');
        $a->addPath((\dirname(__DIR__, 4).'/templates'));
        $a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Resources/views/Email'), 'email');
        $a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Resources/views/Email'), '!email');
        $a->addPath((\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Resources/views/Form'));

        $this->services['twig'] = $instance = new \Twig\Environment($a, ['autoescape' => 'name', 'cache' => ($this->targetDir.''.'/twig'), 'charset' => 'UTF-8', 'debug' => false, 'strict_variables' => false]);

        $b = ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()));
        $c = new \Symfony\Bridge\Twig\AppVariable();
        $c->setEnvironment('prod');
        $c->setDebug(false);
        if ($this->has('security.token_storage')) {
            $c->setTokenStorage(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()));
        }
        if ($this->has('request_stack')) {
            $c->setRequestStack($b);
        }

        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CsrfExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension(($this->services['translator'] ?? $this->getTranslatorService())));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\AssetExtension(($this->privates['assets.packages'] ?? $this->getAssets_PackagesService())));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension(($this->privates['debug.file_link_formatter'] ?? ($this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL))), \dirname(__DIR__, 4), 'UTF-8'));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension(($this->services['router'] ?? $this->getRouterService())));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\StopwatchExtension(($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))), false));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ExpressionExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpFoundationExtension(new \Symfony\Component\HttpFoundation\UrlHelper($b, ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()))));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\WebLinkExtension($b));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\LogoutUrlExtension(($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService())));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\SecurityExtension(($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService())));
        $instance->addExtension(new \Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension());
        $instance->addExtension(new \Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'webpack_encore.entrypoint_lookup_collection' => ['privates', 'webpack_encore.entrypoint_lookup_collection', 'getWebpackEncore_EntrypointLookupCollectionService', false],
            'webpack_encore.tag_renderer' => ['privates', 'webpack_encore.tag_renderer', 'getWebpackEncore_TagRendererService', false],
        ], [
            'webpack_encore.entrypoint_lookup_collection' => '?',
            'webpack_encore.tag_renderer' => '?',
        ])));
        $instance->addGlobal('app', $c);
        $instance->addRuntimeLoader(new \Twig\RuntimeLoader\ContainerRuntimeLoader(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'Symfony\\Bridge\\Twig\\Extension\\CsrfRuntime' => ['privates', 'twig.runtime.security_csrf', 'getTwig_Runtime_SecurityCsrfService', false],
            'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => ['privates', 'twig.runtime.httpkernel', 'getTwig_Runtime_HttpkernelService', false],
            'Symfony\\Component\\Form\\FormRenderer' => ['privates', 'twig.form.renderer', 'getTwig_Form_RendererService', false],
        ], [
            'Symfony\\Bridge\\Twig\\Extension\\CsrfRuntime' => '?',
            'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => '?',
            'Symfony\\Component\\Form\\FormRenderer' => '?',
        ])));
        (new \Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator('F j, Y H:i', '%d days', NULL, 0, '.', ','))->configure($instance);

        return $instance;
    }

    /*
     * Gets the public 'validator' shared service.
     *
     * @return \Symfony\Component\Validator\Validator\ValidatorInterface
     */
    protected function getValidatorService()
    {
        return $this->services['validator'] = ($this->privates['validator.builder'] ?? $this->getValidator_BuilderService())->getValidator();
    }

    /*
     * Gets the private '.errored..service_locator.HtzxqlQ.App\Entity\Produit' shared service.
     *
     * @return \App\Entity\Produit
     */
    protected function getProduitService()
    {
        $this->throw('Cannot autowire service ".service_locator.HtzxqlQ": it references class "App\\Entity\\Produit" but no such service exists.');
    }

    /*
     * Gets the private '.errored..service_locator.aFKi2IA.App\Entity\Client' shared service.
     *
     * @return \App\Entity\Client
     */
    protected function getClientService()
    {
        $this->throw('Cannot autowire service ".service_locator.aFKi2IA": it references class "App\\Entity\\Client" but no such service exists.');
    }

    /*
     * Gets the private '.errored..service_locator.ghXgB6C.Symfony\Component\HttpKernel\Event\ViewEvent' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Event\ViewEvent
     */
    protected function getViewEventService()
    {
        $this->throw('Cannot autowire service ".service_locator.ghXgB6C": it references class "Symfony\\Component\\HttpKernel\\Event\\ViewEvent" but no such service exists.');
    }

    /*
     * Gets the private '.errored..service_locator.iw__25Y.App\Entity\Categorie' shared service.
     *
     * @return \App\Entity\Categorie
     */
    protected function getCategorieService()
    {
        $this->throw('Cannot autowire service ".service_locator.iw__25Y": it references class "App\\Entity\\Categorie" but no such service exists.');
    }

    /*
     * Gets the private '.errored..service_locator.vPYio_4.App\Entity\Fournisseur' shared service.
     *
     * @return \App\Entity\Fournisseur
     */
    protected function getFournisseurService()
    {
        $this->throw('Cannot autowire service ".service_locator.vPYio_4": it references class "App\\Entity\\Fournisseur" but no such service exists.');
    }

    /*
     * Gets the private '.service_locator.HtzxqlQ' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function get_ServiceLocator_HtzxqlQService()
    {
        return $this->privates['.service_locator.HtzxqlQ'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'produit' => ['privates', '.errored..service_locator.HtzxqlQ.App\\Entity\\Produit', NULL, 'Cannot autowire service ".service_locator.HtzxqlQ": it references class "App\\Entity\\Produit" but no such service exists.'],
        ], [
            'produit' => 'App\\Entity\\Produit',
        ]);
    }

    /*
     * Gets the private '.service_locator.aFKi2IA' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function get_ServiceLocator_AFKi2IAService()
    {
        return $this->privates['.service_locator.aFKi2IA'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'client' => ['privates', '.errored..service_locator.aFKi2IA.App\\Entity\\Client', NULL, 'Cannot autowire service ".service_locator.aFKi2IA": it references class "App\\Entity\\Client" but no such service exists.'],
        ], [
            'client' => 'App\\Entity\\Client',
        ]);
    }

    /*
     * Gets the private '.service_locator.c._mSk7' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function get_ServiceLocator_C_MSk7Service()
    {
        return $this->privates['.service_locator.c._mSk7'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'clientRepository' => ['privates', 'App\\Repository\\ClientRepository', 'getClientRepositoryService', false],
        ], [
            'clientRepository' => 'App\\Repository\\ClientRepository',
        ]);
    }

    /*
     * Gets the private '.service_locator.ghXgB6C' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function get_ServiceLocator_GhXgB6CService()
    {
        return $this->privates['.service_locator.ghXgB6C'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'event' => ['privates', '.errored..service_locator.ghXgB6C.Symfony\\Component\\HttpKernel\\Event\\ViewEvent', NULL, 'Cannot autowire service ".service_locator.ghXgB6C": it references class "Symfony\\Component\\HttpKernel\\Event\\ViewEvent" but no such service exists.'],
        ], [
            'event' => 'Symfony\\Component\\HttpKernel\\Event\\ViewEvent',
        ]);
    }

    /*
     * Gets the private '.service_locator.iw__25Y' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function get_ServiceLocator_Iw25YService()
    {
        return $this->privates['.service_locator.iw__25Y'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'category' => ['privates', '.errored..service_locator.iw__25Y.App\\Entity\\Categorie', NULL, 'Cannot autowire service ".service_locator.iw__25Y": it references class "App\\Entity\\Categorie" but no such service exists.'],
        ], [
            'category' => 'App\\Entity\\Categorie',
        ]);
    }

    /*
     * Gets the private '.service_locator.oAXSp4m' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function get_ServiceLocator_OAXSp4mService()
    {
        return $this->privates['.service_locator.oAXSp4m'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'repository' => ['privates', 'App\\Repository\\FournisseurRepository', 'getFournisseurRepositoryService', false],
        ], [
            'repository' => 'App\\Repository\\FournisseurRepository',
        ]);
    }

    /*
     * Gets the private '.service_locator.pNNo5z3' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function get_ServiceLocator_PNNo5z3Service()
    {
        return $this->privates['.service_locator.pNNo5z3'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'doctrine' => ['services', 'doctrine', 'getDoctrineService', false],
            'form.factory' => ['services', 'form.factory', 'getForm_FactoryService', false],
            'http_kernel' => ['services', 'http_kernel', 'getHttpKernelService', false],
            'parameter_bag' => ['privates', 'parameter_bag', 'getParameterBagService', false],
            'request_stack' => ['services', 'request_stack', 'getRequestStackService', false],
            'router' => ['services', 'router', 'getRouterService', false],
            'security.authorization_checker' => ['services', 'security.authorization_checker', 'getSecurity_AuthorizationCheckerService', false],
            'security.csrf.token_manager' => ['services', 'security.csrf.token_manager', 'getSecurity_Csrf_TokenManagerService', false],
            'security.token_storage' => ['services', 'security.token_storage', 'getSecurity_TokenStorageService', false],
            'serializer' => ['services', 'serializer', 'getSerializerService', false],
            'session' => ['services', 'session', 'getSessionService', false],
            'twig' => ['services', 'twig', 'getTwigService', false],
        ], [
            'doctrine' => '?',
            'form.factory' => '?',
            'http_kernel' => '?',
            'parameter_bag' => '?',
            'request_stack' => '?',
            'router' => '?',
            'security.authorization_checker' => '?',
            'security.csrf.token_manager' => '?',
            'security.token_storage' => '?',
            'serializer' => '?',
            'session' => '?',
            'twig' => '?',
        ]);
    }

    /*
     * Gets the private '.service_locator.tUk.n1x' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function get_ServiceLocator_TUk_N1xService()
    {
        return $this->privates['.service_locator.tUk.n1x'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'fournisseurRepository' => ['privates', 'App\\Repository\\FournisseurRepository', 'getFournisseurRepositoryService', false],
        ], [
            'fournisseurRepository' => 'App\\Repository\\FournisseurRepository',
        ]);
    }

    /*
     * Gets the private '.service_locator.vPYio_4' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    protected function get_ServiceLocator_VPYio4Service()
    {
        return $this->privates['.service_locator.vPYio_4'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'fournisseur' => ['privates', '.errored..service_locator.vPYio_4.App\\Entity\\Fournisseur', NULL, 'Cannot autowire service ".service_locator.vPYio_4": it references class "App\\Entity\\Fournisseur" but no such service exists.'],
        ], [
            'fournisseur' => 'App\\Entity\\Fournisseur',
        ]);
    }

    /*
     * Gets the private 'App\Doctrine\ListUser' shared autowired service.
     *
     * @return \App\Doctrine\ListUser
     */
    protected function getListUserService()
    {
        return $this->privates['App\\Doctrine\\ListUser'] = new \App\Doctrine\ListUser(new \Symfony\Component\Security\Core\Security(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'security.authorization_checker' => ['services', 'security.authorization_checker', 'getSecurity_AuthorizationCheckerService', false],
            'security.token_storage' => ['services', 'security.token_storage', 'getSecurity_TokenStorageService', false],
        ], [
            'security.authorization_checker' => '?',
            'security.token_storage' => '?',
        ])));
    }

    /*
     * Gets the private 'App\EventsSubscriber\PasswordEncoderSubscriber' shared autowired service.
     *
     * @return \App\EventsSubscriber\PasswordEncoderSubscriber
     */
    protected function getPasswordEncoderSubscriberService()
    {
        return $this->privates['App\\EventsSubscriber\\PasswordEncoderSubscriber'] = new \App\EventsSubscriber\PasswordEncoderSubscriber(($this->services['security.password_encoder'] ?? $this->getSecurity_PasswordEncoderService()));
    }

    /*
     * Gets the private 'App\Form\ClientType' shared autowired service.
     *
     * @return \App\Form\ClientType
     */
    protected function getClientTypeService()
    {
        return $this->privates['App\\Form\\ClientType'] = new \App\Form\ClientType();
    }

    /*
     * Gets the private 'App\Form\FournisseurType' shared autowired service.
     *
     * @return \App\Form\FournisseurType
     */
    protected function getFournisseurTypeService()
    {
        return $this->privates['App\\Form\\FournisseurType'] = new \App\Form\FournisseurType();
    }

    /*
     * Gets the private 'App\Repository\CategorieRepository' shared autowired service.
     *
     * @return \App\Repository\CategorieRepository
     */
    protected function getCategorieRepositoryService()
    {
        return $this->privates['App\\Repository\\CategorieRepository'] = new \App\Repository\CategorieRepository(($this->services['doctrine'] ?? $this->getDoctrineService()));
    }

    /*
     * Gets the private 'App\Repository\ClientRepository' shared autowired service.
     *
     * @return \App\Repository\ClientRepository
     */
    protected function getClientRepositoryService()
    {
        return $this->privates['App\\Repository\\ClientRepository'] = new \App\Repository\ClientRepository(($this->services['doctrine'] ?? $this->getDoctrineService()));
    }

    /*
     * Gets the private 'App\Repository\DepotRepository' shared autowired service.
     *
     * @return \App\Repository\DepotRepository
     */
    protected function getDepotRepositoryService()
    {
        return $this->privates['App\\Repository\\DepotRepository'] = new \App\Repository\DepotRepository(($this->services['doctrine'] ?? $this->getDoctrineService()));
    }

    /*
     * Gets the private 'App\Repository\FournisseurRepository' shared autowired service.
     *
     * @return \App\Repository\FournisseurRepository
     */
    protected function getFournisseurRepositoryService()
    {
        return $this->privates['App\\Repository\\FournisseurRepository'] = new \App\Repository\FournisseurRepository(($this->services['doctrine'] ?? $this->getDoctrineService()));
    }

    /*
     * Gets the private 'App\Repository\ProduitRepository' shared autowired service.
     *
     * @return \App\Repository\ProduitRepository
     */
    protected function getProduitRepositoryService()
    {
        return $this->privates['App\\Repository\\ProduitRepository'] = new \App\Repository\ProduitRepository(($this->services['doctrine'] ?? $this->getDoctrineService()));
    }

    /*
     * Gets the private 'App\Repository\UserRepository' shared autowired service.
     *
     * @return \App\Repository\UserRepository
     */
    protected function getUserRepositoryService()
    {
        return $this->privates['App\\Repository\\UserRepository'] = new \App\Repository\UserRepository(($this->services['doctrine'] ?? $this->getDoctrineService()));
    }

    /*
     * Gets the private 'App\Repository\VenteRepository' shared autowired service.
     *
     * @return \App\Repository\VenteRepository
     */
    protected function getVenteRepositoryService()
    {
        return $this->privates['App\\Repository\\VenteRepository'] = new \App\Repository\VenteRepository(($this->services['doctrine'] ?? $this->getDoctrineService()));
    }

    /*
     * Gets the private 'Gesdinet\JWTRefreshTokenBundle\Command\ClearInvalidRefreshTokensCommand' shared service.
     *
     * @return \Gesdinet\JWTRefreshTokenBundle\Command\ClearInvalidRefreshTokensCommand
     */
    protected function getClearInvalidRefreshTokensCommandService()
    {
        $this->privates['Gesdinet\\JWTRefreshTokenBundle\\Command\\ClearInvalidRefreshTokensCommand'] = $instance = new \Gesdinet\JWTRefreshTokenBundle\Command\ClearInvalidRefreshTokensCommand(($this->services['gesdinet.jwtrefreshtoken.refresh_token_manager'] ?? $this->getGesdinet_Jwtrefreshtoken_RefreshTokenManagerService()));

        $instance->setName('gesdinet:jwt:clear');

        return $instance;
    }

    /*
     * Gets the private 'Gesdinet\JWTRefreshTokenBundle\Command\RevokeRefreshTokenCommand' shared service.
     *
     * @return \Gesdinet\JWTRefreshTokenBundle\Command\RevokeRefreshTokenCommand
     */
    protected function getRevokeRefreshTokenCommandService()
    {
        $this->privates['Gesdinet\\JWTRefreshTokenBundle\\Command\\RevokeRefreshTokenCommand'] = $instance = new \Gesdinet\JWTRefreshTokenBundle\Command\RevokeRefreshTokenCommand(($this->services['gesdinet.jwtrefreshtoken.refresh_token_manager'] ?? $this->getGesdinet_Jwtrefreshtoken_RefreshTokenManagerService()));

        $instance->setName('gesdinet:jwt:revoke');

        return $instance;
    }

    /*
     * Gets the private 'annotations.cache' shared service.
     *
     * @return \Symfony\Component\Cache\DoctrineProvider
     */
    protected function getAnnotations_CacheService()
    {
        return new \Symfony\Component\Cache\DoctrineProvider(\Symfony\Component\Cache\Adapter\PhpArrayAdapter::create(($this->targetDir.''.'/annotations.php'), ($this->privates['cache.annotations'] ?? $this->getCache_AnnotationsService())));
    }

    /*
     * Gets the private 'annotations.cache_warmer' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\CacheWarmer\AnnotationsCacheWarmer
     */
    protected function getAnnotations_CacheWarmerService()
    {
        return $this->privates['annotations.cache_warmer'] = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\AnnotationsCacheWarmer(($this->privates['annotations.reader'] ?? $this->getAnnotations_ReaderService()), ($this->targetDir.''.'/annotations.php'), '#^Symfony\\\\(?:Component\\\\HttpKernel\\\\|Bundle\\\\FrameworkBundle\\\\Controller\\\\(?!.*Controller$))#', false);
    }

    /*
     * Gets the private 'annotations.cached_reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\CachedReader
     */
    protected function getAnnotations_CachedReaderService()
    {
        return $this->privates['annotations.cached_reader'] = new \Doctrine\Common\Annotations\CachedReader(($this->privates['annotations.reader'] ?? $this->getAnnotations_ReaderService()), $this->getAnnotations_CacheService(), false);
    }

    /*
     * Gets the private 'annotations.reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\AnnotationReader
     */
    protected function getAnnotations_ReaderService()
    {
        $this->privates['annotations.reader'] = $instance = new \Doctrine\Common\Annotations\AnnotationReader();

        $a = new \Doctrine\Common\Annotations\AnnotationRegistry();
        $a->registerUniqueLoader('class_exists');

        $instance->addGlobalIgnoredName('required', $a);

        return $instance;
    }

    /*
     * Gets the private 'api_platform.cache.identifiers_extractor' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getApiPlatform_Cache_IdentifiersExtractorService()
    {
        return $this->privates['api_platform.cache.identifiers_extractor'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('pH9yJrUdj0', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'api_platform.cache.metadata.property' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getApiPlatform_Cache_Metadata_PropertyService()
    {
        return $this->privates['api_platform.cache.metadata.property'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('q7LStTLV9E', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'api_platform.cache.metadata.resource' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getApiPlatform_Cache_Metadata_ResourceService()
    {
        return $this->privates['api_platform.cache.metadata.resource'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('IGUOVcTeoK', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'api_platform.cache.route_name_resolver' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getApiPlatform_Cache_RouteNameResolverService()
    {
        return $this->privates['api_platform.cache.route_name_resolver'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('YXtWva1wUn', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'api_platform.cache.subresource_operation_factory' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getApiPlatform_Cache_SubresourceOperationFactoryService()
    {
        return $this->privates['api_platform.cache.subresource_operation_factory'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('WVVsxrChvS', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'api_platform.doctrine.orm.data_persister' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Doctrine\Common\DataPersister
     */
    protected function getApiPlatform_Doctrine_Orm_DataPersisterService()
    {
        return $this->privates['api_platform.doctrine.orm.data_persister'] = new \ApiPlatform\Core\Bridge\Doctrine\Common\DataPersister(($this->services['doctrine'] ?? $this->getDoctrineService()));
    }

    /*
     * Gets the private 'api_platform.doctrine.orm.default.collection_data_provider' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Doctrine\Orm\CollectionDataProvider
     */
    protected function getApiPlatform_Doctrine_Orm_Default_CollectionDataProviderService()
    {
        return $this->privates['api_platform.doctrine.orm.default.collection_data_provider'] = new \ApiPlatform\Core\Bridge\Doctrine\Orm\CollectionDataProvider(($this->services['doctrine'] ?? $this->getDoctrineService()), new RewindableGenerator(function () {
            yield 0 => ($this->privates['App\\Doctrine\\ListUser'] ?? $this->getListUserService());
            yield 1 => ($this->privates['api_platform.doctrine.orm.query_extension.eager_loading'] ?? $this->getApiPlatform_Doctrine_Orm_QueryExtension_EagerLoadingService());
            yield 2 => ($this->privates['api_platform.doctrine.orm.query_extension.filter'] ?? $this->getApiPlatform_Doctrine_Orm_QueryExtension_FilterService());
            yield 3 => ($this->privates['api_platform.doctrine.orm.query_extension.filter_eager_loading'] ?? $this->getApiPlatform_Doctrine_Orm_QueryExtension_FilterEagerLoadingService());
            yield 4 => ($this->privates['api_platform.doctrine.orm.query_extension.order'] ?? $this->getApiPlatform_Doctrine_Orm_QueryExtension_OrderService());
            yield 5 => ($this->privates['api_platform.doctrine.orm.query_extension.pagination'] ?? $this->getApiPlatform_Doctrine_Orm_QueryExtension_PaginationService());
        }, 6));
    }

    /*
     * Gets the private 'api_platform.doctrine.orm.default.item_data_provider' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Doctrine\Orm\ItemDataProvider
     */
    protected function getApiPlatform_Doctrine_Orm_Default_ItemDataProviderService()
    {
        return $this->privates['api_platform.doctrine.orm.default.item_data_provider'] = new \ApiPlatform\Core\Bridge\Doctrine\Orm\ItemDataProvider(($this->services['doctrine'] ?? $this->getDoctrineService()), ($this->privates['api_platform.metadata.property.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_NameCollectionFactory_CachedService()), ($this->privates['api_platform.metadata.property.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_MetadataFactory_CachedService()), new RewindableGenerator(function () {
            yield 0 => ($this->privates['App\\Doctrine\\ListUser'] ?? $this->getListUserService());
            yield 1 => ($this->privates['api_platform.doctrine.orm.query_extension.eager_loading'] ?? $this->getApiPlatform_Doctrine_Orm_QueryExtension_EagerLoadingService());
        }, 2));
    }

    /*
     * Gets the private 'api_platform.doctrine.orm.default.subresource_data_provider' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Doctrine\Orm\SubresourceDataProvider
     */
    protected function getApiPlatform_Doctrine_Orm_Default_SubresourceDataProviderService()
    {
        return $this->privates['api_platform.doctrine.orm.default.subresource_data_provider'] = new \ApiPlatform\Core\Bridge\Doctrine\Orm\SubresourceDataProvider(($this->services['doctrine'] ?? $this->getDoctrineService()), ($this->privates['api_platform.metadata.property.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_NameCollectionFactory_CachedService()), ($this->privates['api_platform.metadata.property.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_MetadataFactory_CachedService()), new RewindableGenerator(function () {
            yield 0 => ($this->privates['App\\Doctrine\\ListUser'] ?? $this->getListUserService());
            yield 1 => ($this->privates['api_platform.doctrine.orm.query_extension.eager_loading'] ?? $this->getApiPlatform_Doctrine_Orm_QueryExtension_EagerLoadingService());
            yield 2 => ($this->privates['api_platform.doctrine.orm.query_extension.filter'] ?? $this->getApiPlatform_Doctrine_Orm_QueryExtension_FilterService());
            yield 3 => ($this->privates['api_platform.doctrine.orm.query_extension.filter_eager_loading'] ?? $this->getApiPlatform_Doctrine_Orm_QueryExtension_FilterEagerLoadingService());
            yield 4 => ($this->privates['api_platform.doctrine.orm.query_extension.order'] ?? $this->getApiPlatform_Doctrine_Orm_QueryExtension_OrderService());
            yield 5 => ($this->privates['api_platform.doctrine.orm.query_extension.pagination'] ?? $this->getApiPlatform_Doctrine_Orm_QueryExtension_PaginationService());
        }, 6), new RewindableGenerator(function () {
            yield 0 => ($this->privates['App\\Doctrine\\ListUser'] ?? $this->getListUserService());
            yield 1 => ($this->privates['api_platform.doctrine.orm.query_extension.eager_loading'] ?? $this->getApiPlatform_Doctrine_Orm_QueryExtension_EagerLoadingService());
        }, 2));
    }

    /*
     * Gets the private 'api_platform.doctrine.orm.query_extension.eager_loading' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\EagerLoadingExtension
     */
    protected function getApiPlatform_Doctrine_Orm_QueryExtension_EagerLoadingService()
    {
        return $this->privates['api_platform.doctrine.orm.query_extension.eager_loading'] = new \ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\EagerLoadingExtension(($this->privates['api_platform.metadata.property.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_NameCollectionFactory_CachedService()), ($this->privates['api_platform.metadata.property.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_MetadataFactory_CachedService()), ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), 30, true, NULL, NULL, false, ($this->privates['serializer.mapping.cache_class_metadata_factory'] ?? $this->getSerializer_Mapping_CacheClassMetadataFactoryService()));
    }

    /*
     * Gets the private 'api_platform.doctrine.orm.query_extension.filter' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\FilterExtension
     */
    protected function getApiPlatform_Doctrine_Orm_QueryExtension_FilterService()
    {
        return $this->privates['api_platform.doctrine.orm.query_extension.filter'] = new \ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\FilterExtension(($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), ($this->privates['api_platform.filter_locator'] ?? ($this->privates['api_platform.filter_locator'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [], []))));
    }

    /*
     * Gets the private 'api_platform.doctrine.orm.query_extension.filter_eager_loading' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\FilterEagerLoadingExtension
     */
    protected function getApiPlatform_Doctrine_Orm_QueryExtension_FilterEagerLoadingService()
    {
        return $this->privates['api_platform.doctrine.orm.query_extension.filter_eager_loading'] = new \ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\FilterEagerLoadingExtension(($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), true, ($this->privates['api_platform.resource_class_resolver'] ?? $this->getApiPlatform_ResourceClassResolverService()));
    }

    /*
     * Gets the private 'api_platform.doctrine.orm.query_extension.order' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\OrderExtension
     */
    protected function getApiPlatform_Doctrine_Orm_QueryExtension_OrderService()
    {
        return $this->privates['api_platform.doctrine.orm.query_extension.order'] = new \ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\OrderExtension('ASC', ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()));
    }

    /*
     * Gets the private 'api_platform.doctrine.orm.query_extension.pagination' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\PaginationExtension
     */
    protected function getApiPlatform_Doctrine_Orm_QueryExtension_PaginationService()
    {
        $a = ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService());

        return $this->privates['api_platform.doctrine.orm.query_extension.pagination'] = new \ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\PaginationExtension(($this->services['doctrine'] ?? $this->getDoctrineService()), $a, new \ApiPlatform\Core\DataProvider\Pagination($a, $this->parameters['api_platform.collection.pagination'], $this->parameters['api_platform.graphql.collection.pagination']));
    }

    /*
     * Gets the private 'api_platform.http_cache.listener.response.configure' shared service.
     *
     * @return \ApiPlatform\Core\HttpCache\EventListener\AddHeadersListener
     */
    protected function getApiPlatform_HttpCache_Listener_Response_ConfigureService()
    {
        return $this->privates['api_platform.http_cache.listener.response.configure'] = new \ApiPlatform\Core\HttpCache\EventListener\AddHeadersListener(true, NULL, NULL, $this->parameters['api_platform.http_cache.vary'], NULL, ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()));
    }

    /*
     * Gets the private 'api_platform.hydra.json_schema.schema_factory' shared service.
     *
     * @return \ApiPlatform\Core\Hydra\JsonSchema\SchemaFactory
     */
    protected function getApiPlatform_Hydra_JsonSchema_SchemaFactoryService()
    {
        $a = ($this->privates['api_platform.json_schema.type_factory'] ?? $this->getApiPlatform_JsonSchema_TypeFactoryService());

        if (isset($this->privates['api_platform.hydra.json_schema.schema_factory'])) {
            return $this->privates['api_platform.hydra.json_schema.schema_factory'];
        }

        return $this->privates['api_platform.hydra.json_schema.schema_factory'] = new \ApiPlatform\Core\Hydra\JsonSchema\SchemaFactory(new \ApiPlatform\Core\JsonSchema\SchemaFactory($a, ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), ($this->privates['api_platform.metadata.property.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_NameCollectionFactory_CachedService()), ($this->privates['api_platform.metadata.property.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_MetadataFactory_CachedService()), ($this->privates['serializer.name_converter.metadata_aware'] ?? $this->getSerializer_NameConverter_MetadataAwareService()), ($this->privates['api_platform.resource_class_resolver'] ?? $this->getApiPlatform_ResourceClassResolverService())));
    }

    /*
     * Gets the private 'api_platform.hydra.listener.response.add_link_header' shared service.
     *
     * @return \ApiPlatform\Core\Hydra\EventListener\AddLinkHeaderListener
     */
    protected function getApiPlatform_Hydra_Listener_Response_AddLinkHeaderService()
    {
        return $this->privates['api_platform.hydra.listener.response.add_link_header'] = new \ApiPlatform\Core\Hydra\EventListener\AddLinkHeaderListener(($this->privates['api_platform.router'] ?? $this->getApiPlatform_RouterService()));
    }

    /*
     * Gets the private 'api_platform.identifier.converter' shared service.
     *
     * @return \ApiPlatform\Core\Identifier\IdentifierConverter
     */
    protected function getApiPlatform_Identifier_ConverterService()
    {
        return $this->privates['api_platform.identifier.converter'] = new \ApiPlatform\Core\Identifier\IdentifierConverter(($this->privates['api_platform.identifiers_extractor.cached'] ?? $this->getApiPlatform_IdentifiersExtractor_CachedService()), ($this->privates['api_platform.metadata.property.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_MetadataFactory_CachedService()), new RewindableGenerator(function () {
            yield 0 => ($this->privates['api_platform.identifier.integer'] ?? ($this->privates['api_platform.identifier.integer'] = new \ApiPlatform\Core\Identifier\Normalizer\IntegerDenormalizer()));
            yield 1 => ($this->privates['api_platform.identifier.date_normalizer'] ?? ($this->privates['api_platform.identifier.date_normalizer'] = new \ApiPlatform\Core\Identifier\Normalizer\DateTimeIdentifierDenormalizer()));
        }, 2));
    }

    /*
     * Gets the private 'api_platform.identifiers_extractor.cached' shared service.
     *
     * @return \ApiPlatform\Core\Api\CachedIdentifiersExtractor
     */
    protected function getApiPlatform_IdentifiersExtractor_CachedService()
    {
        $a = ($this->privates['property_accessor'] ?? $this->getPropertyAccessorService());
        $b = ($this->privates['api_platform.resource_class_resolver'] ?? $this->getApiPlatform_ResourceClassResolverService());

        return $this->privates['api_platform.identifiers_extractor.cached'] = new \ApiPlatform\Core\Api\CachedIdentifiersExtractor(($this->privates['api_platform.cache.identifiers_extractor'] ?? $this->getApiPlatform_Cache_IdentifiersExtractorService()), new \ApiPlatform\Core\Api\IdentifiersExtractor(($this->privates['api_platform.metadata.property.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_NameCollectionFactory_CachedService()), ($this->privates['api_platform.metadata.property.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_MetadataFactory_CachedService()), $a, $b), $a, $b);
    }

    /*
     * Gets the private 'api_platform.iri_converter' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Symfony\Routing\IriConverter
     */
    protected function getApiPlatform_IriConverterService()
    {
        $a = ($this->privates['api_platform.router'] ?? $this->getApiPlatform_RouterService());

        return $this->privates['api_platform.iri_converter'] = new \ApiPlatform\Core\Bridge\Symfony\Routing\IriConverter(($this->privates['api_platform.metadata.property.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_NameCollectionFactory_CachedService()), ($this->privates['api_platform.metadata.property.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_MetadataFactory_CachedService()), ($this->privates['api_platform.item_data_provider'] ?? $this->getApiPlatform_ItemDataProviderService()), new \ApiPlatform\Core\Bridge\Symfony\Routing\CachedRouteNameResolver(($this->privates['api_platform.cache.route_name_resolver'] ?? $this->getApiPlatform_Cache_RouteNameResolverService()), new \ApiPlatform\Core\Bridge\Symfony\Routing\RouteNameResolver($a)), $a, ($this->privates['property_accessor'] ?? $this->getPropertyAccessorService()), ($this->privates['api_platform.identifiers_extractor.cached'] ?? $this->getApiPlatform_IdentifiersExtractor_CachedService()), ($this->privates['api_platform.subresource_data_provider'] ?? $this->getApiPlatform_SubresourceDataProviderService()), ($this->privates['api_platform.identifier.converter'] ?? $this->getApiPlatform_Identifier_ConverterService()), ($this->privates['api_platform.resource_class_resolver'] ?? $this->getApiPlatform_ResourceClassResolverService()));
    }

    /*
     * Gets the private 'api_platform.item_data_provider' shared service.
     *
     * @return \ApiPlatform\Core\DataProvider\ChainItemDataProvider
     */
    protected function getApiPlatform_ItemDataProviderService()
    {
        return $this->privates['api_platform.item_data_provider'] = new \ApiPlatform\Core\DataProvider\ChainItemDataProvider(new RewindableGenerator(function () {
            yield 0 => ($this->privates['api_platform.doctrine.orm.default.item_data_provider'] ?? $this->getApiPlatform_Doctrine_Orm_Default_ItemDataProviderService());
        }, 1));
    }

    /*
     * Gets the private 'api_platform.json_schema.type_factory' shared service.
     *
     * @return \ApiPlatform\Core\JsonSchema\TypeFactory
     */
    protected function getApiPlatform_JsonSchema_TypeFactoryService()
    {
        $this->privates['api_platform.json_schema.type_factory'] = $instance = new \ApiPlatform\Core\JsonSchema\TypeFactory(($this->privates['api_platform.resource_class_resolver'] ?? $this->getApiPlatform_ResourceClassResolverService()));

        $instance->setSchemaFactory(($this->privates['api_platform.hydra.json_schema.schema_factory'] ?? $this->getApiPlatform_Hydra_JsonSchema_SchemaFactoryService()));

        return $instance;
    }

    /*
     * Gets the private 'api_platform.jsonld.context_builder' shared service.
     *
     * @return \ApiPlatform\Core\JsonLd\ContextBuilder
     */
    protected function getApiPlatform_Jsonld_ContextBuilderService()
    {
        return $this->privates['api_platform.jsonld.context_builder'] = new \ApiPlatform\Core\JsonLd\ContextBuilder(($this->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()), ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), ($this->privates['api_platform.metadata.property.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_NameCollectionFactory_CachedService()), ($this->privates['api_platform.metadata.property.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_MetadataFactory_CachedService()), ($this->privates['api_platform.router'] ?? $this->getApiPlatform_RouterService()));
    }

    /*
     * Gets the private 'api_platform.listener.exception' shared service.
     *
     * @return \ApiPlatform\Core\EventListener\ExceptionListener
     */
    protected function getApiPlatform_Listener_ExceptionService()
    {
        return $this->privates['api_platform.listener.exception'] = new \ApiPlatform\Core\EventListener\ExceptionListener('api_platform.action.exception', ($this->privates['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService()), false, ($this->privates['exception_listener'] ?? $this->getExceptionListenerService()));
    }

    /*
     * Gets the private 'api_platform.listener.exception.validation' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Symfony\Validator\EventListener\ValidationExceptionListener
     */
    protected function getApiPlatform_Listener_Exception_ValidationService()
    {
        return $this->privates['api_platform.listener.exception.validation'] = new \ApiPlatform\Core\Bridge\Symfony\Validator\EventListener\ValidationExceptionListener(($this->services['serializer'] ?? $this->getSerializerService()), $this->parameters['api_platform.error_formats']);
    }

    /*
     * Gets the private 'api_platform.listener.request.add_format' shared service.
     *
     * @return \ApiPlatform\Core\EventListener\AddFormatListener
     */
    protected function getApiPlatform_Listener_Request_AddFormatService()
    {
        return $this->privates['api_platform.listener.request.add_format'] = new \ApiPlatform\Core\EventListener\AddFormatListener(new \Negotiation\Negotiator(), ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), $this->parameters['api_platform.formats']);
    }

    /*
     * Gets the private 'api_platform.listener.request.deserialize' shared service.
     *
     * @return \ApiPlatform\Core\EventListener\DeserializeListener
     */
    protected function getApiPlatform_Listener_Request_DeserializeService()
    {
        return $this->privates['api_platform.listener.request.deserialize'] = new \ApiPlatform\Core\EventListener\DeserializeListener(($this->services['serializer'] ?? $this->getSerializerService()), ($this->privates['api_platform.serializer.context_builder.filter'] ?? $this->getApiPlatform_Serializer_ContextBuilder_FilterService()), ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()));
    }

    /*
     * Gets the private 'api_platform.listener.request.read' shared service.
     *
     * @return \ApiPlatform\Core\EventListener\ReadListener
     */
    protected function getApiPlatform_Listener_Request_ReadService()
    {
        return $this->privates['api_platform.listener.request.read'] = new \ApiPlatform\Core\EventListener\ReadListener(new \ApiPlatform\Core\DataProvider\ChainCollectionDataProvider(new RewindableGenerator(function () {
            yield 0 => ($this->privates['api_platform.doctrine.orm.default.collection_data_provider'] ?? $this->getApiPlatform_Doctrine_Orm_Default_CollectionDataProviderService());
        }, 1)), ($this->privates['api_platform.item_data_provider'] ?? $this->getApiPlatform_ItemDataProviderService()), ($this->privates['api_platform.subresource_data_provider'] ?? $this->getApiPlatform_SubresourceDataProviderService()), ($this->privates['api_platform.serializer.context_builder.filter'] ?? $this->getApiPlatform_Serializer_ContextBuilder_FilterService()), ($this->privates['api_platform.identifier.converter'] ?? $this->getApiPlatform_Identifier_ConverterService()), ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()));
    }

    /*
     * Gets the private 'api_platform.listener.view.respond' shared service.
     *
     * @return \ApiPlatform\Core\EventListener\RespondListener
     */
    protected function getApiPlatform_Listener_View_RespondService()
    {
        return $this->privates['api_platform.listener.view.respond'] = new \ApiPlatform\Core\EventListener\RespondListener(($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()));
    }

    /*
     * Gets the private 'api_platform.listener.view.serialize' shared service.
     *
     * @return \ApiPlatform\Core\EventListener\SerializeListener
     */
    protected function getApiPlatform_Listener_View_SerializeService()
    {
        return $this->privates['api_platform.listener.view.serialize'] = new \ApiPlatform\Core\EventListener\SerializeListener(($this->services['serializer'] ?? $this->getSerializerService()), ($this->privates['api_platform.serializer.context_builder.filter'] ?? $this->getApiPlatform_Serializer_ContextBuilder_FilterService()), ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()));
    }

    /*
     * Gets the private 'api_platform.listener.view.validate' shared service.
     *
     * @return \ApiPlatform\Core\Validator\EventListener\ValidateListener
     */
    protected function getApiPlatform_Listener_View_ValidateService()
    {
        return $this->privates['api_platform.listener.view.validate'] = new \ApiPlatform\Core\Validator\EventListener\ValidateListener(new \ApiPlatform\Core\Bridge\Symfony\Validator\Validator(($this->services['validator'] ?? $this->getValidatorService()), $this), ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()));
    }

    /*
     * Gets the private 'api_platform.listener.view.validate_query_parameters' shared service.
     *
     * @return \ApiPlatform\Core\Filter\QueryParameterValidateListener
     */
    protected function getApiPlatform_Listener_View_ValidateQueryParametersService()
    {
        return $this->privates['api_platform.listener.view.validate_query_parameters'] = new \ApiPlatform\Core\Filter\QueryParameterValidateListener(($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), ($this->privates['api_platform.filter_locator'] ?? ($this->privates['api_platform.filter_locator'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [], []))));
    }

    /*
     * Gets the private 'api_platform.listener.view.write' shared service.
     *
     * @return \ApiPlatform\Core\EventListener\WriteListener
     */
    protected function getApiPlatform_Listener_View_WriteService()
    {
        return $this->privates['api_platform.listener.view.write'] = new \ApiPlatform\Core\EventListener\WriteListener(new \ApiPlatform\Core\DataPersister\ChainDataPersister(new RewindableGenerator(function () {
            yield 0 => ($this->privates['api_platform.doctrine.orm.data_persister'] ?? $this->getApiPlatform_Doctrine_Orm_DataPersisterService());
        }, 1)), ($this->privates['api_platform.iri_converter'] ?? $this->getApiPlatform_IriConverterService()), ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), ($this->privates['api_platform.resource_class_resolver'] ?? $this->getApiPlatform_ResourceClassResolverService()));
    }

    /*
     * Gets the private 'api_platform.metadata.property.metadata_factory.cached' shared service.
     *
     * @return \ApiPlatform\Core\Metadata\Property\Factory\CachedPropertyMetadataFactory
     */
    protected function getApiPlatform_Metadata_Property_MetadataFactory_CachedService()
    {
        $a = ($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService());

        return $this->privates['api_platform.metadata.property.metadata_factory.cached'] = new \ApiPlatform\Core\Metadata\Property\Factory\CachedPropertyMetadataFactory(($this->privates['api_platform.cache.metadata.property'] ?? $this->getApiPlatform_Cache_Metadata_PropertyService()), new \ApiPlatform\Core\Bridge\Symfony\Validator\Metadata\Property\ValidatorPropertyMetadataFactory(($this->services['validator'] ?? $this->getValidatorService()), new \ApiPlatform\Core\Metadata\Property\Factory\ExtractorPropertyMetadataFactory(($this->privates['api_platform.metadata.extractor.yaml'] ?? ($this->privates['api_platform.metadata.extractor.yaml'] = new \ApiPlatform\Core\Metadata\Extractor\YamlExtractor([], $this))), new \ApiPlatform\Core\Metadata\Property\Factory\AnnotationPropertyMetadataFactory($a, new \ApiPlatform\Core\Metadata\Property\Factory\AnnotationSubresourceMetadataFactory($a, new \ApiPlatform\Core\Metadata\Property\Factory\SerializerPropertyMetadataFactory(($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), ($this->privates['serializer.mapping.cache_class_metadata_factory'] ?? $this->getSerializer_Mapping_CacheClassMetadataFactoryService()), new \ApiPlatform\Core\Bridge\Doctrine\Orm\Metadata\Property\DoctrineOrmPropertyMetadataFactory(($this->services['doctrine'] ?? $this->getDoctrineService()), new \ApiPlatform\Core\Metadata\Property\Factory\InheritedPropertyMetadataFactory(($this->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()), new \ApiPlatform\Core\Bridge\Symfony\PropertyInfo\Metadata\Property\PropertyInfoPropertyMetadataFactory(($this->privates['property_info.cache'] ?? $this->getPropertyInfo_CacheService()), new \ApiPlatform\Core\Metadata\Property\Factory\ExtractorPropertyMetadataFactory(($this->privates['api_platform.metadata.extractor.xml'] ?? ($this->privates['api_platform.metadata.extractor.xml'] = new \ApiPlatform\Core\Metadata\Extractor\XmlExtractor([], $this))))))), ($this->privates['api_platform.resource_class_resolver'] ?? $this->getApiPlatform_ResourceClassResolverService())))))));
    }

    /*
     * Gets the private 'api_platform.metadata.property.name_collection_factory.cached' shared service.
     *
     * @return \ApiPlatform\Core\Metadata\Property\Factory\CachedPropertyNameCollectionFactory
     */
    protected function getApiPlatform_Metadata_Property_NameCollectionFactory_CachedService()
    {
        return $this->privates['api_platform.metadata.property.name_collection_factory.cached'] = new \ApiPlatform\Core\Metadata\Property\Factory\CachedPropertyNameCollectionFactory(($this->privates['api_platform.cache.metadata.property'] ?? $this->getApiPlatform_Cache_Metadata_PropertyService()), new \ApiPlatform\Core\Metadata\Property\Factory\ExtractorPropertyNameCollectionFactory(($this->privates['api_platform.metadata.extractor.yaml'] ?? ($this->privates['api_platform.metadata.extractor.yaml'] = new \ApiPlatform\Core\Metadata\Extractor\YamlExtractor([], $this))), new \ApiPlatform\Core\Metadata\Property\Factory\ExtractorPropertyNameCollectionFactory(($this->privates['api_platform.metadata.extractor.xml'] ?? ($this->privates['api_platform.metadata.extractor.xml'] = new \ApiPlatform\Core\Metadata\Extractor\XmlExtractor([], $this))), new \ApiPlatform\Core\Metadata\Property\Factory\InheritedPropertyNameCollectionFactory(($this->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()), new \ApiPlatform\Core\Bridge\Symfony\PropertyInfo\Metadata\Property\PropertyInfoPropertyNameCollectionFactory(($this->privates['property_info.cache'] ?? $this->getPropertyInfo_CacheService()))))));
    }

    /*
     * Gets the private 'api_platform.metadata.resource.metadata_factory.cached' shared service.
     *
     * @return \ApiPlatform\Core\Metadata\Resource\Factory\CachedResourceMetadataFactory
     */
    protected function getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()
    {
        $a = ($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService());

        return $this->privates['api_platform.metadata.resource.metadata_factory.cached'] = new \ApiPlatform\Core\Metadata\Resource\Factory\CachedResourceMetadataFactory(($this->privates['api_platform.cache.metadata.resource'] ?? $this->getApiPlatform_Cache_Metadata_ResourceService()), new \ApiPlatform\Core\Metadata\Resource\Factory\FormatsResourceMetadataFactory(new \ApiPlatform\Core\Metadata\Resource\Factory\OperationResourceMetadataFactory(new \ApiPlatform\Core\Metadata\Resource\Factory\AnnotationResourceFilterMetadataFactory($a, new \ApiPlatform\Core\Metadata\Resource\Factory\ShortNameResourceMetadataFactory(new \ApiPlatform\Core\Metadata\Resource\Factory\PhpDocResourceMetadataFactory(new \ApiPlatform\Core\Metadata\Resource\Factory\InputOutputResourceMetadataFactory(new \ApiPlatform\Core\Metadata\Resource\Factory\ExtractorResourceMetadataFactory(($this->privates['api_platform.metadata.extractor.yaml'] ?? ($this->privates['api_platform.metadata.extractor.yaml'] = new \ApiPlatform\Core\Metadata\Extractor\YamlExtractor([], $this))), new \ApiPlatform\Core\Metadata\Resource\Factory\AnnotationResourceMetadataFactory($a, new \ApiPlatform\Core\Metadata\Resource\Factory\ExtractorResourceMetadataFactory(($this->privates['api_platform.metadata.extractor.xml'] ?? ($this->privates['api_platform.metadata.extractor.xml'] = new \ApiPlatform\Core\Metadata\Extractor\XmlExtractor([], $this)))))))))), $this->parameters['api_platform.patch_formats']), $this->parameters['api_platform.formats'], $this->parameters['api_platform.patch_formats']));
    }

    /*
     * Gets the private 'api_platform.metadata.resource.name_collection_factory.cached' shared service.
     *
     * @return \ApiPlatform\Core\Metadata\Resource\Factory\CachedResourceNameCollectionFactory
     */
    protected function getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()
    {
        return $this->privates['api_platform.metadata.resource.name_collection_factory.cached'] = new \ApiPlatform\Core\Metadata\Resource\Factory\CachedResourceNameCollectionFactory(($this->privates['api_platform.cache.metadata.resource'] ?? $this->getApiPlatform_Cache_Metadata_ResourceService()), new \ApiPlatform\Core\Metadata\Resource\Factory\ExtractorResourceNameCollectionFactory(($this->privates['api_platform.metadata.extractor.yaml'] ?? ($this->privates['api_platform.metadata.extractor.yaml'] = new \ApiPlatform\Core\Metadata\Extractor\YamlExtractor([], $this))), new \ApiPlatform\Core\Metadata\Resource\Factory\AnnotationResourceNameCollectionFactory(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()), $this->parameters['api_platform.resource_class_directories'], new \ApiPlatform\Core\Metadata\Resource\Factory\ExtractorResourceNameCollectionFactory(($this->privates['api_platform.metadata.extractor.xml'] ?? ($this->privates['api_platform.metadata.extractor.xml'] = new \ApiPlatform\Core\Metadata\Extractor\XmlExtractor([], $this)))))));
    }

    /*
     * Gets the private 'api_platform.operation_path_resolver.custom' shared service.
     *
     * @return \ApiPlatform\Core\PathResolver\CustomOperationPathResolver
     */
    protected function getApiPlatform_OperationPathResolver_CustomService()
    {
        return $this->privates['api_platform.operation_path_resolver.custom'] = new \ApiPlatform\Core\PathResolver\CustomOperationPathResolver(new \ApiPlatform\Core\PathResolver\OperationPathResolver(($this->privates['api_platform.path_segment_name_generator.underscore'] ?? ($this->privates['api_platform.path_segment_name_generator.underscore'] = new \ApiPlatform\Core\Operation\UnderscorePathSegmentNameGenerator()))));
    }

    /*
     * Gets the private 'api_platform.resource_class_resolver' shared service.
     *
     * @return \ApiPlatform\Core\Api\ResourceClassResolver
     */
    protected function getApiPlatform_ResourceClassResolverService()
    {
        return $this->privates['api_platform.resource_class_resolver'] = new \ApiPlatform\Core\Api\ResourceClassResolver(($this->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()));
    }

    /*
     * Gets the private 'api_platform.router' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Symfony\Routing\Router
     */
    protected function getApiPlatform_RouterService()
    {
        return $this->privates['api_platform.router'] = new \ApiPlatform\Core\Bridge\Symfony\Routing\Router(($this->services['router'] ?? $this->getRouterService()));
    }

    /*
     * Gets the private 'api_platform.security.listener.request.deny_access' shared service.
     *
     * @return \ApiPlatform\Core\Security\EventListener\DenyAccessListener
     */
    protected function getApiPlatform_Security_Listener_Request_DenyAccessService()
    {
        return $this->privates['api_platform.security.listener.request.deny_access'] = new \ApiPlatform\Core\Security\EventListener\DenyAccessListener(($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), new \ApiPlatform\Core\Security\ResourceAccessChecker(($this->privates['security.expression_language'] ?? $this->getSecurity_ExpressionLanguageService()), ($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver())), ($this->privates['security.role_hierarchy'] ?? ($this->privates['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy([]))), ($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService())));
    }

    /*
     * Gets the private 'api_platform.serializer.context_builder.filter' shared service.
     *
     * @return \ApiPlatform\Core\Serializer\SerializerFilterContextBuilder
     */
    protected function getApiPlatform_Serializer_ContextBuilder_FilterService()
    {
        $a = ($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService());

        return $this->privates['api_platform.serializer.context_builder.filter'] = new \ApiPlatform\Core\Serializer\SerializerFilterContextBuilder($a, ($this->privates['api_platform.filter_locator'] ?? ($this->privates['api_platform.filter_locator'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [], []))), new \ApiPlatform\Core\Serializer\SerializerContextBuilder($a));
    }

    /*
     * Gets the private 'api_platform.subresource_data_provider' shared service.
     *
     * @return \ApiPlatform\Core\DataProvider\ChainSubresourceDataProvider
     */
    protected function getApiPlatform_SubresourceDataProviderService()
    {
        return $this->privates['api_platform.subresource_data_provider'] = new \ApiPlatform\Core\DataProvider\ChainSubresourceDataProvider(new RewindableGenerator(function () {
            yield 0 => ($this->privates['api_platform.doctrine.orm.default.subresource_data_provider'] ?? $this->getApiPlatform_Doctrine_Orm_Default_SubresourceDataProviderService());
        }, 1));
    }

    /*
     * Gets the private 'api_platform.subresource_operation_factory.cached' shared service.
     *
     * @return \ApiPlatform\Core\Operation\Factory\CachedSubresourceOperationFactory
     */
    protected function getApiPlatform_SubresourceOperationFactory_CachedService()
    {
        return $this->privates['api_platform.subresource_operation_factory.cached'] = new \ApiPlatform\Core\Operation\Factory\CachedSubresourceOperationFactory(($this->privates['api_platform.cache.subresource_operation_factory'] ?? $this->getApiPlatform_Cache_SubresourceOperationFactoryService()), new \ApiPlatform\Core\Operation\Factory\SubresourceOperationFactory(($this->privates['api_platform.metadata.resource.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Resource_MetadataFactory_CachedService()), ($this->privates['api_platform.metadata.property.name_collection_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_NameCollectionFactory_CachedService()), ($this->privates['api_platform.metadata.property.metadata_factory.cached'] ?? $this->getApiPlatform_Metadata_Property_MetadataFactory_CachedService()), ($this->privates['api_platform.path_segment_name_generator.underscore'] ?? ($this->privates['api_platform.path_segment_name_generator.underscore'] = new \ApiPlatform\Core\Operation\UnderscorePathSegmentNameGenerator()))));
    }

    /*
     * Gets the private 'argument_resolver.service' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver
     */
    protected function getArgumentResolver_ServiceService()
    {
        return $this->privates['argument_resolver.service'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'App\\Controller\\CategorieController::archiverCategory' => ['privates', '.service_locator.iw__25Y', 'get_ServiceLocator_Iw25YService', false],
            'App\\Controller\\ClientController::delete' => ['privates', '.service_locator.aFKi2IA', 'get_ServiceLocator_AFKi2IAService', false],
            'App\\Controller\\ClientController::edit' => ['privates', '.service_locator.aFKi2IA', 'get_ServiceLocator_AFKi2IAService', false],
            'App\\Controller\\ClientController::index' => ['privates', '.service_locator.c._mSk7', 'get_ServiceLocator_C_MSk7Service', false],
            'App\\Controller\\ClientController::show' => ['privates', '.service_locator.aFKi2IA', 'get_ServiceLocator_AFKi2IAService', false],
            'App\\Controller\\FournisseurController::delete' => ['privates', '.service_locator.vPYio_4', 'get_ServiceLocator_VPYio4Service', false],
            'App\\Controller\\FournisseurController::edit' => ['privates', '.service_locator.vPYio_4', 'get_ServiceLocator_VPYio4Service', false],
            'App\\Controller\\FournisseurController::index' => ['privates', '.service_locator.tUk.n1x', 'get_ServiceLocator_TUk_N1xService', false],
            'App\\Controller\\FournisseurController::new' => ['privates', '.service_locator.oAXSp4m', 'get_ServiceLocator_OAXSp4mService', false],
            'App\\Controller\\FournisseurController::show' => ['privates', '.service_locator.vPYio_4', 'get_ServiceLocator_VPYio4Service', false],
            'App\\Controller\\ProduitController::delete' => ['privates', '.service_locator.HtzxqlQ', 'get_ServiceLocator_HtzxqlQService', false],
            'App\\Controller\\ProduitController::modifierproduit' => ['privates', '.service_locator.HtzxqlQ', 'get_ServiceLocator_HtzxqlQService', false],
            'App\\EventsSubscriber\\User\\UserRegister::sendEmailRegister' => ['privates', '.service_locator.ghXgB6C', 'get_ServiceLocator_GhXgB6CService', false],
            'App\\Controller\\CategorieController:archiverCategory' => ['privates', '.service_locator.iw__25Y', 'get_ServiceLocator_Iw25YService', false],
            'App\\Controller\\ClientController:delete' => ['privates', '.service_locator.aFKi2IA', 'get_ServiceLocator_AFKi2IAService', false],
            'App\\Controller\\ClientController:edit' => ['privates', '.service_locator.aFKi2IA', 'get_ServiceLocator_AFKi2IAService', false],
            'App\\Controller\\ClientController:index' => ['privates', '.service_locator.c._mSk7', 'get_ServiceLocator_C_MSk7Service', false],
            'App\\Controller\\ClientController:show' => ['privates', '.service_locator.aFKi2IA', 'get_ServiceLocator_AFKi2IAService', false],
            'App\\Controller\\FournisseurController:delete' => ['privates', '.service_locator.vPYio_4', 'get_ServiceLocator_VPYio4Service', false],
            'App\\Controller\\FournisseurController:edit' => ['privates', '.service_locator.vPYio_4', 'get_ServiceLocator_VPYio4Service', false],
            'App\\Controller\\FournisseurController:index' => ['privates', '.service_locator.tUk.n1x', 'get_ServiceLocator_TUk_N1xService', false],
            'App\\Controller\\FournisseurController:new' => ['privates', '.service_locator.oAXSp4m', 'get_ServiceLocator_OAXSp4mService', false],
            'App\\Controller\\FournisseurController:show' => ['privates', '.service_locator.vPYio_4', 'get_ServiceLocator_VPYio4Service', false],
            'App\\Controller\\ProduitController:delete' => ['privates', '.service_locator.HtzxqlQ', 'get_ServiceLocator_HtzxqlQService', false],
            'App\\Controller\\ProduitController:modifierproduit' => ['privates', '.service_locator.HtzxqlQ', 'get_ServiceLocator_HtzxqlQService', false],
            'App\\EventsSubscriber\\User\\UserRegister:sendEmailRegister' => ['privates', '.service_locator.ghXgB6C', 'get_ServiceLocator_GhXgB6CService', false],
        ], [
            'App\\Controller\\CategorieController::archiverCategory' => '?',
            'App\\Controller\\ClientController::delete' => '?',
            'App\\Controller\\ClientController::edit' => '?',
            'App\\Controller\\ClientController::index' => '?',
            'App\\Controller\\ClientController::show' => '?',
            'App\\Controller\\FournisseurController::delete' => '?',
            'App\\Controller\\FournisseurController::edit' => '?',
            'App\\Controller\\FournisseurController::index' => '?',
            'App\\Controller\\FournisseurController::new' => '?',
            'App\\Controller\\FournisseurController::show' => '?',
            'App\\Controller\\ProduitController::delete' => '?',
            'App\\Controller\\ProduitController::modifierproduit' => '?',
            'App\\EventsSubscriber\\User\\UserRegister::sendEmailRegister' => '?',
            'App\\Controller\\CategorieController:archiverCategory' => '?',
            'App\\Controller\\ClientController:delete' => '?',
            'App\\Controller\\ClientController:edit' => '?',
            'App\\Controller\\ClientController:index' => '?',
            'App\\Controller\\ClientController:show' => '?',
            'App\\Controller\\FournisseurController:delete' => '?',
            'App\\Controller\\FournisseurController:edit' => '?',
            'App\\Controller\\FournisseurController:index' => '?',
            'App\\Controller\\FournisseurController:new' => '?',
            'App\\Controller\\FournisseurController:show' => '?',
            'App\\Controller\\ProduitController:delete' => '?',
            'App\\Controller\\ProduitController:modifierproduit' => '?',
            'App\\EventsSubscriber\\User\\UserRegister:sendEmailRegister' => '?',
        ]));
    }

    /*
     * Gets the private 'assets.packages' shared service.
     *
     * @return \Symfony\Component\Asset\Packages
     */
    protected function getAssets_PackagesService()
    {
        return $this->privates['assets.packages'] = new \Symfony\Component\Asset\Packages(new \Symfony\Component\Asset\PathPackage('', new \Symfony\Component\Asset\VersionStrategy\JsonManifestVersionStrategy((\dirname(__DIR__, 4).'/public/build/manifest.json')), new \Symfony\Component\Asset\Context\RequestStackContext(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), '', false)), []);
    }

    /*
     * Gets the private 'cache.annotations' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getCache_AnnotationsService()
    {
        return $this->privates['cache.annotations'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('jjna173uJz', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'cache.property_access' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getCache_PropertyAccessService()
    {
        return $this->privates['cache.property_access'] = \Symfony\Component\PropertyAccess\PropertyAccessor::createCache('h1qSWgudpG', 0, $this->getParameter('container.build_id'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'cache.property_info' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getCache_PropertyInfoService()
    {
        return $this->privates['cache.property_info'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('Z+F7k38n2d', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'cache.security_expression_language' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getCache_SecurityExpressionLanguageService()
    {
        return $this->privates['cache.security_expression_language'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('MwbGz-SXAA', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'cache.serializer' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getCache_SerializerService()
    {
        return $this->privates['cache.serializer'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('uH9LFzWZA0', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'cache.validator' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getCache_ValidatorService()
    {
        return $this->privates['cache.validator'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('sXVrnxXHy+', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'cache.webpack_encore' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getCache_WebpackEncoreService()
    {
        return $this->privates['cache.webpack_encore'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('K6Rjw4L2XL', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'console.command.about' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\AboutCommand
     */
    protected function getConsole_Command_AboutService()
    {
        $this->privates['console.command.about'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\AboutCommand();

        $instance->setName('about');

        return $instance;
    }

    /*
     * Gets the private 'console.command.assets_install' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\AssetsInstallCommand
     */
    protected function getConsole_Command_AssetsInstallService()
    {
        $this->privates['console.command.assets_install'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\AssetsInstallCommand(($this->services['filesystem'] ?? ($this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem())), \dirname(__DIR__, 4));

        $instance->setName('assets:install');

        return $instance;
    }

    /*
     * Gets the private 'console.command.cache_clear' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\CacheClearCommand
     */
    protected function getConsole_Command_CacheClearService()
    {
        $this->privates['console.command.cache_clear'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CacheClearCommand(($this->services['cache_clearer'] ?? $this->getCacheClearerService()), ($this->services['filesystem'] ?? ($this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem())));

        $instance->setName('cache:clear');

        return $instance;
    }

    /*
     * Gets the private 'console.command.cache_pool_clear' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\CachePoolClearCommand
     */
    protected function getConsole_Command_CachePoolClearService()
    {
        $this->privates['console.command.cache_pool_clear'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CachePoolClearCommand(($this->services['cache.global_clearer'] ?? $this->getCache_GlobalClearerService()));

        $instance->setName('cache:pool:clear');

        return $instance;
    }

    /*
     * Gets the private 'console.command.cache_pool_delete' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\CachePoolDeleteCommand
     */
    protected function getConsole_Command_CachePoolDeleteService()
    {
        $this->privates['console.command.cache_pool_delete'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CachePoolDeleteCommand(($this->services['cache.global_clearer'] ?? $this->getCache_GlobalClearerService()));

        $instance->setName('cache:pool:delete');

        return $instance;
    }

    /*
     * Gets the private 'console.command.cache_pool_list' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\CachePoolListCommand
     */
    protected function getConsole_Command_CachePoolListService()
    {
        $this->privates['console.command.cache_pool_list'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CachePoolListCommand([0 => 'cache.app', 1 => 'cache.system', 2 => 'cache.validator', 3 => 'cache.serializer', 4 => 'cache.annotations', 5 => 'cache.property_info', 6 => 'doctrine.result_cache_pool', 7 => 'doctrine.system_cache_pool', 8 => 'cache.property_access', 9 => 'cache.security_expression_language', 10 => 'cache.webpack_encore', 11 => 'api_platform.cache.route_name_resolver', 12 => 'api_platform.cache.identifiers_extractor', 13 => 'api_platform.cache.subresource_operation_factory', 14 => 'api_platform.cache.metadata.resource', 15 => 'api_platform.cache.metadata.property']);

        $instance->setName('cache:pool:list');

        return $instance;
    }

    /*
     * Gets the private 'console.command.cache_pool_prune' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\CachePoolPruneCommand
     */
    protected function getConsole_Command_CachePoolPruneService()
    {
        $this->privates['console.command.cache_pool_prune'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CachePoolPruneCommand(new RewindableGenerator(function () {
            yield 'cache.app' => ($this->services['cache.app'] ?? $this->getCache_AppService());
            yield 'doctrine.result_cache_pool' => ($this->privates['doctrine.result_cache_pool'] ?? $this->getDoctrine_ResultCachePoolService());
        }, 2));

        $instance->setName('cache:pool:prune');

        return $instance;
    }

    /*
     * Gets the private 'console.command.cache_warmup' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\CacheWarmupCommand
     */
    protected function getConsole_Command_CacheWarmupService()
    {
        $this->privates['console.command.cache_warmup'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CacheWarmupCommand(($this->services['cache_warmer'] ?? $this->getCacheWarmerService()));

        $instance->setName('cache:warmup');

        return $instance;
    }

    /*
     * Gets the private 'console.command.config_debug' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\ConfigDebugCommand
     */
    protected function getConsole_Command_ConfigDebugService()
    {
        $this->privates['console.command.config_debug'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\ConfigDebugCommand();

        $instance->setName('debug:config');

        return $instance;
    }

    /*
     * Gets the private 'console.command.config_dump_reference' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\ConfigDumpReferenceCommand
     */
    protected function getConsole_Command_ConfigDumpReferenceService()
    {
        $this->privates['console.command.config_dump_reference'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\ConfigDumpReferenceCommand();

        $instance->setName('config:dump-reference');

        return $instance;
    }

    /*
     * Gets the private 'console.command.container_debug' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\ContainerDebugCommand
     */
    protected function getConsole_Command_ContainerDebugService()
    {
        $this->privates['console.command.container_debug'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\ContainerDebugCommand();

        $instance->setName('debug:container');

        return $instance;
    }

    /*
     * Gets the private 'console.command.container_lint' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\ContainerLintCommand
     */
    protected function getConsole_Command_ContainerLintService()
    {
        $this->privates['console.command.container_lint'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\ContainerLintCommand();

        $instance->setName('lint:container');

        return $instance;
    }

    /*
     * Gets the private 'console.command.debug_autowiring' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\DebugAutowiringCommand
     */
    protected function getConsole_Command_DebugAutowiringService()
    {
        $this->privates['console.command.debug_autowiring'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\DebugAutowiringCommand(NULL, ($this->privates['debug.file_link_formatter'] ?? ($this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL))));

        $instance->setName('debug:autowiring');

        return $instance;
    }

    /*
     * Gets the private 'console.command.event_dispatcher_debug' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\EventDispatcherDebugCommand
     */
    protected function getConsole_Command_EventDispatcherDebugService()
    {
        $this->privates['console.command.event_dispatcher_debug'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\EventDispatcherDebugCommand(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));

        $instance->setName('debug:event-dispatcher');

        return $instance;
    }

    /*
     * Gets the private 'console.command.form_debug' shared service.
     *
     * @return \Symfony\Component\Form\Command\DebugCommand
     */
    protected function getConsole_Command_FormDebugService()
    {
        $this->privates['console.command.form_debug'] = $instance = new \Symfony\Component\Form\Command\DebugCommand(($this->privates['form.registry'] ?? $this->getForm_RegistryService()), [0 => 'Symfony\\Component\\Form\\Extension\\Core\\Type', 1 => 'App\\Form', 2 => 'Symfony\\Bridge\\Doctrine\\Form\\Type'], [0 => 'App\\Form\\ClientType', 1 => 'App\\Form\\FournisseurType', 2 => 'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType', 3 => 'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType', 4 => 'Symfony\\Component\\Form\\Extension\\Core\\Type\\FileType', 5 => 'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType'], [0 => 'Symfony\\Component\\Form\\Extension\\Core\\Type\\TransformationFailureExtension', 1 => 'Symfony\\Component\\Form\\Extension\\HttpFoundation\\Type\\FormTypeHttpFoundationExtension', 2 => 'Symfony\\Component\\Form\\Extension\\Validator\\Type\\FormTypeValidatorExtension', 3 => 'Symfony\\Component\\Form\\Extension\\Validator\\Type\\RepeatedTypeValidatorExtension', 4 => 'Symfony\\Component\\Form\\Extension\\Validator\\Type\\SubmitTypeValidatorExtension', 5 => 'Symfony\\Component\\Form\\Extension\\Validator\\Type\\UploadValidatorExtension', 6 => 'Symfony\\Component\\Form\\Extension\\Csrf\\Type\\FormTypeCsrfExtension'], [0 => 'Symfony\\Component\\Form\\Extension\\Validator\\ValidatorTypeGuesser', 1 => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser'], ($this->privates['debug.file_link_formatter'] ?? ($this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL))));

        $instance->setName('debug:form');

        return $instance;
    }

    /*
     * Gets the private 'console.command.router_debug' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\RouterDebugCommand
     */
    protected function getConsole_Command_RouterDebugService()
    {
        $this->privates['console.command.router_debug'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\RouterDebugCommand(($this->services['router'] ?? $this->getRouterService()), ($this->privates['debug.file_link_formatter'] ?? ($this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL))));

        $instance->setName('debug:router');

        return $instance;
    }

    /*
     * Gets the private 'console.command.router_match' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\RouterMatchCommand
     */
    protected function getConsole_Command_RouterMatchService()
    {
        $this->privates['console.command.router_match'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\RouterMatchCommand(($this->services['router'] ?? $this->getRouterService()));

        $instance->setName('router:match');

        return $instance;
    }

    /*
     * Gets the private 'console.command.secrets_decrypt_to_local' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\SecretsDecryptToLocalCommand
     */
    protected function getConsole_Command_SecretsDecryptToLocalService()
    {
        $this->privates['console.command.secrets_decrypt_to_local'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\SecretsDecryptToLocalCommand(($this->privates['secrets.vault'] ?? ($this->privates['secrets.vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault((\dirname(__DIR__, 4).'/config/secrets/prod'), $this->getEnv('base64:default::SYMFONY_DECRYPTION_SECRET')))), ($this->privates['secrets.local_vault'] ?? ($this->privates['secrets.local_vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\DotenvVault((\dirname(__DIR__, 4).'/.env.prod.local')))));

        $instance->setName('secrets:decrypt-to-local');

        return $instance;
    }

    /*
     * Gets the private 'console.command.secrets_encrypt_from_local' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\SecretsEncryptFromLocalCommand
     */
    protected function getConsole_Command_SecretsEncryptFromLocalService()
    {
        $this->privates['console.command.secrets_encrypt_from_local'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\SecretsEncryptFromLocalCommand(($this->privates['secrets.vault'] ?? ($this->privates['secrets.vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault((\dirname(__DIR__, 4).'/config/secrets/prod'), $this->getEnv('base64:default::SYMFONY_DECRYPTION_SECRET')))), ($this->privates['secrets.local_vault'] ?? ($this->privates['secrets.local_vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\DotenvVault((\dirname(__DIR__, 4).'/.env.prod.local')))));

        $instance->setName('secrets:encrypt-from-local');

        return $instance;
    }

    /*
     * Gets the private 'console.command.secrets_generate_key' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\SecretsGenerateKeysCommand
     */
    protected function getConsole_Command_SecretsGenerateKeyService()
    {
        $this->privates['console.command.secrets_generate_key'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\SecretsGenerateKeysCommand(($this->privates['secrets.vault'] ?? ($this->privates['secrets.vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault((\dirname(__DIR__, 4).'/config/secrets/prod'), $this->getEnv('base64:default::SYMFONY_DECRYPTION_SECRET')))), ($this->privates['secrets.local_vault'] ?? ($this->privates['secrets.local_vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\DotenvVault((\dirname(__DIR__, 4).'/.env.prod.local')))));

        $instance->setName('secrets:generate-keys');

        return $instance;
    }

    /*
     * Gets the private 'console.command.secrets_list' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\SecretsListCommand
     */
    protected function getConsole_Command_SecretsListService()
    {
        $this->privates['console.command.secrets_list'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\SecretsListCommand(($this->privates['secrets.vault'] ?? ($this->privates['secrets.vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault((\dirname(__DIR__, 4).'/config/secrets/prod'), $this->getEnv('base64:default::SYMFONY_DECRYPTION_SECRET')))), ($this->privates['secrets.local_vault'] ?? ($this->privates['secrets.local_vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\DotenvVault((\dirname(__DIR__, 4).'/.env.prod.local')))));

        $instance->setName('secrets:list');

        return $instance;
    }

    /*
     * Gets the private 'console.command.secrets_remove' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\SecretsRemoveCommand
     */
    protected function getConsole_Command_SecretsRemoveService()
    {
        $this->privates['console.command.secrets_remove'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\SecretsRemoveCommand(($this->privates['secrets.vault'] ?? ($this->privates['secrets.vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault((\dirname(__DIR__, 4).'/config/secrets/prod'), $this->getEnv('base64:default::SYMFONY_DECRYPTION_SECRET')))), ($this->privates['secrets.local_vault'] ?? ($this->privates['secrets.local_vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\DotenvVault((\dirname(__DIR__, 4).'/.env.prod.local')))));

        $instance->setName('secrets:remove');

        return $instance;
    }

    /*
     * Gets the private 'console.command.secrets_set' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\SecretsSetCommand
     */
    protected function getConsole_Command_SecretsSetService()
    {
        $this->privates['console.command.secrets_set'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\SecretsSetCommand(($this->privates['secrets.vault'] ?? ($this->privates['secrets.vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault((\dirname(__DIR__, 4).'/config/secrets/prod'), $this->getEnv('base64:default::SYMFONY_DECRYPTION_SECRET')))), ($this->privates['secrets.local_vault'] ?? ($this->privates['secrets.local_vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\DotenvVault((\dirname(__DIR__, 4).'/.env.prod.local')))));

        $instance->setName('secrets:set');

        return $instance;
    }

    /*
     * Gets the private 'console.command.translation_debug' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\TranslationDebugCommand
     */
    protected function getConsole_Command_TranslationDebugService()
    {
        $this->privates['console.command.translation_debug'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\TranslationDebugCommand(($this->services['translator'] ?? $this->getTranslatorService()), ($this->privates['translation.reader'] ?? $this->getTranslation_ReaderService()), ($this->privates['translation.extractor'] ?? $this->getTranslation_ExtractorService()), (\dirname(__DIR__, 4).'/translations'), (\dirname(__DIR__, 4).'/templates'), [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations')], [0 => (\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Resources/views/Email'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Resources/views/Form'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/http-kernel/EventListener/LocaleAwareListener.php'), 3 => (\dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Command/TranslationDebugCommand.php'), 4 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Extension/Core/Type/FileType.php'), 5 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Extension/Core/Type/TransformationFailureExtension.php'), 6 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Extension/Validator/Type/UploadValidatorExtension.php'), 7 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Extension/Csrf/Type/FormTypeCsrfExtension.php'), 8 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/ValidatorBuilder.php'), 9 => (\dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/CacheWarmer/TranslationsCacheWarmer.php'), 10 => (\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/TranslationExtension.php')]);

        $instance->setName('debug:translation');

        return $instance;
    }

    /*
     * Gets the private 'console.command.translation_update' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\TranslationUpdateCommand
     */
    protected function getConsole_Command_TranslationUpdateService()
    {
        $a = new \Symfony\Component\Translation\Writer\TranslationWriter();
        $a->addDumper('php', new \Symfony\Component\Translation\Dumper\PhpFileDumper());
        $a->addDumper('xlf', new \Symfony\Component\Translation\Dumper\XliffFileDumper());
        $a->addDumper('po', new \Symfony\Component\Translation\Dumper\PoFileDumper());
        $a->addDumper('mo', new \Symfony\Component\Translation\Dumper\MoFileDumper());
        $a->addDumper('yml', new \Symfony\Component\Translation\Dumper\YamlFileDumper());
        $a->addDumper('yaml', new \Symfony\Component\Translation\Dumper\YamlFileDumper('yaml'));
        $a->addDumper('ts', new \Symfony\Component\Translation\Dumper\QtFileDumper());
        $a->addDumper('csv', new \Symfony\Component\Translation\Dumper\CsvFileDumper());
        $a->addDumper('ini', new \Symfony\Component\Translation\Dumper\IniFileDumper());
        $a->addDumper('json', new \Symfony\Component\Translation\Dumper\JsonFileDumper());
        $a->addDumper('res', new \Symfony\Component\Translation\Dumper\IcuResFileDumper());

        $this->privates['console.command.translation_update'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\TranslationUpdateCommand($a, ($this->privates['translation.reader'] ?? $this->getTranslation_ReaderService()), ($this->privates['translation.extractor'] ?? $this->getTranslation_ExtractorService()), 'en', (\dirname(__DIR__, 4).'/translations'), (\dirname(__DIR__, 4).'/templates'), [0 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/Resources/translations'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/translations'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/security-core/Resources/translations')], [0 => (\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Resources/views/Email'), 1 => (\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Resources/views/Form'), 2 => (\dirname(__DIR__, 4).'/vendor/symfony/http-kernel/EventListener/LocaleAwareListener.php'), 3 => (\dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Command/TranslationDebugCommand.php'), 4 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Extension/Core/Type/FileType.php'), 5 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Extension/Core/Type/TransformationFailureExtension.php'), 6 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Extension/Validator/Type/UploadValidatorExtension.php'), 7 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Extension/Csrf/Type/FormTypeCsrfExtension.php'), 8 => (\dirname(__DIR__, 4).'/vendor/symfony/validator/ValidatorBuilder.php'), 9 => (\dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/CacheWarmer/TranslationsCacheWarmer.php'), 10 => (\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Extension/TranslationExtension.php')]);

        $instance->setName('translation:update');

        return $instance;
    }

    /*
     * Gets the private 'console.command.xliff_lint' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\XliffLintCommand
     */
    protected function getConsole_Command_XliffLintService()
    {
        $this->privates['console.command.xliff_lint'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\XliffLintCommand();

        $instance->setName('lint:xliff');

        return $instance;
    }

    /*
     * Gets the private 'console.command.yaml_lint' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\YamlLintCommand
     */
    protected function getConsole_Command_YamlLintService()
    {
        $this->privates['console.command.yaml_lint'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\YamlLintCommand();

        $instance->setName('lint:yaml');

        return $instance;
    }

    /*
     * Gets the private 'console.error_listener' shared service.
     *
     * @return \Symfony\Component\Console\EventListener\ErrorListener
     */
    protected function getConsole_ErrorListenerService()
    {
        $a = new \Symfony\Bridge\Monolog\Logger('console');
        $a->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $this->privates['console.error_listener'] = new \Symfony\Component\Console\EventListener\ErrorListener($a);
    }

    /*
     * Gets the private 'container.env_var_processor' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\EnvVarProcessor
     */
    protected function getContainer_EnvVarProcessorService()
    {
        return $this->privates['container.env_var_processor'] = new \Symfony\Component\DependencyInjection\EnvVarProcessor($this, new RewindableGenerator(function () {
            yield 0 => ($this->privates['secrets.vault'] ?? ($this->privates['secrets.vault'] = new \Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault((\dirname(__DIR__, 4).'/config/secrets/prod'), $this->getEnv('base64:default::SYMFONY_DECRYPTION_SECRET'))));
        }, 1));
    }

    /*
     * Gets the private 'debug.debug_handlers_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener
     */
    protected function getDebug_DebugHandlersListenerService()
    {
        $a = new \Symfony\Bridge\Monolog\Logger('php');
        $a->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $this->privates['debug.debug_handlers_listener'] = new \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener(NULL, $a, NULL, 0, false, ($this->privates['debug.file_link_formatter'] ?? ($this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL))), false);
    }

    /*
     * Gets the private 'doctrine.cache_clear_metadata_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearMetadataCacheDoctrineCommand
     */
    protected function getDoctrine_CacheClearMetadataCommandService()
    {
        $this->privates['doctrine.cache_clear_metadata_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearMetadataCacheDoctrineCommand();

        $instance->setName('doctrine:cache:clear-metadata');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.cache_clear_query_cache_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearQueryCacheDoctrineCommand
     */
    protected function getDoctrine_CacheClearQueryCacheCommandService()
    {
        $this->privates['doctrine.cache_clear_query_cache_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearQueryCacheDoctrineCommand();

        $instance->setName('doctrine:cache:clear-query');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.cache_clear_result_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearResultCacheDoctrineCommand
     */
    protected function getDoctrine_CacheClearResultCommandService()
    {
        $this->privates['doctrine.cache_clear_result_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ClearResultCacheDoctrineCommand();

        $instance->setName('doctrine:cache:clear-result');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.cache_collection_region_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\CollectionRegionDoctrineCommand
     */
    protected function getDoctrine_CacheCollectionRegionCommandService()
    {
        $this->privates['doctrine.cache_collection_region_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\CollectionRegionDoctrineCommand();

        $instance->setName('doctrine:cache:clear-collection-region');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.clear_entity_region_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\EntityRegionCacheDoctrineCommand
     */
    protected function getDoctrine_ClearEntityRegionCommandService()
    {
        $this->privates['doctrine.clear_entity_region_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\EntityRegionCacheDoctrineCommand();

        $instance->setName('doctrine:cache:clear-entity-region');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.clear_query_region_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\QueryRegionCacheDoctrineCommand
     */
    protected function getDoctrine_ClearQueryRegionCommandService()
    {
        $this->privates['doctrine.clear_query_region_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\QueryRegionCacheDoctrineCommand();

        $instance->setName('doctrine:cache:clear-query-region');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.database_create_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\CreateDatabaseDoctrineCommand
     */
    protected function getDoctrine_DatabaseCreateCommandService()
    {
        $this->privates['doctrine.database_create_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\CreateDatabaseDoctrineCommand(($this->services['doctrine'] ?? $this->getDoctrineService()));

        $instance->setName('doctrine:database:create');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.database_drop_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\DropDatabaseDoctrineCommand
     */
    protected function getDoctrine_DatabaseDropCommandService()
    {
        $this->privates['doctrine.database_drop_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\DropDatabaseDoctrineCommand(($this->services['doctrine'] ?? $this->getDoctrineService()));

        $instance->setName('doctrine:database:drop');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.database_import_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ImportDoctrineCommand
     */
    protected function getDoctrine_DatabaseImportCommandService()
    {
        $this->privates['doctrine.database_import_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ImportDoctrineCommand();

        $instance->setName('doctrine:database:import');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.ensure_production_settings_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\EnsureProductionSettingsDoctrineCommand
     */
    protected function getDoctrine_EnsureProductionSettingsCommandService()
    {
        $this->privates['doctrine.ensure_production_settings_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\EnsureProductionSettingsDoctrineCommand();

        $instance->setName('doctrine:ensure-production-settings');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.mapping_convert_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ConvertMappingDoctrineCommand
     */
    protected function getDoctrine_MappingConvertCommandService()
    {
        $this->privates['doctrine.mapping_convert_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ConvertMappingDoctrineCommand();

        $instance->setName('doctrine:mapping:convert');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.mapping_import_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\ImportMappingDoctrineCommand
     */
    protected function getDoctrine_MappingImportCommandService()
    {
        $this->privates['doctrine.mapping_import_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\ImportMappingDoctrineCommand(($this->services['doctrine'] ?? $this->getDoctrineService()), $this->parameters['kernel.bundles']);

        $instance->setName('doctrine:mapping:import');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.mapping_info_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\InfoDoctrineCommand
     */
    protected function getDoctrine_MappingInfoCommandService()
    {
        $this->privates['doctrine.mapping_info_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\InfoDoctrineCommand();

        $instance->setName('doctrine:mapping:info');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.orm.default_entity_manager.property_info_extractor' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\PropertyInfo\DoctrineExtractor
     */
    protected function getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService()
    {
        return $this->privates['doctrine.orm.default_entity_manager.property_info_extractor'] = new \Symfony\Bridge\Doctrine\PropertyInfo\DoctrineExtractor(($this->services['doctrine.orm.default_entity_manager'] ?? $this->getDoctrine_Orm_DefaultEntityManagerService()));
    }

    /*
     * Gets the private 'doctrine.orm.default_listeners.attach_entity_listeners' shared service.
     *
     * @return \Doctrine\ORM\Tools\AttachEntityListenersListener
     */
    protected function getDoctrine_Orm_DefaultListeners_AttachEntityListenersService()
    {
        return $this->privates['doctrine.orm.default_listeners.attach_entity_listeners'] = new \Doctrine\ORM\Tools\AttachEntityListenersListener();
    }

    /*
     * Gets the private 'doctrine.orm.proxy_cache_warmer' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\CacheWarmer\ProxyCacheWarmer
     */
    protected function getDoctrine_Orm_ProxyCacheWarmerService()
    {
        return $this->privates['doctrine.orm.proxy_cache_warmer'] = new \Symfony\Bridge\Doctrine\CacheWarmer\ProxyCacheWarmer(($this->services['doctrine'] ?? $this->getDoctrineService()));
    }

    /*
     * Gets the private 'doctrine.orm.validator.unique' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator
     */
    protected function getDoctrine_Orm_Validator_UniqueService()
    {
        return $this->privates['doctrine.orm.validator.unique'] = new \Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator(($this->services['doctrine'] ?? $this->getDoctrineService()));
    }

    /*
     * Gets the private 'doctrine.query_dql_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\RunDqlDoctrineCommand
     */
    protected function getDoctrine_QueryDqlCommandService()
    {
        $this->privates['doctrine.query_dql_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\RunDqlDoctrineCommand();

        $instance->setName('doctrine:query:dql');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.query_sql_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\RunSqlDoctrineCommand
     */
    protected function getDoctrine_QuerySqlCommandService()
    {
        $this->privates['doctrine.query_sql_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\RunSqlDoctrineCommand();

        $instance->setName('doctrine:query:sql');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.result_cache_pool' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\FilesystemAdapter
     */
    protected function getDoctrine_ResultCachePoolService()
    {
        $this->privates['doctrine.result_cache_pool'] = $instance = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('nlxzJdyqtb', 0, ($this->targetDir.''.'/pools'), ($this->privates['cache.default_marshaller'] ?? ($this->privates['cache.default_marshaller'] = new \Symfony\Component\Cache\Marshaller\DefaultMarshaller(NULL))));

        $instance->setLogger(($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));

        return $instance;
    }

    /*
     * Gets the private 'doctrine.schema_create_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\CreateSchemaDoctrineCommand
     */
    protected function getDoctrine_SchemaCreateCommandService()
    {
        $this->privates['doctrine.schema_create_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\CreateSchemaDoctrineCommand();

        $instance->setName('doctrine:schema:create');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.schema_drop_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\DropSchemaDoctrineCommand
     */
    protected function getDoctrine_SchemaDropCommandService()
    {
        $this->privates['doctrine.schema_drop_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\DropSchemaDoctrineCommand();

        $instance->setName('doctrine:schema:drop');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.schema_update_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\UpdateSchemaDoctrineCommand
     */
    protected function getDoctrine_SchemaUpdateCommandService()
    {
        $this->privates['doctrine.schema_update_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\UpdateSchemaDoctrineCommand();

        $instance->setName('doctrine:schema:update');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.schema_validate_command' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ValidateSchemaCommand
     */
    protected function getDoctrine_SchemaValidateCommandService()
    {
        $this->privates['doctrine.schema_validate_command'] = $instance = new \Doctrine\Bundle\DoctrineBundle\Command\Proxy\ValidateSchemaCommand();

        $instance->setName('doctrine:schema:validate');

        return $instance;
    }

    /*
     * Gets the private 'doctrine.system_cache_pool' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    protected function getDoctrine_SystemCachePoolService()
    {
        return $this->privates['doctrine.system_cache_pool'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('p0YcyFPuTr', 0, $this->getParameter('container.build_id'), ($this->targetDir.''.'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));
    }

    /*
     * Gets the private 'doctrine_migrations.diff_command' shared service.
     *
     * @return \Doctrine\Bundle\MigrationsBundle\Command\MigrationsDiffDoctrineCommand
     */
    protected function getDoctrineMigrations_DiffCommandService()
    {
        $this->privates['doctrine_migrations.diff_command'] = $instance = new \Doctrine\Bundle\MigrationsBundle\Command\MigrationsDiffDoctrineCommand();

        $instance->setName('doctrine:migrations:diff');

        return $instance;
    }

    /*
     * Gets the private 'doctrine_migrations.dump_schema_command' shared service.
     *
     * @return \Doctrine\Bundle\MigrationsBundle\Command\MigrationsDumpSchemaDoctrineCommand
     */
    protected function getDoctrineMigrations_DumpSchemaCommandService()
    {
        $this->privates['doctrine_migrations.dump_schema_command'] = $instance = new \Doctrine\Bundle\MigrationsBundle\Command\MigrationsDumpSchemaDoctrineCommand();

        $instance->setName('doctrine:migrations:dump-schema');

        return $instance;
    }

    /*
     * Gets the private 'doctrine_migrations.execute_command' shared service.
     *
     * @return \Doctrine\Bundle\MigrationsBundle\Command\MigrationsExecuteDoctrineCommand
     */
    protected function getDoctrineMigrations_ExecuteCommandService()
    {
        $this->privates['doctrine_migrations.execute_command'] = $instance = new \Doctrine\Bundle\MigrationsBundle\Command\MigrationsExecuteDoctrineCommand();

        $instance->setName('doctrine:migrations:execute');

        return $instance;
    }

    /*
     * Gets the private 'doctrine_migrations.generate_command' shared service.
     *
     * @return \Doctrine\Bundle\MigrationsBundle\Command\MigrationsGenerateDoctrineCommand
     */
    protected function getDoctrineMigrations_GenerateCommandService()
    {
        $this->privates['doctrine_migrations.generate_command'] = $instance = new \Doctrine\Bundle\MigrationsBundle\Command\MigrationsGenerateDoctrineCommand();

        $instance->setName('doctrine:migrations:generate');

        return $instance;
    }

    /*
     * Gets the private 'doctrine_migrations.latest_command' shared service.
     *
     * @return \Doctrine\Bundle\MigrationsBundle\Command\MigrationsLatestDoctrineCommand
     */
    protected function getDoctrineMigrations_LatestCommandService()
    {
        $this->privates['doctrine_migrations.latest_command'] = $instance = new \Doctrine\Bundle\MigrationsBundle\Command\MigrationsLatestDoctrineCommand();

        $instance->setName('doctrine:migrations:latest');

        return $instance;
    }

    /*
     * Gets the private 'doctrine_migrations.migrate_command' shared service.
     *
     * @return \Doctrine\Bundle\MigrationsBundle\Command\MigrationsMigrateDoctrineCommand
     */
    protected function getDoctrineMigrations_MigrateCommandService()
    {
        $this->privates['doctrine_migrations.migrate_command'] = $instance = new \Doctrine\Bundle\MigrationsBundle\Command\MigrationsMigrateDoctrineCommand();

        $instance->setName('doctrine:migrations:migrate');

        return $instance;
    }

    /*
     * Gets the private 'doctrine_migrations.rollup_command' shared service.
     *
     * @return \Doctrine\Bundle\MigrationsBundle\Command\MigrationsRollupDoctrineCommand
     */
    protected function getDoctrineMigrations_RollupCommandService()
    {
        $this->privates['doctrine_migrations.rollup_command'] = $instance = new \Doctrine\Bundle\MigrationsBundle\Command\MigrationsRollupDoctrineCommand();

        $instance->setName('doctrine:migrations:rollup');

        return $instance;
    }

    /*
     * Gets the private 'doctrine_migrations.status_command' shared service.
     *
     * @return \Doctrine\Bundle\MigrationsBundle\Command\MigrationsStatusDoctrineCommand
     */
    protected function getDoctrineMigrations_StatusCommandService()
    {
        $this->privates['doctrine_migrations.status_command'] = $instance = new \Doctrine\Bundle\MigrationsBundle\Command\MigrationsStatusDoctrineCommand();

        $instance->setName('doctrine:migrations:status');

        return $instance;
    }

    /*
     * Gets the private 'doctrine_migrations.up_to_date_command' shared service.
     *
     * @return \Doctrine\Bundle\MigrationsBundle\Command\MigrationsUpToDateDoctrineCommand
     */
    protected function getDoctrineMigrations_UpToDateCommandService()
    {
        $this->privates['doctrine_migrations.up_to_date_command'] = $instance = new \Doctrine\Bundle\MigrationsBundle\Command\MigrationsUpToDateDoctrineCommand();

        $instance->setName('doctrine:migrations:up-to-date');

        return $instance;
    }

    /*
     * Gets the private 'doctrine_migrations.version_command' shared service.
     *
     * @return \Doctrine\Bundle\MigrationsBundle\Command\MigrationsVersionDoctrineCommand
     */
    protected function getDoctrineMigrations_VersionCommandService()
    {
        $this->privates['doctrine_migrations.version_command'] = $instance = new \Doctrine\Bundle\MigrationsBundle\Command\MigrationsVersionDoctrineCommand();

        $instance->setName('doctrine:migrations:version');

        return $instance;
    }

    /*
     * Gets the private 'exception_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ErrorListener
     */
    protected function getExceptionListenerService()
    {
        return $this->privates['exception_listener'] = new \Symfony\Component\HttpKernel\EventListener\ErrorListener('error_controller', ($this->privates['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService()), false);
    }

    /*
     * Gets the private 'form.choice_list_factory.cached' shared service.
     *
     * @return \Symfony\Component\Form\ChoiceList\Factory\CachingFactoryDecorator
     */
    protected function getForm_ChoiceListFactory_CachedService()
    {
        return $this->privates['form.choice_list_factory.cached'] = new \Symfony\Component\Form\ChoiceList\Factory\CachingFactoryDecorator(new \Symfony\Component\Form\ChoiceList\Factory\PropertyAccessDecorator(new \Symfony\Component\Form\ChoiceList\Factory\DefaultChoiceListFactory(), ($this->privates['property_accessor'] ?? $this->getPropertyAccessorService())));
    }

    /*
     * Gets the private 'form.registry' shared service.
     *
     * @return \Symfony\Component\Form\FormRegistry
     */
    protected function getForm_RegistryService()
    {
        return $this->privates['form.registry'] = new \Symfony\Component\Form\FormRegistry([0 => new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'App\\Form\\ClientType' => ['privates', 'App\\Form\\ClientType', 'getClientTypeService', false],
            'App\\Form\\FournisseurType' => ['privates', 'App\\Form\\FournisseurType', 'getFournisseurTypeService', false],
            'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType' => ['privates', 'form.type.entity', 'getForm_Type_EntityService', false],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType' => ['privates', 'form.type.choice', 'getForm_Type_ChoiceService', false],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FileType' => ['services', 'form.type.file', 'getForm_Type_FileService', false],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => ['privates', 'form.type.form', 'getForm_Type_FormService', false],
        ], [
            'App\\Form\\ClientType' => '?',
            'App\\Form\\FournisseurType' => '?',
            'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FileType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => '?',
        ]), ['Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => new RewindableGenerator(function () {
            yield 0 => ($this->privates['form.type_extension.form.transformation_failure_handling'] ?? $this->getForm_TypeExtension_Form_TransformationFailureHandlingService());
            yield 1 => ($this->privates['form.type_extension.form.http_foundation'] ?? $this->getForm_TypeExtension_Form_HttpFoundationService());
            yield 2 => ($this->privates['form.type_extension.form.validator'] ?? $this->getForm_TypeExtension_Form_ValidatorService());
            yield 3 => ($this->privates['form.type_extension.upload.validator'] ?? $this->getForm_TypeExtension_Upload_ValidatorService());
            yield 4 => ($this->privates['form.type_extension.csrf'] ?? $this->getForm_TypeExtension_CsrfService());
        }, 5), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\RepeatedType' => new RewindableGenerator(function () {
            yield 0 => ($this->privates['form.type_extension.repeated.validator'] ?? ($this->privates['form.type_extension.repeated.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension()));
        }, 1), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\SubmitType' => new RewindableGenerator(function () {
            yield 0 => ($this->privates['form.type_extension.submit.validator'] ?? ($this->privates['form.type_extension.submit.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension()));
        }, 1)], new RewindableGenerator(function () {
            yield 0 => ($this->privates['form.type_guesser.validator'] ?? $this->getForm_TypeGuesser_ValidatorService());
            yield 1 => ($this->privates['form.type_guesser.doctrine'] ?? $this->getForm_TypeGuesser_DoctrineService());
        }, 2))], new \Symfony\Component\Form\ResolvedFormTypeFactory());
    }

    /*
     * Gets the private 'form.server_params' shared service.
     *
     * @return \Symfony\Component\Form\Util\ServerParams
     */
    protected function getForm_ServerParamsService()
    {
        return $this->privates['form.server_params'] = new \Symfony\Component\Form\Util\ServerParams(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /*
     * Gets the private 'form.type.choice' shared service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\ChoiceType
     */
    protected function getForm_Type_ChoiceService()
    {
        return $this->privates['form.type.choice'] = new \Symfony\Component\Form\Extension\Core\Type\ChoiceType(($this->privates['form.choice_list_factory.cached'] ?? $this->getForm_ChoiceListFactory_CachedService()));
    }

    /*
     * Gets the private 'form.type.entity' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\Form\Type\EntityType
     */
    protected function getForm_Type_EntityService()
    {
        return $this->privates['form.type.entity'] = new \Symfony\Bridge\Doctrine\Form\Type\EntityType(($this->services['doctrine'] ?? $this->getDoctrineService()));
    }

    /*
     * Gets the private 'form.type.form' shared service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\FormType
     */
    protected function getForm_Type_FormService()
    {
        return $this->privates['form.type.form'] = new \Symfony\Component\Form\Extension\Core\Type\FormType(($this->privates['property_accessor'] ?? $this->getPropertyAccessorService()));
    }

    /*
     * Gets the private 'form.type_extension.csrf' shared service.
     *
     * @return \Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension
     */
    protected function getForm_TypeExtension_CsrfService()
    {
        return $this->privates['form.type_extension.csrf'] = new \Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension(($this->services['security.csrf.token_manager'] ?? $this->getSecurity_Csrf_TokenManagerService()), true, '_token', ($this->services['translator'] ?? $this->getTranslatorService()), 'validators', ($this->privates['form.server_params'] ?? $this->getForm_ServerParamsService()));
    }

    /*
     * Gets the private 'form.type_extension.form.http_foundation' shared service.
     *
     * @return \Symfony\Component\Form\Extension\HttpFoundation\Type\FormTypeHttpFoundationExtension
     */
    protected function getForm_TypeExtension_Form_HttpFoundationService()
    {
        return $this->privates['form.type_extension.form.http_foundation'] = new \Symfony\Component\Form\Extension\HttpFoundation\Type\FormTypeHttpFoundationExtension(new \Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationRequestHandler(($this->privates['form.server_params'] ?? $this->getForm_ServerParamsService())));
    }

    /*
     * Gets the private 'form.type_extension.form.transformation_failure_handling' shared service.
     *
     * @return \Symfony\Component\Form\Extension\Core\Type\TransformationFailureExtension
     */
    protected function getForm_TypeExtension_Form_TransformationFailureHandlingService()
    {
        return $this->privates['form.type_extension.form.transformation_failure_handling'] = new \Symfony\Component\Form\Extension\Core\Type\TransformationFailureExtension(($this->services['translator'] ?? $this->getTranslatorService()));
    }

    /*
     * Gets the private 'form.type_extension.form.validator' shared service.
     *
     * @return \Symfony\Component\Form\Extension\Validator\Type\FormTypeValidatorExtension
     */
    protected function getForm_TypeExtension_Form_ValidatorService()
    {
        return $this->privates['form.type_extension.form.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\FormTypeValidatorExtension(($this->services['validator'] ?? $this->getValidatorService()));
    }

    /*
     * Gets the private 'form.type_extension.upload.validator' shared service.
     *
     * @return \Symfony\Component\Form\Extension\Validator\Type\UploadValidatorExtension
     */
    protected function getForm_TypeExtension_Upload_ValidatorService()
    {
        return $this->privates['form.type_extension.upload.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\UploadValidatorExtension(($this->services['translator'] ?? $this->getTranslatorService()), 'validators');
    }

    /*
     * Gets the private 'form.type_guesser.doctrine' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser
     */
    protected function getForm_TypeGuesser_DoctrineService()
    {
        return $this->privates['form.type_guesser.doctrine'] = new \Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser(($this->services['doctrine'] ?? $this->getDoctrineService()));
    }

    /*
     * Gets the private 'form.type_guesser.validator' shared service.
     *
     * @return \Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser
     */
    protected function getForm_TypeGuesser_ValidatorService()
    {
        return $this->privates['form.type_guesser.validator'] = new \Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser(($this->services['validator'] ?? $this->getValidatorService()));
    }

    /*
     * Gets the private 'fragment.renderer.inline' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer
     */
    protected function getFragment_Renderer_InlineService()
    {
        $this->privates['fragment.renderer.inline'] = $instance = new \Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer(($this->services['http_kernel'] ?? $this->getHttpKernelService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));

        $instance->setFragmentPath('/_fragment');

        return $instance;
    }

    /*
     * Gets the private 'framework_extra_bundle.argument_name_convertor' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ArgumentNameConverter
     */
    protected function getFrameworkExtraBundle_ArgumentNameConvertorService()
    {
        return $this->privates['framework_extra_bundle.argument_name_convertor'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ArgumentNameConverter(($this->privates['argument_metadata_factory'] ?? ($this->privates['argument_metadata_factory'] = new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory())));
    }

    /*
     * Gets the private 'framework_extra_bundle.event.is_granted' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\IsGrantedListener
     */
    protected function getFrameworkExtraBundle_Event_IsGrantedService()
    {
        return $this->privates['framework_extra_bundle.event.is_granted'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\IsGrantedListener(($this->privates['framework_extra_bundle.argument_name_convertor'] ?? $this->getFrameworkExtraBundle_ArgumentNameConvertorService()), ($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()));
    }

    /*
     * Gets the private 'gesdinet.jwtrefreshtoken.send_token' shared service.
     *
     * @return \Gesdinet\JWTRefreshTokenBundle\EventListener\AttachRefreshTokenOnSuccessListener
     */
    protected function getGesdinet_Jwtrefreshtoken_SendTokenService()
    {
        return $this->privates['gesdinet.jwtrefreshtoken.send_token'] = new \Gesdinet\JWTRefreshTokenBundle\EventListener\AttachRefreshTokenOnSuccessListener(($this->services['gesdinet.jwtrefreshtoken.refresh_token_manager'] ?? $this->getGesdinet_Jwtrefreshtoken_RefreshTokenManagerService()), 2592000, ($this->services['validator'] ?? $this->getValidatorService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), 'username', 'refresh_token', false);
    }

    /*
     * Gets the private 'lexik_jwt_authentication.handler.authentication_failure' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationFailureHandler
     */
    protected function getLexikJwtAuthentication_Handler_AuthenticationFailureService()
    {
        return $this->privates['lexik_jwt_authentication.handler.authentication_failure'] = new \Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationFailureHandler(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));
    }

    /*
     * Gets the private 'lexik_jwt_authentication.handler.authentication_success' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler
     */
    protected function getLexikJwtAuthentication_Handler_AuthenticationSuccessService()
    {
        return $this->privates['lexik_jwt_authentication.handler.authentication_success'] = new \Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler(($this->services['lexik_jwt_authentication.jwt_manager'] ?? $this->getLexikJwtAuthentication_JwtManagerService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), []);
    }

    /*
     * Gets the private 'lexik_jwt_authentication.security.guard.jwt_token_authenticator' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator
     */
    protected function getLexikJwtAuthentication_Security_Guard_JwtTokenAuthenticatorService()
    {
        return $this->privates['lexik_jwt_authentication.security.guard.jwt_token_authenticator'] = new \Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator(($this->services['lexik_jwt_authentication.jwt_manager'] ?? $this->getLexikJwtAuthentication_JwtManagerService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), new \Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\ChainTokenExtractor([0 => new \Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor('Bearer', 'Authorization')]));
    }

    /*
     * Gets the private 'locale_aware_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleAwareListener
     */
    protected function getLocaleAwareListenerService()
    {
        return $this->privates['locale_aware_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleAwareListener(new RewindableGenerator(function () {
            yield 0 => ($this->privates['slugger'] ?? ($this->privates['slugger'] = new \Symfony\Component\String\Slugger\AsciiSlugger('en')));
            yield 1 => ($this->services['translator'] ?? $this->getTranslatorService());
        }, 2), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /*
     * Gets the private 'locale_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleListener
     */
    protected function getLocaleListenerService()
    {
        return $this->privates['locale_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleListener(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), 'en', ($this->services['router'] ?? $this->getRouterService()));
    }

    /*
     * Gets the private 'mime_types' shared service.
     *
     * @return \Symfony\Component\Mime\MimeTypes
     */
    protected function getMimeTypesService()
    {
        $this->privates['mime_types'] = $instance = new \Symfony\Component\Mime\MimeTypes();

        $instance->setDefault($instance);

        return $instance;
    }

    /*
     * Gets the private 'monolog.handler.console' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Handler\ConsoleHandler
     */
    protected function getMonolog_Handler_ConsoleService()
    {
        return $this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, [], []);
    }

    /*
     * Gets the private 'monolog.handler.main' shared service.
     *
     * @return \Monolog\Handler\FingersCrossedHandler
     */
    protected function getMonolog_Handler_MainService()
    {
        $a = new \Monolog\Handler\StreamHandler('php://stderr', 100, true, NULL, false);
        $a->pushProcessor(new \Monolog\Processor\PsrLogMessageProcessor());

        return $this->privates['monolog.handler.main'] = new \Monolog\Handler\FingersCrossedHandler($a, new \Symfony\Bridge\Monolog\Handler\FingersCrossed\HttpCodeActivationStrategy(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), [0 => ['code' => 404, 'urls' => []], 1 => ['code' => 405, 'urls' => []]], 400), 50, true, true, NULL);
    }

    /*
     * Gets the private 'monolog.logger' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_LoggerService()
    {
        $this->privates['monolog.logger'] = $instance = new \Symfony\Bridge\Monolog\Logger('app');

        $instance->useMicrosecondTimestamps(true);
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the private 'monolog.logger.cache' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_CacheService()
    {
        $this->privates['monolog.logger.cache'] = $instance = new \Symfony\Bridge\Monolog\Logger('cache');

        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the private 'monolog.logger.request' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_RequestService()
    {
        $this->privates['monolog.logger.request'] = $instance = new \Symfony\Bridge\Monolog\Logger('request');

        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the private 'monolog.logger.security' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_SecurityService()
    {
        $this->privates['monolog.logger.security'] = $instance = new \Symfony\Bridge\Monolog\Logger('security');

        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        return $instance;
    }

    /*
     * Gets the private 'nelmio_cors.cors_listener' shared service.
     *
     * @return \Nelmio\CorsBundle\EventListener\CorsListener
     */
    protected function getNelmioCors_CorsListenerService()
    {
        return $this->privates['nelmio_cors.cors_listener'] = new \Nelmio\CorsBundle\EventListener\CorsListener(new \Nelmio\CorsBundle\Options\Resolver([0 => new \Nelmio\CorsBundle\Options\ConfigProvider($this->parameters['nelmio_cors.map'], $this->getParameter('nelmio_cors.defaults'))]));
    }

    /*
     * Gets the private 'parameter_bag' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag
     */
    protected function getParameterBagService()
    {
        return $this->privates['parameter_bag'] = new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($this);
    }

    /*
     * Gets the private 'property_accessor' shared service.
     *
     * @return \Symfony\Component\PropertyAccess\PropertyAccessor
     */
    protected function getPropertyAccessorService()
    {
        return $this->privates['property_accessor'] = new \Symfony\Component\PropertyAccess\PropertyAccessor(false, false, ($this->privates['cache.property_access'] ?? $this->getCache_PropertyAccessService()), true);
    }

    /*
     * Gets the private 'property_info.cache' shared service.
     *
     * @return \Symfony\Component\PropertyInfo\PropertyInfoCacheExtractor
     */
    protected function getPropertyInfo_CacheService()
    {
        return $this->privates['property_info.cache'] = new \Symfony\Component\PropertyInfo\PropertyInfoCacheExtractor(new \Symfony\Component\PropertyInfo\PropertyInfoExtractor(new RewindableGenerator(function () {
            yield 0 => ($this->privates['property_info.serializer_extractor'] ?? $this->getPropertyInfo_SerializerExtractorService());
            yield 1 => ($this->privates['property_info.reflection_extractor'] ?? ($this->privates['property_info.reflection_extractor'] = new \Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor()));
            yield 2 => ($this->privates['doctrine.orm.default_entity_manager.property_info_extractor'] ?? $this->getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService());
        }, 3), new RewindableGenerator(function () {
            yield 0 => ($this->privates['doctrine.orm.default_entity_manager.property_info_extractor'] ?? $this->getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService());
            yield 1 => ($this->privates['property_info.php_doc_extractor'] ?? ($this->privates['property_info.php_doc_extractor'] = new \Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor()));
            yield 2 => ($this->privates['property_info.reflection_extractor'] ?? ($this->privates['property_info.reflection_extractor'] = new \Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor()));
        }, 3), new RewindableGenerator(function () {
            yield 0 => ($this->privates['property_info.php_doc_extractor'] ?? ($this->privates['property_info.php_doc_extractor'] = new \Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor()));
        }, 1), new RewindableGenerator(function () {
            yield 0 => ($this->privates['doctrine.orm.default_entity_manager.property_info_extractor'] ?? $this->getDoctrine_Orm_DefaultEntityManager_PropertyInfoExtractorService());
            yield 1 => ($this->privates['property_info.reflection_extractor'] ?? ($this->privates['property_info.reflection_extractor'] = new \Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor()));
        }, 2), new RewindableGenerator(function () {
            yield 0 => ($this->privates['property_info.reflection_extractor'] ?? ($this->privates['property_info.reflection_extractor'] = new \Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor()));
        }, 1)), ($this->privates['cache.property_info'] ?? $this->getCache_PropertyInfoService()));
    }

    /*
     * Gets the private 'property_info.serializer_extractor' shared service.
     *
     * @return \Symfony\Component\PropertyInfo\Extractor\SerializerExtractor
     */
    protected function getPropertyInfo_SerializerExtractorService()
    {
        return $this->privates['property_info.serializer_extractor'] = new \Symfony\Component\PropertyInfo\Extractor\SerializerExtractor(($this->privates['serializer.mapping.cache_class_metadata_factory'] ?? $this->getSerializer_Mapping_CacheClassMetadataFactoryService()));
    }

    /*
     * Gets the private 'router.cache_warmer' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\CacheWarmer\RouterCacheWarmer
     */
    protected function getRouter_CacheWarmerService()
    {
        return $this->privates['router.cache_warmer'] = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\RouterCacheWarmer((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'router' => ['services', 'router', 'getRouterService', false],
        ], [
            'router' => '?',
        ]))->withContext('router.cache_warmer', $this));
    }

    /*
     * Gets the private 'router.request_context' shared service.
     *
     * @return \Symfony\Component\Routing\RequestContext
     */
    protected function getRouter_RequestContextService()
    {
        return $this->privates['router.request_context'] = new \Symfony\Component\Routing\RequestContext('', 'GET', 'localhost', 'http', 80, 443);
    }

    /*
     * Gets the private 'router_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\RouterListener
     */
    protected function getRouterListenerService()
    {
        return $this->privates['router_listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener(($this->services['router'] ?? $this->getRouterService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()), ($this->privates['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService()), \dirname(__DIR__, 4), false);
    }

    /*
     * Gets the private 'security.access.authenticated_voter' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter
     */
    protected function getSecurity_Access_AuthenticatedVoterService()
    {
        return $this->privates['security.access.authenticated_voter'] = new \Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter(($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver())));
    }

    /*
     * Gets the private 'security.access.decision_manager' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\AccessDecisionManager
     */
    protected function getSecurity_Access_DecisionManagerService()
    {
        return $this->privates['security.access.decision_manager'] = new \Symfony\Component\Security\Core\Authorization\AccessDecisionManager(new RewindableGenerator(function () {
            yield 0 => ($this->privates['security.access.authenticated_voter'] ?? $this->getSecurity_Access_AuthenticatedVoterService());
            yield 1 => ($this->privates['security.access.simple_role_voter'] ?? ($this->privates['security.access.simple_role_voter'] = new \Symfony\Component\Security\Core\Authorization\Voter\RoleVoter()));
            yield 2 => ($this->privates['security.access.expression_voter'] ?? $this->getSecurity_Access_ExpressionVoterService());
        }, 3), 'affirmative', false, true);
    }

    /*
     * Gets the private 'security.access.expression_voter' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\Voter\ExpressionVoter
     */
    protected function getSecurity_Access_ExpressionVoterService()
    {
        return $this->privates['security.access.expression_voter'] = new \Symfony\Component\Security\Core\Authorization\Voter\ExpressionVoter(($this->privates['security.expression_language'] ?? $this->getSecurity_ExpressionLanguageService()), ($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver())), ($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()), ($this->privates['security.role_hierarchy'] ?? ($this->privates['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy([]))));
    }

    /*
     * Gets the private 'security.access_listener' shared service.
     *
     * @return \Symfony\Component\Security\Http\Firewall\AccessListener
     */
    protected function getSecurity_AccessListenerService()
    {
        return $this->privates['security.access_listener'] = new \Symfony\Component\Security\Http\Firewall\AccessListener(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->privates['security.access.decision_manager'] ?? $this->getSecurity_Access_DecisionManagerService()), ($this->privates['security.access_map'] ?? $this->getSecurity_AccessMapService()), ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()));
    }

    /*
     * Gets the private 'security.access_map' shared service.
     *
     * @return \Symfony\Component\Security\Http\AccessMap
     */
    protected function getSecurity_AccessMapService()
    {
        $this->privates['security.access_map'] = $instance = new \Symfony\Component\Security\Http\AccessMap();

        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/api/docs'), [0 => 'IS_AUTHENTICATED_ANONYMOUSLY'], NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/login'), [0 => 'IS_AUTHENTICATED_ANONYMOUSLY'], NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/api/token/refresh'), [0 => 'IS_AUTHENTICATED_ANONYMOUSLY'], NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/api'), [0 => 'IS_AUTHENTICATED_FULLY'], NULL);

        return $instance;
    }

    /*
     * Gets the private 'security.authentication.listener.anonymous.api' shared service.
     *
     * @return \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener
     */
    protected function getSecurity_Authentication_Listener_Anonymous_ApiService()
    {
        return $this->privates['security.authentication.listener.anonymous.api'] = new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener(($this->privates['security.untracked_token_storage'] ?? ($this->privates['security.untracked_token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), $this->getParameter('container.build_hash'), ($this->privates['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService()), ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()));
    }

    /*
     * Gets the private 'security.authentication.listener.anonymous.main' shared service.
     *
     * @return \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener
     */
    protected function getSecurity_Authentication_Listener_Anonymous_MainService()
    {
        return $this->privates['security.authentication.listener.anonymous.main'] = new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener(($this->privates['security.untracked_token_storage'] ?? ($this->privates['security.untracked_token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), $this->getParameter('container.build_hash'), ($this->privates['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService()), ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()));
    }

    /*
     * Gets the private 'security.authentication.listener.anonymous.refresh' shared service.
     *
     * @return \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener
     */
    protected function getSecurity_Authentication_Listener_Anonymous_RefreshService()
    {
        return $this->privates['security.authentication.listener.anonymous.refresh'] = new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener(($this->privates['security.untracked_token_storage'] ?? ($this->privates['security.untracked_token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), $this->getParameter('container.build_hash'), ($this->privates['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService()), ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()));
    }

    /*
     * Gets the private 'security.authentication.listener.guard.api' shared service.
     *
     * @return \Symfony\Component\Security\Guard\Firewall\GuardAuthenticationListener
     */
    protected function getSecurity_Authentication_Listener_Guard_ApiService()
    {
        $a = new \Symfony\Component\Security\Guard\GuardAuthenticatorHandler(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), [0 => 'api', 1 => 'refresh']);
        $a->setSessionAuthenticationStrategy(($this->privates['security.authentication.session_strategy'] ?? ($this->privates['security.authentication.session_strategy'] = new \Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy('migrate'))));

        return $this->privates['security.authentication.listener.guard.api'] = new \Symfony\Component\Security\Guard\Firewall\GuardAuthenticationListener($a, ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()), 'api', new RewindableGenerator(function () {
            yield 0 => ($this->privates['lexik_jwt_authentication.security.guard.jwt_token_authenticator'] ?? $this->getLexikJwtAuthentication_Security_Guard_JwtTokenAuthenticatorService());
        }, 1), ($this->privates['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService()));
    }

    /*
     * Gets the private 'security.authentication.listener.json.main' shared service.
     *
     * @return \Symfony\Component\Security\Http\Firewall\UsernamePasswordJsonAuthenticationListener
     */
    protected function getSecurity_Authentication_Listener_Json_MainService()
    {
        $this->privates['security.authentication.listener.json.main'] = $instance = new \Symfony\Component\Security\Http\Firewall\UsernamePasswordJsonAuthenticationListener(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()), ($this->privates['security.http_utils'] ?? $this->getSecurity_HttpUtilsService()), 'main', new \Symfony\Component\Security\Http\Authentication\CustomAuthenticationSuccessHandler(($this->privates['lexik_jwt_authentication.handler.authentication_success'] ?? $this->getLexikJwtAuthentication_Handler_AuthenticationSuccessService()), [], 'main'), new \Symfony\Component\Security\Http\Authentication\CustomAuthenticationFailureHandler(($this->privates['lexik_jwt_authentication.handler.authentication_failure'] ?? $this->getLexikJwtAuthentication_Handler_AuthenticationFailureService()), []), ['check_path' => '/login', 'username_path' => 'email', 'password_path' => 'password', 'use_forward' => false, 'require_previous_session' => false], ($this->privates['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->privates['property_accessor'] ?? $this->getPropertyAccessorService()));

        $instance->setSessionAuthenticationStrategy(($this->privates['security.authentication.session_strategy'] ?? ($this->privates['security.authentication.session_strategy'] = new \Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy('migrate'))));

        return $instance;
    }

    /*
     * Gets the private 'security.authentication.manager' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager
     */
    protected function getSecurity_Authentication_ManagerService()
    {
        $this->privates['security.authentication.manager'] = $instance = new \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager(new RewindableGenerator(function () {
            yield 0 => ($this->privates['security.authentication.provider.guard.api'] ?? $this->getSecurity_Authentication_Provider_Guard_ApiService());
            yield 1 => ($this->privates['security.authentication.provider.anonymous.api'] ?? ($this->privates['security.authentication.provider.anonymous.api'] = new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider($this->getParameter('container.build_hash'))));
            yield 2 => ($this->privates['security.authentication.provider.dao.main'] ?? $this->getSecurity_Authentication_Provider_Dao_MainService());
            yield 3 => ($this->privates['security.authentication.provider.anonymous.main'] ?? ($this->privates['security.authentication.provider.anonymous.main'] = new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider($this->getParameter('container.build_hash'))));
            yield 4 => ($this->privates['security.authentication.provider.anonymous.refresh'] ?? ($this->privates['security.authentication.provider.anonymous.refresh'] = new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider($this->getParameter('container.build_hash'))));
        }, 5), true);

        $instance->setEventDispatcher(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));

        return $instance;
    }

    /*
     * Gets the private 'security.authentication.provider.dao.main' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider
     */
    protected function getSecurity_Authentication_Provider_Dao_MainService()
    {
        return $this->privates['security.authentication.provider.dao.main'] = new \Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider(($this->privates['security.user.provider.concrete.app_user_provider'] ?? $this->getSecurity_User_Provider_Concrete_AppUserProviderService()), ($this->privates['App\\Security\\UserChecker'] ?? ($this->privates['App\\Security\\UserChecker'] = new \App\Security\UserChecker())), 'main', ($this->privates['security.encoder_factory.generic'] ?? $this->getSecurity_EncoderFactory_GenericService()), true);
    }

    /*
     * Gets the private 'security.authentication.provider.guard.api' shared service.
     *
     * @return \Symfony\Component\Security\Guard\Provider\GuardAuthenticationProvider
     */
    protected function getSecurity_Authentication_Provider_Guard_ApiService()
    {
        return $this->privates['security.authentication.provider.guard.api'] = new \Symfony\Component\Security\Guard\Provider\GuardAuthenticationProvider(new RewindableGenerator(function () {
            yield 0 => ($this->privates['lexik_jwt_authentication.security.guard.jwt_token_authenticator'] ?? $this->getLexikJwtAuthentication_Security_Guard_JwtTokenAuthenticatorService());
        }, 1), ($this->privates['security.user.provider.concrete.app_user_provider'] ?? $this->getSecurity_User_Provider_Concrete_AppUserProviderService()), 'api', ($this->privates['App\\Security\\UserChecker'] ?? ($this->privates['App\\Security\\UserChecker'] = new \App\Security\UserChecker())), ($this->services['security.password_encoder'] ?? $this->getSecurity_PasswordEncoderService()));
    }

    /*
     * Gets the private 'security.channel_listener' shared service.
     *
     * @return \Symfony\Component\Security\Http\Firewall\ChannelListener
     */
    protected function getSecurity_ChannelListenerService()
    {
        return $this->privates['security.channel_listener'] = new \Symfony\Component\Security\Http\Firewall\ChannelListener(($this->privates['security.access_map'] ?? $this->getSecurity_AccessMapService()), new \Symfony\Component\Security\Http\EntryPoint\RetryAuthenticationEntryPoint(80, 443), ($this->privates['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService()));
    }

    /*
     * Gets the private 'security.command.user_password_encoder' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Command\UserPasswordEncoderCommand
     */
    protected function getSecurity_Command_UserPasswordEncoderService()
    {
        $this->privates['security.command.user_password_encoder'] = $instance = new \Symfony\Bundle\SecurityBundle\Command\UserPasswordEncoderCommand(($this->privates['security.encoder_factory.generic'] ?? $this->getSecurity_EncoderFactory_GenericService()), [0 => 'App\\Entity\\User']);

        $instance->setName('security:encode-password');

        return $instance;
    }

    /*
     * Gets the private 'security.context_listener.0' shared service.
     *
     * @return \Symfony\Component\Security\Http\Firewall\ContextListener
     */
    protected function getSecurity_ContextListener_0Service()
    {
        return $this->privates['security.context_listener.0'] = new \Symfony\Component\Security\Http\Firewall\ContextListener(($this->privates['security.untracked_token_storage'] ?? ($this->privates['security.untracked_token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), new RewindableGenerator(function () {
            yield 0 => ($this->privates['security.user.provider.concrete.app_user_provider'] ?? $this->getSecurity_User_Provider_Concrete_AppUserProviderService());
        }, 1), 'main', ($this->privates['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver())), [0 => ($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), 1 => 'enableUsageTracking']);
    }

    /*
     * Gets the private 'security.encoder_factory.generic' shared service.
     *
     * @return \Symfony\Component\Security\Core\Encoder\EncoderFactory
     */
    protected function getSecurity_EncoderFactory_GenericService()
    {
        return $this->privates['security.encoder_factory.generic'] = new \Symfony\Component\Security\Core\Encoder\EncoderFactory(['App\\Entity\\User' => ['class' => 'Symfony\\Component\\Security\\Core\\Encoder\\NativePasswordEncoder', 'arguments' => [0 => NULL, 1 => NULL, 2 => NULL, 3 => 'argon2i']]]);
    }

    /*
     * Gets the private 'security.expression_language' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\ExpressionLanguage
     */
    protected function getSecurity_ExpressionLanguageService()
    {
        $this->privates['security.expression_language'] = $instance = new \Symfony\Component\Security\Core\Authorization\ExpressionLanguage(($this->privates['cache.security_expression_language'] ?? $this->getCache_SecurityExpressionLanguageService()));

        $instance->registerProvider(($this->privates['api_platform.security.expression_language_provider'] ?? ($this->privates['api_platform.security.expression_language_provider'] = new \ApiPlatform\Core\Security\Core\Authorization\ExpressionLanguageProvider())));

        return $instance;
    }

    /*
     * Gets the private 'security.firewall' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\EventListener\FirewallListener
     */
    protected function getSecurity_FirewallService()
    {
        return $this->privates['security.firewall'] = new \Symfony\Bundle\SecurityBundle\EventListener\FirewallListener(new \Symfony\Bundle\SecurityBundle\Security\FirewallMap(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'security.firewall.map.context.api' => ['privates', 'security.firewall.map.context.api', 'getSecurity_Firewall_Map_Context_ApiService', false],
            'security.firewall.map.context.dev' => ['privates', 'security.firewall.map.context.dev', 'getSecurity_Firewall_Map_Context_DevService', false],
            'security.firewall.map.context.main' => ['privates', 'security.firewall.map.context.main', 'getSecurity_Firewall_Map_Context_MainService', false],
            'security.firewall.map.context.refresh' => ['privates', 'security.firewall.map.context.refresh', 'getSecurity_Firewall_Map_Context_RefreshService', false],
        ], [
            'security.firewall.map.context.api' => '?',
            'security.firewall.map.context.dev' => '?',
            'security.firewall.map.context.main' => '?',
            'security.firewall.map.context.refresh' => '?',
        ]), new RewindableGenerator(function () {
            yield 'security.firewall.map.context.dev' => ($this->privates['.security.request_matcher.Whq7_mc'] ?? ($this->privates['.security.request_matcher.Whq7_mc'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/_(profiler|wdt)')));
            yield 'security.firewall.map.context.api' => ($this->privates['.security.request_matcher.uTv4pMG'] ?? ($this->privates['.security.request_matcher.uTv4pMG'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/api/')));
            yield 'security.firewall.map.context.main' => NULL;
            yield 'security.firewall.map.context.refresh' => ($this->privates['.security.request_matcher.UQgI.UV'] ?? ($this->privates['.security.request_matcher.UQgI.UV'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/api/token/refresh')));
        }, 4)), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService()));
    }

    /*
     * Gets the private 'security.firewall.map.context.api' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext
     */
    protected function getSecurity_Firewall_Map_Context_ApiService()
    {
        return $this->privates['security.firewall.map.context.api'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(new RewindableGenerator(function () {
            yield 0 => ($this->privates['security.channel_listener'] ?? $this->getSecurity_ChannelListenerService());
            yield 1 => ($this->privates['security.authentication.listener.guard.api'] ?? $this->getSecurity_Authentication_Listener_Guard_ApiService());
            yield 2 => ($this->privates['security.authentication.listener.anonymous.api'] ?? $this->getSecurity_Authentication_Listener_Anonymous_ApiService());
            yield 3 => ($this->privates['security.access_listener'] ?? $this->getSecurity_AccessListenerService());
        }, 4), new \Symfony\Component\Security\Http\Firewall\ExceptionListener(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver())), ($this->privates['security.http_utils'] ?? $this->getSecurity_HttpUtilsService()), 'api', ($this->privates['lexik_jwt_authentication.security.guard.jwt_token_authenticator'] ?? $this->getLexikJwtAuthentication_Security_Guard_JwtTokenAuthenticatorService()), NULL, NULL, ($this->privates['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService()), true), NULL, new \Symfony\Bundle\SecurityBundle\Security\FirewallConfig('api', 'App\\Security\\UserChecker', '.security.request_matcher.uTv4pMG', true, true, 'security.user.provider.concrete.app_user_provider', NULL, 'lexik_jwt_authentication.jwt_token_authenticator', NULL, NULL, [0 => 'guard', 1 => 'anonymous'], NULL));
    }

    /*
     * Gets the private 'security.firewall.map.context.dev' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext
     */
    protected function getSecurity_Firewall_Map_Context_DevService()
    {
        return $this->privates['security.firewall.map.context.dev'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(new RewindableGenerator(function () {
            return new \EmptyIterator();
        }, 0), NULL, NULL, new \Symfony\Bundle\SecurityBundle\Security\FirewallConfig('dev', 'App\\Security\\UserChecker', '.security.request_matcher.Whq7_mc', false, false, '', '', '', '', '', [], NULL));
    }

    /*
     * Gets the private 'security.firewall.map.context.main' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext
     */
    protected function getSecurity_Firewall_Map_Context_MainService()
    {
        return $this->privates['security.firewall.map.context.main'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(new RewindableGenerator(function () {
            yield 0 => ($this->privates['security.channel_listener'] ?? $this->getSecurity_ChannelListenerService());
            yield 1 => ($this->privates['security.context_listener.0'] ?? $this->getSecurity_ContextListener_0Service());
            yield 2 => ($this->privates['security.authentication.listener.json.main'] ?? $this->getSecurity_Authentication_Listener_Json_MainService());
            yield 3 => ($this->privates['security.authentication.listener.anonymous.main'] ?? $this->getSecurity_Authentication_Listener_Anonymous_MainService());
            yield 4 => ($this->privates['security.access_listener'] ?? $this->getSecurity_AccessListenerService());
        }, 5), new \Symfony\Component\Security\Http\Firewall\ExceptionListener(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver())), ($this->privates['security.http_utils'] ?? $this->getSecurity_HttpUtilsService()), 'main', NULL, NULL, NULL, ($this->privates['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService()), false), NULL, new \Symfony\Bundle\SecurityBundle\Security\FirewallConfig('main', 'App\\Security\\UserChecker', NULL, true, false, 'security.user.provider.concrete.app_user_provider', 'main', NULL, NULL, NULL, [0 => 'json_login', 1 => 'anonymous'], NULL));
    }

    /*
     * Gets the private 'security.firewall.map.context.refresh' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallContext
     */
    protected function getSecurity_Firewall_Map_Context_RefreshService()
    {
        return $this->privates['security.firewall.map.context.refresh'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(new RewindableGenerator(function () {
            yield 0 => ($this->privates['security.channel_listener'] ?? $this->getSecurity_ChannelListenerService());
            yield 1 => ($this->privates['security.authentication.listener.anonymous.refresh'] ?? $this->getSecurity_Authentication_Listener_Anonymous_RefreshService());
            yield 2 => ($this->privates['security.access_listener'] ?? $this->getSecurity_AccessListenerService());
        }, 3), new \Symfony\Component\Security\Http\Firewall\ExceptionListener(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver())), ($this->privates['security.http_utils'] ?? $this->getSecurity_HttpUtilsService()), 'refresh', NULL, NULL, NULL, ($this->privates['monolog.logger.security'] ?? $this->getMonolog_Logger_SecurityService()), true), NULL, new \Symfony\Bundle\SecurityBundle\Security\FirewallConfig('refresh', 'security.user_checker', '.security.request_matcher.UQgI.UV', true, true, 'security.user.provider.concrete.app_user_provider', NULL, NULL, NULL, NULL, [0 => 'anonymous'], NULL));
    }

    /*
     * Gets the private 'security.http_utils' shared service.
     *
     * @return \Symfony\Component\Security\Http\HttpUtils
     */
    protected function getSecurity_HttpUtilsService()
    {
        $a = ($this->services['router'] ?? $this->getRouterService());

        return $this->privates['security.http_utils'] = new \Symfony\Component\Security\Http\HttpUtils($a, $a, '{^https?://%s$}i', '{^https://%s$}i');
    }

    /*
     * Gets the private 'security.logout_url_generator' shared service.
     *
     * @return \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator
     */
    protected function getSecurity_LogoutUrlGeneratorService()
    {
        return $this->privates['security.logout_url_generator'] = new \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->services['router'] ?? $this->getRouterService()), ($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()));
    }

    /*
     * Gets the private 'security.user.provider.concrete.app_user_provider' shared service.
     *
     * @return \Symfony\Bridge\Doctrine\Security\User\EntityUserProvider
     */
    protected function getSecurity_User_Provider_Concrete_AppUserProviderService()
    {
        return $this->privates['security.user.provider.concrete.app_user_provider'] = new \Symfony\Bridge\Doctrine\Security\User\EntityUserProvider(($this->services['doctrine'] ?? $this->getDoctrineService()), 'App\\Entity\\User', 'email', NULL);
    }

    /*
     * Gets the private 'security.user_value_resolver' shared service.
     *
     * @return \Symfony\Component\Security\Http\Controller\UserValueResolver
     */
    protected function getSecurity_UserValueResolverService()
    {
        return $this->privates['security.user_value_resolver'] = new \Symfony\Component\Security\Http\Controller\UserValueResolver(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()));
    }

    /*
     * Gets the private 'security.validator.user_password' shared service.
     *
     * @return \Symfony\Component\Security\Core\Validator\Constraints\UserPasswordValidator
     */
    protected function getSecurity_Validator_UserPasswordService()
    {
        return $this->privates['security.validator.user_password'] = new \Symfony\Component\Security\Core\Validator\Constraints\UserPasswordValidator(($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->privates['security.encoder_factory.generic'] ?? $this->getSecurity_EncoderFactory_GenericService()));
    }

    /*
     * Gets the private 'sensio_framework_extra.controller.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener
     */
    protected function getSensioFrameworkExtra_Controller_ListenerService()
    {
        return $this->privates['sensio_framework_extra.controller.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()));
    }

    /*
     * Gets the private 'sensio_framework_extra.converter.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener
     */
    protected function getSensioFrameworkExtra_Converter_ListenerService()
    {
        $a = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager();
        $a->add(new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter(($this->services['doctrine'] ?? $this->getDoctrineService()), new \Symfony\Component\ExpressionLanguage\ExpressionLanguage()), 0, 'doctrine.orm');
        $a->add(new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter(), 0, 'datetime');

        return $this->privates['sensio_framework_extra.converter.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener($a, true);
    }

    /*
     * Gets the private 'sensio_framework_extra.security.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener
     */
    protected function getSensioFrameworkExtra_Security_ListenerService()
    {
        $a = new \Sensio\Bundle\FrameworkExtraBundle\Security\ExpressionLanguage();
        $a->registerProvider(($this->privates['api_platform.security.expression_language_provider'] ?? ($this->privates['api_platform.security.expression_language_provider'] = new \ApiPlatform\Core\Security\Core\Authorization\ExpressionLanguageProvider())));

        return $this->privates['sensio_framework_extra.security.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener(($this->privates['framework_extra_bundle.argument_name_convertor'] ?? $this->getFrameworkExtraBundle_ArgumentNameConvertorService()), $a, ($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver())), ($this->privates['security.role_hierarchy'] ?? ($this->privates['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy([]))), ($this->services['security.token_storage'] ?? $this->getSecurity_TokenStorageService()), ($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()), ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()));
    }

    /*
     * Gets the private 'sensio_framework_extra.view.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener
     */
    protected function getSensioFrameworkExtra_View_ListenerService()
    {
        $this->privates['sensio_framework_extra.view.listener'] = $instance = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener(new \Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser(($this->services['kernel'] ?? $this->get('kernel', 1))));

        $instance->setContainer((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'twig' => ['services', 'twig', 'getTwigService', false],
        ], [
            'twig' => 'Twig\\Environment',
        ]))->withContext('sensio_framework_extra.view.listener', $this));

        return $instance;
    }

    /*
     * Gets the private 'serializer.mapping.cache_class_metadata_factory' shared service.
     *
     * @return \Symfony\Component\Serializer\Mapping\Factory\CacheClassMetadataFactory
     */
    protected function getSerializer_Mapping_CacheClassMetadataFactoryService()
    {
        return $this->privates['serializer.mapping.cache_class_metadata_factory'] = new \Symfony\Component\Serializer\Mapping\Factory\CacheClassMetadataFactory(new \Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory(new \Symfony\Component\Serializer\Mapping\Loader\LoaderChain([0 => new \Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()))]), NULL), \Symfony\Component\Cache\Adapter\PhpArrayAdapter::create(($this->targetDir.''.'/serialization.php'), ($this->privates['cache.serializer'] ?? $this->getCache_SerializerService())));
    }

    /*
     * Gets the private 'serializer.mapping.cache_warmer' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\CacheWarmer\SerializerCacheWarmer
     */
    protected function getSerializer_Mapping_CacheWarmerService()
    {
        return $this->privates['serializer.mapping.cache_warmer'] = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\SerializerCacheWarmer([0 => new \Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()))], ($this->targetDir.''.'/serialization.php'));
    }

    /*
     * Gets the private 'serializer.name_converter.metadata_aware' shared service.
     *
     * @return \Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter
     */
    protected function getSerializer_NameConverter_MetadataAwareService()
    {
        return $this->privates['serializer.name_converter.metadata_aware'] = new \Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter(($this->privates['serializer.mapping.cache_class_metadata_factory'] ?? $this->getSerializer_Mapping_CacheClassMetadataFactoryService()));
    }

    /*
     * Gets the private 'session.storage.native' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage
     */
    protected function getSession_Storage_NativeService()
    {
        return $this->privates['session.storage.native'] = new \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage($this->parameters['session.storage.options'], NULL, new \Symfony\Component\HttpFoundation\Session\Storage\MetadataBag('_sf2_meta', 0));
    }

    /*
     * Gets the private 'session_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\SessionListener
     */
    protected function getSessionListenerService()
    {
        return $this->privates['session_listener'] = new \Symfony\Component\HttpKernel\EventListener\SessionListener(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'initialized_session' => ['services', 'session', NULL, false],
            'request_stack' => ['services', 'request_stack', 'getRequestStackService', false],
            'session' => ['services', 'session', 'getSessionService', false],
            'session_storage' => ['privates', 'session.storage.native', 'getSession_Storage_NativeService', false],
        ], [
            'initialized_session' => '?',
            'request_stack' => '?',
            'session' => '?',
            'session_storage' => '?',
        ]));
    }

    /*
     * Gets the private 'swiftmailer.command.debug' shared service.
     *
     * @return \Symfony\Bundle\SwiftmailerBundle\Command\DebugCommand
     */
    protected function getSwiftmailer_Command_DebugService()
    {
        $this->privates['swiftmailer.command.debug'] = $instance = new \Symfony\Bundle\SwiftmailerBundle\Command\DebugCommand();

        $instance->setName('debug:swiftmailer');

        return $instance;
    }

    /*
     * Gets the private 'swiftmailer.command.new_email' shared service.
     *
     * @return \Symfony\Bundle\SwiftmailerBundle\Command\NewEmailCommand
     */
    protected function getSwiftmailer_Command_NewEmailService()
    {
        $this->privates['swiftmailer.command.new_email'] = $instance = new \Symfony\Bundle\SwiftmailerBundle\Command\NewEmailCommand();

        $instance->setName('swiftmailer:email:send');

        return $instance;
    }

    /*
     * Gets the private 'swiftmailer.command.send_email' shared service.
     *
     * @return \Symfony\Bundle\SwiftmailerBundle\Command\SendEmailCommand
     */
    protected function getSwiftmailer_Command_SendEmailService()
    {
        $this->privates['swiftmailer.command.send_email'] = $instance = new \Symfony\Bundle\SwiftmailerBundle\Command\SendEmailCommand();

        $instance->setName('swiftmailer:spool:send');

        return $instance;
    }

    /*
     * Gets the private 'swiftmailer.email_sender.listener' shared service.
     *
     * @return \Symfony\Bundle\SwiftmailerBundle\EventListener\EmailSenderListener
     */
    protected function getSwiftmailer_EmailSender_ListenerService()
    {
        return $this->privates['swiftmailer.email_sender.listener'] = new \Symfony\Bundle\SwiftmailerBundle\EventListener\EmailSenderListener($this, ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()));
    }

    /*
     * Gets the private 'translation.extractor' shared service.
     *
     * @return \Symfony\Component\Translation\Extractor\ChainExtractor
     */
    protected function getTranslation_ExtractorService()
    {
        $this->privates['translation.extractor'] = $instance = new \Symfony\Component\Translation\Extractor\ChainExtractor();

        $instance->addExtractor('php', new \Symfony\Component\Translation\Extractor\PhpExtractor());
        $instance->addExtractor('twig', new \Symfony\Bridge\Twig\Translation\TwigExtractor(($this->services['twig'] ?? $this->getTwigService())));

        return $instance;
    }

    /*
     * Gets the private 'translation.loader.csv' shared service.
     *
     * @return \Symfony\Component\Translation\Loader\CsvFileLoader
     */
    protected function getTranslation_Loader_CsvService()
    {
        return $this->privates['translation.loader.csv'] = new \Symfony\Component\Translation\Loader\CsvFileLoader();
    }

    /*
     * Gets the private 'translation.loader.dat' shared service.
     *
     * @return \Symfony\Component\Translation\Loader\IcuDatFileLoader
     */
    protected function getTranslation_Loader_DatService()
    {
        return $this->privates['translation.loader.dat'] = new \Symfony\Component\Translation\Loader\IcuDatFileLoader();
    }

    /*
     * Gets the private 'translation.loader.ini' shared service.
     *
     * @return \Symfony\Component\Translation\Loader\IniFileLoader
     */
    protected function getTranslation_Loader_IniService()
    {
        return $this->privates['translation.loader.ini'] = new \Symfony\Component\Translation\Loader\IniFileLoader();
    }

    /*
     * Gets the private 'translation.loader.json' shared service.
     *
     * @return \Symfony\Component\Translation\Loader\JsonFileLoader
     */
    protected function getTranslation_Loader_JsonService()
    {
        return $this->privates['translation.loader.json'] = new \Symfony\Component\Translation\Loader\JsonFileLoader();
    }

    /*
     * Gets the private 'translation.loader.mo' shared service.
     *
     * @return \Symfony\Component\Translation\Loader\MoFileLoader
     */
    protected function getTranslation_Loader_MoService()
    {
        return $this->privates['translation.loader.mo'] = new \Symfony\Component\Translation\Loader\MoFileLoader();
    }

    /*
     * Gets the private 'translation.loader.php' shared service.
     *
     * @return \Symfony\Component\Translation\Loader\PhpFileLoader
     */
    protected function getTranslation_Loader_PhpService()
    {
        return $this->privates['translation.loader.php'] = new \Symfony\Component\Translation\Loader\PhpFileLoader();
    }

    /*
     * Gets the private 'translation.loader.po' shared service.
     *
     * @return \Symfony\Component\Translation\Loader\PoFileLoader
     */
    protected function getTranslation_Loader_PoService()
    {
        return $this->privates['translation.loader.po'] = new \Symfony\Component\Translation\Loader\PoFileLoader();
    }

    /*
     * Gets the private 'translation.loader.qt' shared service.
     *
     * @return \Symfony\Component\Translation\Loader\QtFileLoader
     */
    protected function getTranslation_Loader_QtService()
    {
        return $this->privates['translation.loader.qt'] = new \Symfony\Component\Translation\Loader\QtFileLoader();
    }

    /*
     * Gets the private 'translation.loader.res' shared service.
     *
     * @return \Symfony\Component\Translation\Loader\IcuResFileLoader
     */
    protected function getTranslation_Loader_ResService()
    {
        return $this->privates['translation.loader.res'] = new \Symfony\Component\Translation\Loader\IcuResFileLoader();
    }

    /*
     * Gets the private 'translation.loader.xliff' shared service.
     *
     * @return \Symfony\Component\Translation\Loader\XliffFileLoader
     */
    protected function getTranslation_Loader_XliffService()
    {
        return $this->privates['translation.loader.xliff'] = new \Symfony\Component\Translation\Loader\XliffFileLoader();
    }

    /*
     * Gets the private 'translation.loader.yml' shared service.
     *
     * @return \Symfony\Component\Translation\Loader\YamlFileLoader
     */
    protected function getTranslation_Loader_YmlService()
    {
        return $this->privates['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader();
    }

    /*
     * Gets the private 'translation.reader' shared service.
     *
     * @return \Symfony\Component\Translation\Reader\TranslationReader
     */
    protected function getTranslation_ReaderService()
    {
        $this->privates['translation.reader'] = $instance = new \Symfony\Component\Translation\Reader\TranslationReader();

        $a = ($this->privates['translation.loader.yml'] ?? ($this->privates['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader()));
        $b = ($this->privates['translation.loader.xliff'] ?? ($this->privates['translation.loader.xliff'] = new \Symfony\Component\Translation\Loader\XliffFileLoader()));

        $instance->addLoader('php', ($this->privates['translation.loader.php'] ?? ($this->privates['translation.loader.php'] = new \Symfony\Component\Translation\Loader\PhpFileLoader())));
        $instance->addLoader('yaml', $a);
        $instance->addLoader('yml', $a);
        $instance->addLoader('xlf', $b);
        $instance->addLoader('xliff', $b);
        $instance->addLoader('po', ($this->privates['translation.loader.po'] ?? ($this->privates['translation.loader.po'] = new \Symfony\Component\Translation\Loader\PoFileLoader())));
        $instance->addLoader('mo', ($this->privates['translation.loader.mo'] ?? ($this->privates['translation.loader.mo'] = new \Symfony\Component\Translation\Loader\MoFileLoader())));
        $instance->addLoader('ts', ($this->privates['translation.loader.qt'] ?? ($this->privates['translation.loader.qt'] = new \Symfony\Component\Translation\Loader\QtFileLoader())));
        $instance->addLoader('csv', ($this->privates['translation.loader.csv'] ?? ($this->privates['translation.loader.csv'] = new \Symfony\Component\Translation\Loader\CsvFileLoader())));
        $instance->addLoader('res', ($this->privates['translation.loader.res'] ?? ($this->privates['translation.loader.res'] = new \Symfony\Component\Translation\Loader\IcuResFileLoader())));
        $instance->addLoader('dat', ($this->privates['translation.loader.dat'] ?? ($this->privates['translation.loader.dat'] = new \Symfony\Component\Translation\Loader\IcuDatFileLoader())));
        $instance->addLoader('ini', ($this->privates['translation.loader.ini'] ?? ($this->privates['translation.loader.ini'] = new \Symfony\Component\Translation\Loader\IniFileLoader())));
        $instance->addLoader('json', ($this->privates['translation.loader.json'] ?? ($this->privates['translation.loader.json'] = new \Symfony\Component\Translation\Loader\JsonFileLoader())));

        return $instance;
    }

    /*
     * Gets the private 'translation.warmer' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\CacheWarmer\TranslationsCacheWarmer
     */
    protected function getTranslation_WarmerService()
    {
        return $this->privates['translation.warmer'] = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TranslationsCacheWarmer((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'translator' => ['services', 'translator', 'getTranslatorService', false],
        ], [
            'translator' => '?',
        ]))->withContext('translation.warmer', $this));
    }

    /*
     * Gets the private 'twig.command.debug' shared service.
     *
     * @return \Symfony\Bridge\Twig\Command\DebugCommand
     */
    protected function getTwig_Command_DebugService()
    {
        $this->privates['twig.command.debug'] = $instance = new \Symfony\Bridge\Twig\Command\DebugCommand(($this->services['twig'] ?? $this->getTwigService()), \dirname(__DIR__, 4), $this->parameters['kernel.bundles_metadata'], (\dirname(__DIR__, 4).'/templates'), ($this->privates['debug.file_link_formatter'] ?? ($this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL))));

        $instance->setName('debug:twig');

        return $instance;
    }

    /*
     * Gets the private 'twig.command.lint' shared service.
     *
     * @return \Symfony\Bundle\TwigBundle\Command\LintCommand
     */
    protected function getTwig_Command_LintService()
    {
        $this->privates['twig.command.lint'] = $instance = new \Symfony\Bundle\TwigBundle\Command\LintCommand(($this->services['twig'] ?? $this->getTwigService()));

        $instance->setName('lint:twig');

        return $instance;
    }

    /*
     * Gets the private 'twig.form.renderer' shared service.
     *
     * @return \Symfony\Component\Form\FormRenderer
     */
    protected function getTwig_Form_RendererService()
    {
        return $this->privates['twig.form.renderer'] = new \Symfony\Component\Form\FormRenderer(new \Symfony\Bridge\Twig\Form\TwigRendererEngine($this->parameters['twig.form.resources'], ($this->services['twig'] ?? $this->getTwigService())), ($this->services['security.csrf.token_manager'] ?? $this->getSecurity_Csrf_TokenManagerService()));
    }

    /*
     * Gets the private 'twig.mailer.message_listener' shared service.
     *
     * @return \Symfony\Component\Mailer\EventListener\MessageListener
     */
    protected function getTwig_Mailer_MessageListenerService()
    {
        return $this->privates['twig.mailer.message_listener'] = new \Symfony\Component\Mailer\EventListener\MessageListener(NULL, new \Symfony\Bridge\Twig\Mime\BodyRenderer(($this->services['twig'] ?? $this->getTwigService())));
    }

    /*
     * Gets the private 'twig.runtime.httpkernel' shared service.
     *
     * @return \Symfony\Bridge\Twig\Extension\HttpKernelRuntime
     */
    protected function getTwig_Runtime_HttpkernelService()
    {
        return $this->privates['twig.runtime.httpkernel'] = new \Symfony\Bridge\Twig\Extension\HttpKernelRuntime(new \Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'inline' => ['privates', 'fragment.renderer.inline', 'getFragment_Renderer_InlineService', false],
        ], [
            'inline' => '?',
        ]), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), false));
    }

    /*
     * Gets the private 'twig.runtime.security_csrf' shared service.
     *
     * @return \Symfony\Bridge\Twig\Extension\CsrfRuntime
     */
    protected function getTwig_Runtime_SecurityCsrfService()
    {
        return $this->privates['twig.runtime.security_csrf'] = new \Symfony\Bridge\Twig\Extension\CsrfRuntime(($this->services['security.csrf.token_manager'] ?? $this->getSecurity_Csrf_TokenManagerService()));
    }

    /*
     * Gets the private 'twig.template_cache_warmer' shared service.
     *
     * @return \Symfony\Bundle\TwigBundle\CacheWarmer\TemplateCacheWarmer
     */
    protected function getTwig_TemplateCacheWarmerService()
    {
        return $this->privates['twig.template_cache_warmer'] = new \Symfony\Bundle\TwigBundle\CacheWarmer\TemplateCacheWarmer((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'twig' => ['services', 'twig', 'getTwigService', false],
        ], [
            'twig' => 'Twig\\Environment',
        ]))->withContext('twig.template_cache_warmer', $this), new \Symfony\Bundle\TwigBundle\TemplateIterator(($this->services['kernel'] ?? $this->get('kernel', 1)), [(\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Resources/views/Email') => 'email', (\dirname(__DIR__, 4).'/vendor/symfony/twig-bridge/Resources/views/Form') => NULL], (\dirname(__DIR__, 4).'/templates')));
    }

    /*
     * Gets the private 'validator.builder' shared service.
     *
     * @return \Symfony\Component\Validator\ValidatorBuilder
     */
    protected function getValidator_BuilderService()
    {
        $this->privates['validator.builder'] = $instance = \Symfony\Component\Validator\Validation::createValidatorBuilder();

        $a = ($this->privates['property_info.cache'] ?? $this->getPropertyInfo_CacheService());

        $instance->setConstraintValidatorFactory(new \Symfony\Component\Validator\ContainerConstraintValidatorFactory(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator' => ['privates', 'doctrine.orm.validator.unique', 'getDoctrine_Orm_Validator_UniqueService', false],
            'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator' => ['privates', 'security.validator.user_password', 'getSecurity_Validator_UserPasswordService', false],
            'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => ['privates', 'validator.email', 'getValidator_EmailService', false],
            'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => ['privates', 'validator.expression', 'getValidator_ExpressionService', false],
            'Symfony\\Component\\Validator\\Constraints\\NotCompromisedPasswordValidator' => ['privates', 'validator.not_compromised_password', 'getValidator_NotCompromisedPasswordService', false],
            'doctrine.orm.validator.unique' => ['privates', 'doctrine.orm.validator.unique', 'getDoctrine_Orm_Validator_UniqueService', false],
            'security.validator.user_password' => ['privates', 'security.validator.user_password', 'getSecurity_Validator_UserPasswordService', false],
            'validator.expression' => ['privates', 'validator.expression', 'getValidator_ExpressionService', false],
        ], [
            'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator' => '?',
            'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator' => '?',
            'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => '?',
            'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => '?',
            'Symfony\\Component\\Validator\\Constraints\\NotCompromisedPasswordValidator' => '?',
            'doctrine.orm.validator.unique' => '?',
            'security.validator.user_password' => '?',
            'validator.expression' => '?',
        ])));
        if ($this->has('translator')) {
            $instance->setTranslator(($this->services['translator'] ?? $this->getTranslatorService()));
        }
        $instance->setTranslationDomain('validators');
        $instance->addXmlMappings([0 => (\dirname(__DIR__, 4).'/vendor/symfony/form/Resources/config/validation.xml')]);
        $instance->enableAnnotationMapping(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()));
        $instance->addMethodMapping('loadValidatorMetadata');
        $instance->setMappingCache(\Symfony\Component\Cache\Adapter\PhpArrayAdapter::create(($this->targetDir.''.'/validation.php'), ($this->privates['cache.validator'] ?? $this->getCache_ValidatorService())));
        $instance->addObjectInitializers([0 => new \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer(($this->services['doctrine'] ?? $this->getDoctrineService()))]);
        $instance->addLoader(new \Symfony\Component\Validator\Mapping\Loader\PropertyInfoLoader($a, $a, $a, NULL));
        $instance->addLoader(new \Symfony\Bridge\Doctrine\Validator\DoctrineLoader(($this->services['doctrine.orm.default_entity_manager'] ?? $this->getDoctrine_Orm_DefaultEntityManagerService()), NULL));

        return $instance;
    }

    /*
     * Gets the private 'validator.email' shared service.
     *
     * @return \Symfony\Component\Validator\Constraints\EmailValidator
     */
    protected function getValidator_EmailService()
    {
        return $this->privates['validator.email'] = new \Symfony\Component\Validator\Constraints\EmailValidator('html5');
    }

    /*
     * Gets the private 'validator.expression' shared service.
     *
     * @return \Symfony\Component\Validator\Constraints\ExpressionValidator
     */
    protected function getValidator_ExpressionService()
    {
        return $this->privates['validator.expression'] = new \Symfony\Component\Validator\Constraints\ExpressionValidator();
    }

    /*
     * Gets the private 'validator.mapping.cache_warmer' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\CacheWarmer\ValidatorCacheWarmer
     */
    protected function getValidator_Mapping_CacheWarmerService()
    {
        return $this->privates['validator.mapping.cache_warmer'] = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\ValidatorCacheWarmer(($this->privates['validator.builder'] ?? $this->getValidator_BuilderService()), ($this->targetDir.''.'/validation.php'));
    }

    /*
     * Gets the private 'validator.not_compromised_password' shared service.
     *
     * @return \Symfony\Component\Validator\Constraints\NotCompromisedPasswordValidator
     */
    protected function getValidator_NotCompromisedPasswordService()
    {
        $a = \Symfony\Component\HttpClient\HttpClient::create([], 6);

        $b = new \Symfony\Bridge\Monolog\Logger('http_client');
        $b->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $b->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));

        $a->setLogger($b);

        return $this->privates['validator.not_compromised_password'] = new \Symfony\Component\Validator\Constraints\NotCompromisedPasswordValidator($a, 'UTF-8', true, NULL);
    }

    /*
     * Gets the private 'webpack_encore.entrypoint_lookup.cache_warmer' shared service.
     *
     * @return \Symfony\WebpackEncoreBundle\CacheWarmer\EntrypointCacheWarmer
     */
    protected function getWebpackEncore_EntrypointLookup_CacheWarmerService()
    {
        return $this->privates['webpack_encore.entrypoint_lookup.cache_warmer'] = new \Symfony\WebpackEncoreBundle\CacheWarmer\EntrypointCacheWarmer(['_default' => (\dirname(__DIR__, 4).'/public/build/entrypoints.json')], ($this->targetDir.''.'/webpack_encore.cache.php'), ($this->privates['cache.webpack_encore'] ?? $this->getCache_WebpackEncoreService()));
    }

    /*
     * Gets the private 'webpack_encore.entrypoint_lookup[_default]' shared service.
     *
     * @return \Symfony\WebpackEncoreBundle\Asset\EntrypointLookup
     */
    protected function getWebpackEncore_EntrypointLookupDefaultService()
    {
        return $this->privates['webpack_encore.entrypoint_lookup[_default]'] = new \Symfony\WebpackEncoreBundle\Asset\EntrypointLookup((\dirname(__DIR__, 4).'/public/build/entrypoints.json'), NULL, '_default', true);
    }

    /*
     * Gets the private 'webpack_encore.entrypoint_lookup_collection' shared service.
     *
     * @return \Symfony\WebpackEncoreBundle\Asset\EntrypointLookupCollection
     */
    protected function getWebpackEncore_EntrypointLookupCollectionService()
    {
        return $this->privates['webpack_encore.entrypoint_lookup_collection'] = new \Symfony\WebpackEncoreBundle\Asset\EntrypointLookupCollection(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            '_default' => ['privates', 'webpack_encore.entrypoint_lookup[_default]', 'getWebpackEncore_EntrypointLookupDefaultService', false],
        ], [
            '_default' => '?',
        ]), '_default');
    }

    /*
     * Gets the private 'webpack_encore.exception_listener' shared service.
     *
     * @return \Symfony\WebpackEncoreBundle\EventListener\ExceptionListener
     */
    protected function getWebpackEncore_ExceptionListenerService()
    {
        return $this->privates['webpack_encore.exception_listener'] = new \Symfony\WebpackEncoreBundle\EventListener\ExceptionListener(($this->privates['webpack_encore.entrypoint_lookup_collection'] ?? $this->getWebpackEncore_EntrypointLookupCollectionService()), [0 => '_default']);
    }

    /*
     * Gets the private 'webpack_encore.tag_renderer' shared service.
     *
     * @return \Symfony\WebpackEncoreBundle\Asset\TagRenderer
     */
    protected function getWebpackEncore_TagRendererService()
    {
        return $this->privates['webpack_encore.tag_renderer'] = new \Symfony\WebpackEncoreBundle\Asset\TagRenderer(($this->privates['webpack_encore.entrypoint_lookup_collection'] ?? $this->getWebpackEncore_EntrypointLookupCollectionService()), ($this->privates['assets.packages'] ?? $this->getAssets_PackagesService()), []);
    }

    public function getParameter(string $name)
    {
        if (isset($this->buildParameters[$name])) {
            return $this->buildParameters[$name];
        }

        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter(string $name): bool
    {
        if (isset($this->buildParameters[$name])) {
            return true;
        }

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter(string $name, $value): void
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag(): ParameterBagInterface
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            foreach ($this->buildParameters as $name => $value) {
                $parameters[$name] = $value;
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [
        'kernel.cache_dir' => false,
        'kernel.secret' => false,
        'session.save_path' => false,
        'validator.mapping.cache.file' => false,
        'serializer.mapping.cache.file' => false,
        'doctrine.orm.proxy_dir' => false,
        'nelmio_cors.defaults' => false,
        'lexik_jwt_authentication.pass_phrase' => false,
        'swiftmailer.spool.default.memory.path' => false,
    ];
    private $dynamicParameters = [];

    private function getDynamicParameter(string $name)
    {
        switch ($name) {
            case 'kernel.cache_dir': $value = $this->targetDir.''; break;
            case 'kernel.secret': $value = $this->getEnv('APP_SECRET'); break;
            case 'session.save_path': $value = ($this->targetDir.''.'/sessions'); break;
            case 'validator.mapping.cache.file': $value = ($this->targetDir.''.'/validation.php'); break;
            case 'serializer.mapping.cache.file': $value = ($this->targetDir.''.'/serialization.php'); break;
            case 'doctrine.orm.proxy_dir': $value = ($this->targetDir.''.'/doctrine/orm/Proxies'); break;
            case 'nelmio_cors.defaults': $value = [
                'allow_origin' => [
                    0 => $this->getEnv('CORS_ALLOW_ORIGIN'),
                ],
                'allow_credentials' => false,
                'allow_headers' => [
                    0 => 'content-type',
                    1 => 'authorization',
                ],
                'expose_headers' => [
                    0 => 'Link',
                ],
                'allow_methods' => [
                    0 => 'GET',
                    1 => 'OPTIONS',
                    2 => 'POST',
                    3 => 'PUT',
                    4 => 'PATCH',
                    5 => 'DELETE',
                ],
                'max_age' => 3600,
                'hosts' => [

                ],
                'origin_regex' => true,
                'forced_allow_origin_value' => NULL,
            ]; break;
            case 'lexik_jwt_authentication.pass_phrase': $value = $this->getEnv('JWT_PASSPHRASE'); break;
            case 'swiftmailer.spool.default.memory.path': $value = ($this->targetDir.''.'/swiftmailer/spool/default'); break;
            default: throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
        }
        $this->loadedDynamicParameters[$name] = true;

        return $this->dynamicParameters[$name] = $value;
    }

    protected function getDefaultParameters(): array
    {
        return [
            'kernel.project_dir' => \dirname(__DIR__, 4),
            'kernel.environment' => 'prod',
            'kernel.debug' => false,
            'kernel.logs_dir' => (\dirname(__DIR__, 3).'/log'),
            'kernel.bundles' => [
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'TwigExtraBundle' => 'Twig\\Extra\\TwigExtraBundle\\TwigExtraBundle',
                'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle',
                'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'DoctrineMigrationsBundle' => 'Doctrine\\Bundle\\MigrationsBundle\\DoctrineMigrationsBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'WebpackEncoreBundle' => 'Symfony\\WebpackEncoreBundle\\WebpackEncoreBundle',
                'NelmioCorsBundle' => 'Nelmio\\CorsBundle\\NelmioCorsBundle',
                'ApiPlatformBundle' => 'ApiPlatform\\Core\\Bridge\\Symfony\\Bundle\\ApiPlatformBundle',
                'LexikJWTAuthenticationBundle' => 'Lexik\\Bundle\\JWTAuthenticationBundle\\LexikJWTAuthenticationBundle',
                'GesdinetJWTRefreshTokenBundle' => 'Gesdinet\\JWTRefreshTokenBundle\\GesdinetJWTRefreshTokenBundle',
                'SwiftmailerBundle' => 'Symfony\\Bundle\\SwiftmailerBundle\\SwiftmailerBundle',
            ],
            'kernel.bundles_metadata' => [
                'FrameworkBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/symfony/framework-bundle'),
                    'namespace' => 'Symfony\\Bundle\\FrameworkBundle',
                ],
                'TwigBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/symfony/twig-bundle'),
                    'namespace' => 'Symfony\\Bundle\\TwigBundle',
                ],
                'TwigExtraBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/twig/extra-bundle/src'),
                    'namespace' => 'Twig\\Extra\\TwigExtraBundle',
                ],
                'SensioFrameworkExtraBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/sensio/framework-extra-bundle/src'),
                    'namespace' => 'Sensio\\Bundle\\FrameworkExtraBundle',
                ],
                'DoctrineBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle'),
                    'namespace' => 'Doctrine\\Bundle\\DoctrineBundle',
                ],
                'DoctrineMigrationsBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/doctrine/doctrine-migrations-bundle'),
                    'namespace' => 'Doctrine\\Bundle\\MigrationsBundle',
                ],
                'SecurityBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/symfony/security-bundle'),
                    'namespace' => 'Symfony\\Bundle\\SecurityBundle',
                ],
                'MonologBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/symfony/monolog-bundle'),
                    'namespace' => 'Symfony\\Bundle\\MonologBundle',
                ],
                'WebpackEncoreBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/symfony/webpack-encore-bundle/src'),
                    'namespace' => 'Symfony\\WebpackEncoreBundle',
                ],
                'NelmioCorsBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/nelmio/cors-bundle'),
                    'namespace' => 'Nelmio\\CorsBundle',
                ],
                'ApiPlatformBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Symfony/Bundle'),
                    'namespace' => 'ApiPlatform\\Core\\Bridge\\Symfony\\Bundle',
                ],
                'LexikJWTAuthenticationBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/lexik/jwt-authentication-bundle'),
                    'namespace' => 'Lexik\\Bundle\\JWTAuthenticationBundle',
                ],
                'GesdinetJWTRefreshTokenBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/gesdinet/jwt-refresh-token-bundle'),
                    'namespace' => 'Gesdinet\\JWTRefreshTokenBundle',
                ],
                'SwiftmailerBundle' => [
                    'path' => (\dirname(__DIR__, 4).'/vendor/symfony/swiftmailer-bundle'),
                    'namespace' => 'Symfony\\Bundle\\SwiftmailerBundle',
                ],
            ],
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'App_KernelProdContainer',
            'container.dumper.inline_class_loader' => false,
            'container.dumper.inline_factories' => true,
            'image_directory' => (\dirname(__DIR__, 4).'/public/documents'),
            'event_dispatcher.event_aliases' => [
                'Symfony\\Component\\Console\\Event\\ConsoleCommandEvent' => 'console.command',
                'Symfony\\Component\\Console\\Event\\ConsoleErrorEvent' => 'console.error',
                'Symfony\\Component\\Console\\Event\\ConsoleTerminateEvent' => 'console.terminate',
                'Symfony\\Component\\Form\\Event\\PreSubmitEvent' => 'form.pre_submit',
                'Symfony\\Component\\Form\\Event\\SubmitEvent' => 'form.submit',
                'Symfony\\Component\\Form\\Event\\PostSubmitEvent' => 'form.post_submit',
                'Symfony\\Component\\Form\\Event\\PreSetDataEvent' => 'form.pre_set_data',
                'Symfony\\Component\\Form\\Event\\PostSetDataEvent' => 'form.post_set_data',
                'Symfony\\Component\\HttpKernel\\Event\\ControllerArgumentsEvent' => 'kernel.controller_arguments',
                'Symfony\\Component\\HttpKernel\\Event\\ControllerEvent' => 'kernel.controller',
                'Symfony\\Component\\HttpKernel\\Event\\ResponseEvent' => 'kernel.response',
                'Symfony\\Component\\HttpKernel\\Event\\FinishRequestEvent' => 'kernel.finish_request',
                'Symfony\\Component\\HttpKernel\\Event\\RequestEvent' => 'kernel.request',
                'Symfony\\Component\\HttpKernel\\Event\\ViewEvent' => 'kernel.view',
                'Symfony\\Component\\HttpKernel\\Event\\ExceptionEvent' => 'kernel.exception',
                'Symfony\\Component\\HttpKernel\\Event\\TerminateEvent' => 'kernel.terminate',
                'Symfony\\Component\\Workflow\\Event\\GuardEvent' => 'workflow.guard',
                'Symfony\\Component\\Workflow\\Event\\LeaveEvent' => 'workflow.leave',
                'Symfony\\Component\\Workflow\\Event\\TransitionEvent' => 'workflow.transition',
                'Symfony\\Component\\Workflow\\Event\\EnterEvent' => 'workflow.enter',
                'Symfony\\Component\\Workflow\\Event\\EnteredEvent' => 'workflow.entered',
                'Symfony\\Component\\Workflow\\Event\\CompletedEvent' => 'workflow.completed',
                'Symfony\\Component\\Workflow\\Event\\AnnounceEvent' => 'workflow.announce',
                'Symfony\\Component\\Security\\Core\\Event\\AuthenticationSuccessEvent' => 'security.authentication.success',
                'Symfony\\Component\\Security\\Core\\Event\\AuthenticationFailureEvent' => 'security.authentication.failure',
                'Symfony\\Component\\Security\\Http\\Event\\InteractiveLoginEvent' => 'security.interactive_login',
                'Symfony\\Component\\Security\\Http\\Event\\SwitchUserEvent' => 'security.switch_user',
            ],
            'fragment.renderer.hinclude.global_template' => '',
            'fragment.path' => '/_fragment',
            'kernel.http_method_override' => true,
            'kernel.trusted_hosts' => [

            ],
            'kernel.default_locale' => 'en',
            'kernel.error_controller' => 'error_controller',
            'debug.file_link_format' => NULL,
            'session.metadata.storage_key' => '_sf2_meta',
            'session.storage.options' => [
                'cache_limiter' => '0',
                'cookie_secure' => 'auto',
                'cookie_httponly' => true,
                'cookie_samesite' => 'lax',
                'gc_probability' => 1,
            ],
            'session.metadata.update_threshold' => 0,
            'form.type_extension.csrf.enabled' => true,
            'form.type_extension.csrf.field_name' => '_token',
            'asset.request_context.base_path' => '',
            'asset.request_context.secure' => false,
            'validator.mapping.cache.prefix' => '',
            'validator.translation_domain' => 'validators',
            'translator.logging' => false,
            'translator.default_path' => (\dirname(__DIR__, 4).'/translations'),
            'data_collector.templates' => [

            ],
            'debug.error_handler.throw_at' => 0,
            'router.request_context.host' => 'localhost',
            'router.request_context.scheme' => 'http',
            'router.request_context.base_url' => '',
            'router.resource' => 'kernel::loadRoutes',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'serializer.mapping.cache.prefix' => '',
            'twig.form.resources' => [
                0 => 'form_div_layout.html.twig',
            ],
            'twig.default_path' => (\dirname(__DIR__, 4).'/templates'),
            'doctrine.dbal.logger.chain.class' => 'Doctrine\\DBAL\\Logging\\LoggerChain',
            'doctrine.dbal.logger.profiling.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => [
                'default' => 'doctrine.orm.default_entity_manager',
            ],
            'doctrine.default_entity_manager' => 'default',
            'doctrine.dbal.connection_factory.types' => [

            ],
            'doctrine.connections' => [
                'default' => 'doctrine.dbal.default_connection',
            ],
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.manager_configurator.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ManagerConfigurator',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine.orm.cache.memcached_host' => 'localhost',
            'doctrine.orm.cache.memcached_port' => 11211,
            'doctrine.orm.cache.memcached_instance.class' => 'Memcached',
            'doctrine.orm.cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine.orm.cache.redis_host' => 'localhost',
            'doctrine.orm.cache.redis_port' => 6379,
            'doctrine.orm.cache.redis_instance.class' => 'Redis',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine.orm.cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\Persistence\\Mapping\\Driver\\MappingDriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedXmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedYamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\DoctrineInitializer',
            'doctrine.orm.security.user.provider.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'doctrine.orm.listeners.resolve_target_entity.class' => 'Doctrine\\ORM\\Tools\\ResolveTargetEntityListener',
            'doctrine.orm.listeners.attach_entity_listeners.class' => 'Doctrine\\ORM\\Tools\\AttachEntityListenersListener',
            'doctrine.orm.naming_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultNamingStrategy',
            'doctrine.orm.naming_strategy.underscore.class' => 'Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy',
            'doctrine.orm.quote_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultQuoteStrategy',
            'doctrine.orm.quote_strategy.ansi.class' => 'Doctrine\\ORM\\Mapping\\AnsiQuoteStrategy',
            'doctrine.orm.entity_listener_resolver.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Mapping\\ContainerEntityListenerResolver',
            'doctrine.orm.second_level_cache.default_cache_factory.class' => 'Doctrine\\ORM\\Cache\\DefaultCacheFactory',
            'doctrine.orm.second_level_cache.default_region.class' => 'Doctrine\\ORM\\Cache\\Region\\DefaultRegion',
            'doctrine.orm.second_level_cache.filelock_region.class' => 'Doctrine\\ORM\\Cache\\Region\\FileLockRegion',
            'doctrine.orm.second_level_cache.logger_chain.class' => 'Doctrine\\ORM\\Cache\\Logging\\CacheLoggerChain',
            'doctrine.orm.second_level_cache.logger_statistics.class' => 'Doctrine\\ORM\\Cache\\Logging\\StatisticsCacheLogger',
            'doctrine.orm.second_level_cache.cache_configuration.class' => 'Doctrine\\ORM\\Cache\\CacheConfiguration',
            'doctrine.orm.second_level_cache.regions_configuration.class' => 'Doctrine\\ORM\\Cache\\RegionsConfiguration',
            'doctrine.orm.auto_generate_proxy_classes' => false,
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'doctrine_migrations.dir_name' => (\dirname(__DIR__, 4).'/src/Migrations'),
            'doctrine_migrations.namespace' => 'DoctrineMigrations',
            'doctrine_migrations.table_name' => 'migration_versions',
            'doctrine_migrations.column_name' => 'version',
            'doctrine_migrations.column_length' => 14,
            'doctrine_migrations.executed_at_column_name' => 'executed_at',
            'doctrine_migrations.all_or_nothing' => false,
            'doctrine_migrations.name' => 'Application Migrations',
            'doctrine_migrations.custom_template' => NULL,
            'doctrine_migrations.organize_migrations' => false,
            'security.role_hierarchy.roles' => [

            ],
            'security.access.denied_url' => NULL,
            'security.authentication.manager.erase_credentials' => true,
            'security.authentication.session_strategy.strategy' => 'migrate',
            'security.access.always_authenticate_before_granting' => false,
            'security.authentication.hide_user_not_found' => true,
            'monolog.use_microseconds' => true,
            'monolog.swift_mailer.handlers' => [

            ],
            'monolog.handlers_to_channels' => [
                'monolog.handler.console' => [
                    'type' => 'exclusive',
                    'elements' => [
                        0 => 'event',
                        1 => 'doctrine',
                    ],
                ],
                'monolog.handler.main' => NULL,
            ],
            'nelmio_cors.map' => [
                '^/' => [

                ],
            ],
            'nelmio_cors.cors_listener.class' => 'Nelmio\\CorsBundle\\EventListener\\CorsListener',
            'nelmio_cors.options_resolver.class' => 'Nelmio\\CorsBundle\\Options\\Resolver',
            'nelmio_cors.options_provider.config.class' => 'Nelmio\\CorsBundle\\Options\\ConfigProvider',
            'api_platform.enable_entrypoint' => true,
            'api_platform.enable_docs' => true,
            'api_platform.title' => '',
            'api_platform.description' => '',
            'api_platform.version' => '0.0.0',
            'api_platform.show_webby' => true,
            'api_platform.exception_to_status' => [
                'Symfony\\Component\\Serializer\\Exception\\ExceptionInterface' => 400,
                'ApiPlatform\\Core\\Exception\\InvalidArgumentException' => 400,
                'ApiPlatform\\Core\\Exception\\FilterValidationException' => 400,
                'Doctrine\\ORM\\OptimisticLockException' => 409,
            ],
            'api_platform.formats' => [
                'jsonld' => [
                    0 => 'application/ld+json',
                ],
                'json' => [
                    0 => 'application/json',
                ],
                'html' => [
                    0 => 'text/html',
                ],
            ],
            'api_platform.patch_formats' => [
                'json' => [
                    0 => 'application/merge-patch+json',
                ],
            ],
            'api_platform.error_formats' => [
                'jsonproblem' => [
                    0 => 'application/problem+json',
                ],
                'jsonld' => [
                    0 => 'application/ld+json',
                ],
            ],
            'api_platform.allow_plain_identifiers' => false,
            'api_platform.eager_loading.enabled' => true,
            'api_platform.eager_loading.max_joins' => 30,
            'api_platform.eager_loading.fetch_partial' => false,
            'api_platform.eager_loading.force_eager' => true,
            'api_platform.collection.exists_parameter_name' => 'exists',
            'api_platform.collection.order' => 'ASC',
            'api_platform.collection.order_parameter_name' => 'order',
            'api_platform.collection.pagination.enabled' => true,
            'api_platform.collection.pagination.partial' => false,
            'api_platform.collection.pagination.client_enabled' => false,
            'api_platform.collection.pagination.client_items_per_page' => false,
            'api_platform.collection.pagination.client_partial' => false,
            'api_platform.collection.pagination.items_per_page' => 30,
            'api_platform.collection.pagination.maximum_items_per_page' => NULL,
            'api_platform.collection.pagination.page_parameter_name' => 'page',
            'api_platform.collection.pagination.enabled_parameter_name' => 'pagination',
            'api_platform.collection.pagination.items_per_page_parameter_name' => 'itemsPerPage',
            'api_platform.collection.pagination.partial_parameter_name' => 'partial',
            'api_platform.collection.pagination' => [
                'enabled' => true,
                'partial' => false,
                'client_enabled' => false,
                'client_items_per_page' => false,
                'client_partial' => false,
                'items_per_page' => 30,
                'maximum_items_per_page' => NULL,
                'page_parameter_name' => 'page',
                'enabled_parameter_name' => 'pagination',
                'items_per_page_parameter_name' => 'itemsPerPage',
                'partial_parameter_name' => 'partial',
            ],
            'api_platform.http_cache.etag' => true,
            'api_platform.http_cache.max_age' => NULL,
            'api_platform.http_cache.shared_max_age' => NULL,
            'api_platform.http_cache.vary' => [
                0 => 'Accept',
            ],
            'api_platform.http_cache.public' => NULL,
            'api_platform.resource_class_directories' => [
                0 => (\dirname(__DIR__, 4).'/src/Entity'),
                1 => (\dirname(__DIR__, 4).'/vendor/gesdinet/jwt-refresh-token-bundle/Entity'),
            ],
            'api_platform.oauth.enabled' => false,
            'api_platform.oauth.clientId' => '',
            'api_platform.oauth.clientSecret' => '',
            'api_platform.oauth.type' => 'oauth2',
            'api_platform.oauth.flow' => 'application',
            'api_platform.oauth.tokenUrl' => '/oauth/v2/token',
            'api_platform.oauth.authorizationUrl' => '/oauth/v2/auth',
            'api_platform.oauth.scopes' => [

            ],
            'api_platform.swagger.versions' => [
                0 => 3,
            ],
            'api_platform.enable_swagger_ui' => true,
            'api_platform.enable_re_doc' => true,
            'api_platform.swagger.api_keys' => [

            ],
            'api_platform.graphql.enabled' => false,
            'api_platform.graphql.graphiql.enabled' => false,
            'api_platform.graphql.graphql_playground.enabled' => false,
            'api_platform.graphql.collection.pagination' => [
                'enabled' => true,
            ],
            'api_platform.validator.serialize_payload_fields' => [

            ],
            'api_platform.elasticsearch.enabled' => false,
            'lexik_jwt_authentication.token_ttl' => 3600,
            'lexik_jwt_authentication.clock_skew' => 0,
            'lexik_jwt_authentication.user_identity_field' => 'username',
            'lexik_jwt_authentication.user_id_claim' => 'username',
            'lexik_jwt_authentication.encoder.signature_algorithm' => 'RS256',
            'lexik_jwt_authentication.encoder.crypto_engine' => 'openssl',
            'gesdinet_jwt_refresh_token.ttl' => 2592000,
            'gesdinet_jwt_refresh_token.ttl_update' => false,
            'gesdinet_jwt_refresh_token.security.firewall' => 'api',
            'gesdinet_jwt_refresh_token.user_provider' => NULL,
            'gesdinet_jwt_refresh_token.user_identity_field' => 'username',
            'gesdinet_jwt_refresh_token.single_use' => false,
            'gesdinet_jwt_refresh_token.token_parameter_name' => 'refresh_token',
            'gesdinet.jwtrefreshtoken.refresh_token.class' => 'Gesdinet\\JWTRefreshTokenBundle\\Entity\\RefreshToken',
            'gesdinet.jwtrefreshtoken.object_manager.id' => 'doctrine.orm.entity_manager',
            'gesdinet.jwtrefreshtoken.user_checker.id' => 'security.user_checker',
            'swiftmailer.mailer.default.transport.name' => 'dynamic',
            'swiftmailer.mailer.default.spool.enabled' => true,
            'swiftmailer.mailer.default.plugin.impersonate' => NULL,
            'swiftmailer.mailer.default.single_address' => NULL,
            'swiftmailer.mailer.default.delivery.enabled' => true,
            'swiftmailer.spool.enabled' => true,
            'swiftmailer.delivery.enabled' => true,
            'swiftmailer.single_address' => NULL,
            'swiftmailer.mailers' => [
                'default' => 'swiftmailer.mailer.default',
            ],
            'swiftmailer.default_mailer' => 'default',
            'console.command.ids' => [
                0 => 'console.command.public_alias.api_platform.json_schema.json_schema_generate_command',
                1 => 'console.command.public_alias.api_platform.swagger.command.swagger_command',
            ],
        ];
    }

    protected function throw($message)
    {
        throw new RuntimeException($message);
    }
}
