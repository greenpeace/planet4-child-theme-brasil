<?php
/**
 * Add custom block after all blog posts
 */     

function adicionar_html_condicional($content) {
    if (is_single() && get_post_type() == 'post') {
        // Adicione HTML para todos os posts de blog ao final do conteúdo
        $content .= '<div class="has-background gpbr-custom-blog-block"><p>A região Amazônica está vivendo uma seca histórica, que mostra a gravidade dos eventos climáticos extremos. E milhares de pessoas estão sentindo os efeitos deste desastre na pele. Por isso, o Greenpeace retomou a campanha Asas da Emergência e já levou toneladas de alimentos e outros itens essenciais para as comunidades mais afetadas. Agora, precisamos do seu apoio para chegar mais longe. Por favor, faça uma doação emergencial</p><div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-2"><div class="wp-block-button"><a href="doe.greenpeace.org.br/emergencia-amazonia/p" class="wp-block-button__link wp-element-button">Doe agora</a></div></div></div>
    
        <style>.gpbr-custom-blog-block p {
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