To use this bundle first make sure to install assetic (symfony 3.*) and kpnMenuBundle

$ composer require symfony/assetic-bundle

// app/AppKernel.php
new Symfony\Bundle\AsseticBundle\AsseticBundle(),

# app/config/config.yml
assetic:
    debug:          '%kernel.debug%'
    use_controller: '%kernel.debug%'
    filters:
        cssrewrite: ~

$ composer require knplabs/knp-menu-bundle

// app/AppKernel.php
 new Knp\Bundle\MenuBundle\KnpMenuBundle(),


 # app/config/config.yml
knp_menu:
    # use "twig: false" to disable the Twig extension and the TwigRenderer
    twig:
        template: knp_menu.html.twig
    #  if true, enables the helper for PHP templates
    templating: false
    # the renderer to use, list is also available by default
    default_renderer: twig


Add the config:

 # app/config/config.yml
soipo_okento_admin:
    email: "test@test.com"

# Assetic Configuration
assetic:
    bundles:        [SoipoOkentoAdminBundle]
    assets:
        bootstrap_fonts_woff:
                    inputs: '@SoipoOkentoAdminBundle/Resources/public/fonts/glyphicons-halflings-regular.woff'
                    output: fonts/glyphicons-halflings-regular.woff
        bootstrap_fonts_woff2:
                    inputs:  '@SoipoOkentoAdminBundle/Resources/public/fonts/glyphicons-halflings-regular.woff2'
                    output: fonts/glyphicons-halflings-regular.woff2
        bootstrap_fonts_ttf:
                    inputs:  '@SoipoOkentoAdminBundle/Resources/public/fonts/glyphicons-halflings-regular.ttf'
                    output: fonts/glyphicons-halflings-regular.ttf
        bootstrap_fonts_svg:
                    inputs:  '@SoipoOkentoAdminBundle/Resources/public/fonts/glyphicons-halflings-regular.svg'
                    output: fonts/glyphicons-halflings-regular.svg
        bootstrap_fonts_eot:
                    inputs:  '@SoipoOkentoAdminBundle/Resources/public/fonts/glyphicons-halflings-regular.eot'
                    output: fonts/glyphicons-halflings-regular.eot

And in the routing.yml file:

soipo_okento_admin:
    resource: "@SoipoOkentoAdminBundle/Resources/config/routing.yml"
    prefix:   /
