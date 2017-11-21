<?php

  $queriedObject = get_queried_object();



 ?>

<?php if ( ! is_front_page() ) : ?>

 <?php if ( is_page( 'projects' ) ) : ?>
   <nav class="cd-breadcrumb" aria-label="breadcrumb" role="navigation">

     <div class="cd-breadcrumb-top">

       <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="../projects"><?php echo $queriedObject->post_title; ?></a></li>
         <li class="breadcrumb-item active" aria-current="page">Industries</li>
       </ol>

       <img id="breadcrumb_toggle" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"/>

     </div>

     <ul id="industry_list" class="list-unstyled breadcrumb-industry-list" data-expanded="false">
       <?php
          $industries = get_terms(
            array(
              'taxonomy' => 'industries',
              'hide_empty' => false,
            )
          );
        ?>
        <?php foreach ( $industries as $industry ) : ?>
            <li><a href="<?php echo get_term_link( $industry->term_id, $industry->taxonomy ); ?>"><?php echo $industry->name; ?></a></li>
        <?php endforeach; ?>
    </ul>

  </nav>
<?php elseif ( is_page() ) : ?>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?php echo $queriedObject->post_title; ?></li>
      </ol>
   </nav>
 <?php endif; ?>


<?php if ( is_single() && ! is_page() ) :?>

  <?php $post_type = $queriedObject->post_type; ?>


   <nav class="cd-breadcrumb" aria-label="breadcrumb" role="navigation">

     <div class="cd-breadcrumb-top">

     <ol class="breadcrumb">

       <?php if ( $post_type == 'project' ) : ?>

         <?php $term = get_terms( array(
           'taxonomy' => 'industries'
         )); ?>

         <li class="breadcrumb-item"><a href="../projects">Projects</a></li>

         <?php if ( isset( $_GET['t'] ) ) : ?>
           <li class="breadcrumb-item">
             <?php if (  $_GET['t'] == 'i' ) : ?>
               <?php $tax = 'industries'; ?>
              <a href="<?php bloginfo('url'); ?>/projects">Industries</a>
             <?php elseif ( $_GET['t'] == 's' ) : ?>
               <?php $tax = 'services'; ?>
               <a href="<?php bloginfo('url'); ?>/services">Services</a>
             <?php endif; ?>
           </li>
         <?php endif; ?>

         <?php if ( isset( $_GET['o'] ) ) : ?>
           <?php $termID = $_GET['o']; ?>
           <?php $term = get_term_by( 'id', $termID, $tax ); ?>
           <li class="breadcrumb-item">
              <a href="<?php echo get_term_link( $term->term_id, $term->taxonomy ); ?>"><?php echo $term->name; ?></a>
           </li>
         <?php endif; ?>

       <?php elseif ( $post_type == 'post' ) : ?>
         <li class="breadcrumb-item"><a href="../news">News</a></li>
      <?php elseif ( $post_type == 'person' ) : ?>
        <li class="breadcrumb-item"><a href="../people">People</a></li>
      <?php endif; ?>

      <li class="breadcrumb-item active" aria-current="page"><?php echo $queriedObject->post_title; ?></li>


       <!-- <li class="breadcrumb-item active" aria-current="page">This is a single post for post-type:  </li> -->

     </ol>

     <img id="breadcrumb_toggle" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"/>

   </div>

   <ul id="industry_list" class="list-unstyled breadcrumb-industry-list" data-expanded="false">
     <?php
        $taxterms = get_terms(
          array(
            'taxonomy' => $tax,
            'hide_empty' => false,
          )
        );
      ?>
      <?php foreach ( $taxterms as $term ) : ?>
          <li><a href="<?php echo get_term_link( $term->term_id, $term->taxonomy ); ?>"><?php echo $term->name; ?></a></li>
      <?php endforeach; ?>
  </ul>

  </nav>
<?php endif; ?>

<?php


?>


<?php if ( is_tax() ) : ?>

  <?php
    $taxonomy = $queriedObject->taxonomy;
    $taxObject = get_taxonomy( $taxonomy );
    $display_tax = $taxObject->label;
    $display_term = $queriedObject->name;
  ?>

  <nav class="cd-breadcrumb" aria-label="breadcrumb" role="navigation">
    <div class="cd-breadcrumb-top">

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php bloginfo( 'url' ); ?>/projects">
          Projects
        </a>
      </li>
      <li class="breadcrumb-item">
        <a href="<?php bloginfo( 'url' ); ?>/<?php echo $taxObject->name; ?>">
          <?php echo $display_tax; ?>
        </a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        <?php echo $display_term; ?>
      </li>
    </ol>

    <img id="breadcrumb_toggle" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"/>

  </div>


    <ul id="industry_list" class="list-unstyled breadcrumb-industry-list" data-expanded="false">
      <?php
         $industries = get_terms(
           array(
             'taxonomy' => 'industries',
             'hide_empty' => false,
           )
         );
       ?>
       <?php foreach ( $industries as $industry ) : ?>
           <li><a href="<?php echo get_term_link( $industry->term_id, $industry->taxonomy ); ?>"><?php echo $industry->name; ?></a></li>
       <?php endforeach; ?>
   </ul>
  </nav>
<?php endif; ?>
<?php endif; ?>
