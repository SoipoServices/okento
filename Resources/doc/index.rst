Config:

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
