<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_term_options' );
function crb_term_options() {
  Container::make( 'term_meta', __( 'Term Options', 'crb' ) )
  ->add_fields( array(
    Field::make( 'html', 'crb_heading_info', __( 'INFO Heading' ) )->set_html( sprintf( '<b>INFO</b>' ) ),
    Field::make( 'image', 'crb_category_img', 'Заглавная картинка' ),
    Field::make( 'image', 'crb_category_icon', 'Icon' )->set_value_type( 'url'),
    Field::make( 'html', 'crb_heading_seo', __( 'SEO Heading' ) )->set_html( sprintf( '<b>SEO</b>' ) ),
    Field::make( 'text', 'crb_category_heading', 'h1' ),
    Field::make( 'text', 'crb_category_seo_title', 'Title' ),
    Field::make( 'text', 'crb_category_seo_description', 'Description' ),
    Field::make( 'textarea', 'crb_category_seo_keywords', 'Keywords' ),
  ));

  Container::make( 'term_meta', __( 'City Options', 'crb' ) )
  ->where( 'term_taxonomy', '=', 'r' ) // only show our new field for categories
  ->add_fields( array(
    Field::make( 'rich_text', 'crb_r_description', 'Опис' ),
    Field::make( 'rich_text', 'crb_r_seotext', 'SEO Текст' ),
  ));
}

?>
