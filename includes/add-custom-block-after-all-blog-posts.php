<?php
/**
 * Add custom block after all blog posts
 */     

function adicionar_html_condicional($content) {
    if (is_single() && get_post_type() == 'post') {
        // Adicione HTML para todos os posts de blog ao final do conteúdo
        $content .= '<div class="has-background gpbr-custom-blog-block"><p>Sem a ajuda de pessoas como você, nosso trabalho não seria possível. O Greenpeace Brasil é uma organização independente - não aceitamos recursos de empresas, governos ou partidos políticos. Por favor, faça uma doação hoje mesmo e nos ajude a ampliar nosso trabalho de pesquisa, monitoramento e denúncia de crimes ambientais. Clique abaixo e faça a diferença!</p><div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-2"><div class="wp-block-button"><a href="https://doe.greenpeace.com.br/?cc=701Pm00000T8VcFIAV&entrypoint=blog_donate" class="wp-block-button__link wp-element-button">Doe agora</a></div></div></div>
        <style>
        .gpbr-custom-blog-block p {
            padding-top: 2em !important;
            padding-left: 2em !important;
            padding-right: 2em !important;
        }
        .gpbr-custom-blog-block {
            border: dotted 3px #1f4912;
            background-color: #d9f1c55e !important;
        }
        .gpbr-custom-blog-block .wp-element-button {
            margin-bottom: 2em !important;
            color: #fff !important;
            background-color: #1f4912 !important;
        }
        </style>
        ';
    }

    return $content;
}

add_filter('the_content', 'adicionar_html_condicional');
