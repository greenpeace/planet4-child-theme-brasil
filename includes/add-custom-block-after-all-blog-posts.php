<?php
/**
 * Add custom block after all blog posts
 */     

function adicionar_html_condicional($content) {
    if (is_single() && get_post_type() == 'post') {
        // Adicione HTML para todos os posts de blog ao final do conteúdo
        $content .= '<div class="has-background gpbr-custom-blog-block"><p>O Rio Grande do Sul enfrenta uma tragédia climática sem precedentes, com mais de 1 milhão de pessoas diretamente impactadas pelas fortes chuvas. Nossa campanha está destinando recursos para a compra e entrega de suprimentos emergenciais e apoiando cozinhas solidárias. Precisamos da sua solidariedade nesse momento tão crítico. Clique abaixo e doe agora.</p><div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-2"><div class="wp-block-button"><a target="_blank" href="https://doe.greenpeace.org.br/emergencia-rio-grande-do-sul/p?appeal=22424&entrypoint=p4_blog" class="wp-block-button__link wp-element-button">Doe agora</a></div></div></div>

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
