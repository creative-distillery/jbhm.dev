<?php

  $queriedObject = get_queried_object();

/* TODO: Make '/projects' a list of all projects, then make "Projects" link in header link to industries archive page.
*/
 ?>

<?php if ( ! is_front_page() ) : ?>

 <?php if ( is_page( 'projects' ) ) : ?>
   <nav class="cd-breadcrumb" id="page-projects-breadcrumbs" aria-label="breadcrumb" role="navigation">

     <div class="cd-breadcrumb-top">

       <ol class="breadcrumb">
         <li class="breadcrumb-item active" aria-current="page">Industries</li>
       </ol>

       <img class="d-none d-md-block" id="breadcrumb_toggle" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"/>

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

<?php elseif ( is_page( 'services' ) ) : ?>

  <nav class="cd-breadcrumb" id="page-services-breadcrumbs" aria-label="breadcrumb" role="navigation">
    <div class="cd-breadcrumb-top">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Services</li>
      </ol>

      <img class="d-none d-md-block" id="breadcrumb_toggle" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"/>

    </div>

    <ul id="industry_list" class="list-unstyled breadcrumb-industry-list" data-expanded="false">
      <?php
         $industries = get_terms(
           array(
             'taxonomy' => 'services',
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
    <nav class="cd-breadcrumb" aria-label="breadcrumb" id="page-breadcrumbs" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><?php echo $queriedObject->post_title; ?></li>
      </ol>
   </nav>
 <?php endif; ?>


<?php if ( is_single() && ! is_page() ) :?>

  <?php $post_type = $queriedObject->post_type; ?>
  <?php $noTax = false; ?>

   <nav class="cd-breadcrumb" id="single-post-type-breadcrumbs" aria-label="breadcrumb" role="navigation">

     <div class="cd-breadcrumb-top">

     <ol class="breadcrumb">

       <?php if ( $post_type == 'project' ) : ?>

         <?php $term = get_terms( array(
           'taxonomy' => 'industries'
         )); ?>

         <li class="breadcrumb-item"><a href="../projects">Projects</a></li>

         <li class="breadcrumb-item">
           <?php if ( isset( $_GET['t'] ) ) : ?>

             <?php if (  $_GET['t'] == 's' ) : ?>
               <?php $tax = 'services'; ?>
               <a href="<?php bloginfo('url'); ?>/services">Services</a>

             <?php else: ?>

               <?php $tax = 'industries'; ?>
               <a href="<?php bloginfo('url'); ?>/projects">Industries</a>

             <?php endif; ?>
           <?php else: ?>
             <!-- NO 'T' QUERY PARAM -->
           <?php endif; ?>
         </li>

         <?php if ( isset( $_GET['o'] ) ) : ?>
           <?php $termID = $_GET['o']; ?>
           <?php $term = get_term_by( 'id', $termID, $tax ); ?>
           <li class="breadcrumb-item">
              <a href="<?php echo get_term_link( $term->term_id, $term->taxonomy ); ?>"><?php echo $term->name; ?></a>
           </li>
         <?php endif; ?>

       <?php elseif ( $post_type == 'post' ) : ?>

         <li class="breadcrumb-item"><a href="../news">News</a></li>
         <?php $noTax = true; ?>

      <?php elseif ( $post_type == 'person' ) : ?>

        <li class="breadcrumb-item"><a href="../people">People</a></li>
        <?php $noTax = true; ?>

      <?php endif; ?>

      <li class="breadcrumb-item active" aria-current="page"><?php echo $queriedObject->post_title; ?></li>


       <!-- <li class="breadcrumb-item active" aria-current="page">This is a single post for post-type:  </li> -->

     </ol>

<?php if ( ! $noTax ) : ?>
     <img class="d-none d-md-block" id="breadcrumb_toggle" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"/>
<?php endif; ?>
   </div>
<?php if ( ! $noTax ) : ?>
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
<?php endif; ?>
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

  <nav class="cd-breadcrumb" id="taxonomy-term-breadcrumbs" aria-label="breadcrumb" role="navigation">
    <div class="cd-breadcrumb-top">
    <ol class="breadcrumb">
      <?php if ( $taxonomy == 'industries' ) : ?>
        <li class="breadcrumb-item">
          <a href="<?php bloginfo( 'url' ); ?>/projects">
            Projects
          </a>
        </li>
      <?php endif; ?>
      <li class="breadcrumb-item" id="taxonomy-breadcrumb">
        <a href="<?php bloginfo( 'url' ); ?>/<?php echo $taxObject->name; ?>">
          <?php echo $display_tax; ?>
        </a>
      </li>
      <li class="breadcrumb-item active" id="taxonomy-term-breadcrumb" aria-current="page">
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
