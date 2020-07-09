<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/showcategory' => [[['_route' => 'category_indexshow', '_controller' => 'App\\Controller\\CategorieController::indexCategory'], null, ['GET' => 0], null, false, false, null]],
        '/api/newCategorie' => [[['_route' => 'category_new', '_controller' => 'App\\Controller\\CategorieController::newCategory'], null, ['POST' => 0], null, false, false, null]],
        '/api/modifierCategorie' => [[['_route' => 'category_edit', '_controller' => 'App\\Controller\\CategorieController::editercategory'], null, ['POST' => 0], null, false, false, null]],
        '/api/client' => [[['_route' => 'client_index', '_controller' => 'App\\Controller\\ClientController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/client/new' => [[['_route' => 'client_new', '_controller' => 'App\\Controller\\ClientController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/fournisseur' => [[['_route' => 'fournisseur_index', '_controller' => 'App\\Controller\\FournisseurController::index'], null, ['GET' => 0], null, true, false, null]],
        '/api/fournisseur/new' => [[['_route' => 'fournisseur_new', '_controller' => 'App\\Controller\\FournisseurController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/api/fournisseur/caisse/fournisseur' => [[['_route' => 'caisse_fournisseur', '_controller' => 'App\\Controller\\FournisseurController::caisse'], null, ['GET' => 0], null, false, false, null]],
        '/api/produit' => [[['_route' => 'produit', '_controller' => 'App\\Controller\\ProduitController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/newProduit' => [[['_route' => 'produity_new', '_controller' => 'App\\Controller\\ProduitController::newProduits'], null, ['POST' => 0], null, false, false, null]],
        '/api/produit/mass' => [[['_route' => 'mass_produit', '_controller' => 'App\\Controller\\ProduitController::mass'], null, ['POST' => 0], null, false, false, null]],
        '/api/vente/mass' => [[['_route' => 'mass_vente', '_controller' => 'App\\Controller\\VenteController::mass'], null, ['POST' => 0], null, false, false, null]],
        '/api/totaluser' => [[['_route' => 'api_users_total_user_collection', '_controller' => 'App\\Controller\\CountUserController', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'total_user'], null, ['GET' => 0], null, false, false, null]],
        '/api/token/refresh' => [[['_route' => 'gesdinet_jwt_refresh_token', '_controller' => 'gesdinet.jwtrefreshtoken::refresh'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/api/(?'
                    .'|archiverCategory/([^/]++)(*:202)'
                    .'|client/([^/]++)(?'
                        .'|(*:228)'
                        .'|/edit(*:241)'
                        .'|(*:249)'
                    .')'
                    .'|fournisseur/(?'
                        .'|([^/]++)(?'
                            .'|(*:284)'
                            .'|/edit(*:297)'
                            .'|(*:305)'
                        .')'
                        .'|mass(*:318)'
                    .')'
                .')'
                .'|/((?!api|_(?:profiler|wdt)).*)(*:358)'
                .'|/api(?'
                    .'|/(?'
                        .'|modifierproduit/([^/]++)(*:401)'
                        .'|supprimmerCategory/([^/]++)(*:436)'
                    .')'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:473)'
                    .'|/(?'
                        .'|d(?'
                            .'|ocs(?:\\.([^/]++))?(*:507)'
                            .'|epots(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:541)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:579)'
                                .')'
                            .')'
                        .')'
                        .'|c(?'
                            .'|ontexts/(.+)(?:\\.([^/]++))?(*:621)'
                            .'|lients(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:656)'
                                .')'
                                .'|/(?'
                                    .'|([^/]++)/([^/]++)(*:686)'
                                    .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:722)'
                                    .')'
                                .')'
                            .')'
                            .'|ategories(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:763)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:801)'
                                .')'
                            .')'
                        .')'
                        .'|vente(?'
                            .'|s(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:842)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:880)'
                                .')'
                            .')'
                            .'|_produits(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:920)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:958)'
                                .')'
                            .')'
                        .')'
                        .'|a(?'
                            .'|utres_operations(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1010)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1049)'
                                .')'
                            .')'
                            .'|ccess/fournisseurs/([^/]++)(*:1087)'
                        .')'
                        .'|produits(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1126)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1165)'
                            .')'
                        .')'
                        .'|users(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1202)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1241)'
                            .')'
                        .')'
                        .'|fournisseurs(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1285)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1324)'
                            .')'
                        .')'
                    .')'
                .')'
                .'|/login(*:1343)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        202 => [[['_route' => 'archiverCategory', '_controller' => 'App\\Controller\\CategorieController::archiverCategory'], ['id'], ['DELETE' => 0], null, false, true, null]],
        228 => [[['_route' => 'client_show', '_controller' => 'App\\Controller\\ClientController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        241 => [[['_route' => 'client_edit', '_controller' => 'App\\Controller\\ClientController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        249 => [[['_route' => 'client_delete', '_controller' => 'App\\Controller\\ClientController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        284 => [[['_route' => 'fournisseur_show', '_controller' => 'App\\Controller\\FournisseurController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        297 => [[['_route' => 'fournisseur_edit', '_controller' => 'App\\Controller\\FournisseurController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        305 => [[['_route' => 'fournisseur_delete', '_controller' => 'App\\Controller\\FournisseurController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        318 => [[['_route' => 'mass_fournisseur', '_controller' => 'App\\Controller\\FournisseurController::mass'], [], ['POST' => 0], null, false, false, null]],
        358 => [[['_route' => 'index', '_controller' => 'App\\Controller\\HomeController::index'], ['vueRouting'], null, null, false, true, null]],
        401 => [[['_route' => 'produit_edit', '_controller' => 'App\\Controller\\ProduitController::modifierproduit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        436 => [[['_route' => 'cat_delete', '_controller' => 'App\\Controller\\ProduitController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        473 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        507 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        541 => [
            [['_route' => 'api_depots_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_depots_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        579 => [
            [['_route' => 'api_depots_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_depots_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_depots_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_depots_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Depot', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        621 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        656 => [
            [['_route' => 'api_clients_GET_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_collection_operation_name' => 'GET'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_clients_POST_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_collection_operation_name' => 'POST'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        686 => [[['_route' => 'api_clients_get_client_collection', '_controller' => 'App\\Controller\\ClientDateInterval', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_collection_operation_name' => 'get_client'], ['dateStart', 'dateEnd'], ['GET' => 0], null, false, true, null]],
        722 => [
            [['_route' => 'api_clients_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_clients_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_clients_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_clients_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Client', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        763 => [
            [['_route' => 'api_categories_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Categorie', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_categories_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Categorie', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        801 => [
            [['_route' => 'api_categories_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Categorie', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_categories_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Categorie', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_categories_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Categorie', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_categories_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Categorie', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        842 => [
            [['_route' => 'api_ventes_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Vente', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_ventes_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Vente', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        880 => [
            [['_route' => 'api_ventes_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Vente', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_ventes_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Vente', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_ventes_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Vente', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_ventes_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Vente', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        920 => [
            [['_route' => 'api_vente_produits_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\VenteProduit', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_vente_produits_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\VenteProduit', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        958 => [
            [['_route' => 'api_vente_produits_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\VenteProduit', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_vente_produits_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\VenteProduit', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_vente_produits_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\VenteProduit', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_vente_produits_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\VenteProduit', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1010 => [
            [['_route' => 'api_autres_operations_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\AutresOperation', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_autres_operations_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\AutresOperation', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1049 => [
            [['_route' => 'api_autres_operations_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\AutresOperation', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_autres_operations_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\AutresOperation', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_autres_operations_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\AutresOperation', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_autres_operations_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\AutresOperation', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1087 => [[['_route' => 'api_fournisseurs_get_fournisseur_item', '_controller' => 'App\\Controller\\AccessFournisseur', '_format' => null, '_api_resource_class' => 'App\\Entity\\Fournisseur', '_api_item_operation_name' => 'get_fournisseur'], ['id'], ['GET' => 0], null, false, true, null]],
        1126 => [
            [['_route' => 'api_produits_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Produit', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_produits_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Produit', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1165 => [
            [['_route' => 'api_produits_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Produit', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_produits_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Produit', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_produits_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Produit', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_produits_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Produit', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1202 => [
            [['_route' => 'api_users_GET_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'GET'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_POST_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'POST'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1241 => [
            [['_route' => 'api_users_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_users_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_users_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1285 => [
            [['_route' => 'api_fournisseurs_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Fournisseur', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_fournisseurs_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Fournisseur', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1324 => [
            [['_route' => 'api_fournisseurs_GET_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Fournisseur', '_api_item_operation_name' => 'GET'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_fournisseurs_PUT_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Fournisseur', '_api_item_operation_name' => 'PUT'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_fournisseurs_DELETE_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Fournisseur', '_api_item_operation_name' => 'DELETE'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
        ],
        1343 => [
            [['_route' => 'api_login_check'], [], ['POST' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
