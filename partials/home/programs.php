<style type="text/css">

    @media(min-width:981px){
        .programs-blurb-content{
            min-height: 220px;
        }
    }

    .tab {
      overflow: hidden;
    }
    
    .tabcontent {
      display: none;
    }

    .tablinks{
        border: none;
        border-top: 1px solid #ddd;
        padding: 1rem;;
        position: relative;
        cursor: pointer;
    }

    .tablinks:hover {
        color: var(--color-purple) !important;
    }

    .tablinks:first-child {
        border-top: none;
    }

    @media(min-width:981px){
        .tablinks:after{
            content: '';
            display: block;
            position: absolute;
            right: -1rem;
            top: 50%;
            width: 0;
            height: 0;
            border-style: solid;
            margin-top: -20px;
            border-width: 20px 0 20px 20px;
            opacity: 0;
            transition: 0.25s all ease;
            border-color: transparent transparent transparent #72246c;
        }

        .tablinks.active:after{
            opacity: 1;
        }
    }

    .tablinks.active{
        font-weight: 800;
        color: var(--color-purple) !important;
    }

    .subprogram {
        padding-top: 1rem;
        padding-bottom: 1rem;
        border-top: 1px solid #ddd;
    }

    .subprogram:first-child {
        border-top: none;
    }

     @media(min-width:768px){

        .subprogram {
            border-top: none;
            padding-top: 0;
            padding-bottom: 0;
            border-left: 1px solid #ddd;
        }
        
        .subprogram:first-child {
            border-left: none;
        }
    }
</style>


<section class="mt-16 mb-0 pb-8">
    <div class="container">
        <div class="d-lg-flex flex-items-start mb-8">

            <div class="w-lg-30">
                <div class="programs-blurb-content">
                    <?php if( get_field('programs_title') ): ?>
                        <h1 class="mt-2 text-lg"><?php the_field('programs_title'); ?></h1>
                    <?php endif; ?>
                    <?php if( get_field('programs_content') ): ?>
                        <div class="mt-2 mb-4 text-dark"><?php the_field('programs_content'); ?></div>
                    <?php endif; ?>
                </div>

                <div class="my-4">
                    <?php
                        // Retrieve ACF repeater field values
                        if (have_rows('programs')) {
                            $count = 1;
                            while (have_rows('programs')) {
                            the_row();
                                $panel_title = get_sub_field('program_title');
                                $active_class = ($count === 1) ? ' active' : '';
                            ?>
                            <button 
                                class="d-block my-1 w-100 bg-transparent text-left text-md color-deep-purple font-heading tablinks tablinks<?php echo $active_class; ?>" 
                                onclick="openTab(event, 'panel<?php echo $count; ?>')">
                                <?php echo $panel_title; ?>
                            </button>
                            <?php
                            $count++;
                            }
                        }
                    ?>
                </div>

                <?php if( get_field('small_message') ): ?>
                    <div class="mb-4 mt-4"><?php the_field('small_message'); ?></div>
                <?php endif; ?>

            </div>


            <div class="w-lg-70">

                <div class="programs-panel-wrapper bg-white rounded overflow-hidden shadow h-100 w-100">
                    
                    <?php
                        // Reset the ACF repeater field pointer
                        reset_rows('programs');

                        // Generate the panel content
                        if (have_rows('programs')) {
                        $count = 1;
                        while (have_rows('programs')) {
                        the_row();
                            $display_style = ($count === 1) ? 'block' : 'none';
                            $image = get_sub_field('program_image');
                            $cta_button = get_sub_field('cta_button');
                        ?>

                        <div id="panel<?php echo $count; ?>" class="tabcontent relative" style="display: <?php echo $display_style; ?>;">
                            
                            <img 
                                src="<?php echo $image['url'];?>" 
                                alt="<?php echo $image['alt'];?>" 
                                class="w-100 object-fit-cover background-position-center " 
                                style="height:230px;" />

                            <div class="d-md-flex py-6 px-4" style="min-height:300px;">
                                <div class="d-md-flex" style="flex: 1;">
                                    <?php
                                    // Check for the nested repeater field "sub_programs"
                                    if (have_rows('sub_programs')) {
                                        while (have_rows('sub_programs')) {
                                        the_row();
                                        $icon = get_sub_field('icon');
                                        $title = get_sub_field('title');
                                        $subtitle = get_sub_field('subtitle');
                                        $links = get_sub_field('links');
                                        ?>
                                    
                                        <div class="subprogram px-4">
                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                            <h4 class="text-md mt-1 text-deep-purple fw-medium" ><?php echo $title; ?></h4>
                                            <p class="text-sm text-dark"><?php echo $subtitle; ?></p>
                                            <?php
                                                // Check for the nested repeater field "links"
                                                if (have_rows('links')) {
                                                echo '<div class="my-3">';
                                                while (have_rows('links')) {
                                                    the_row();
                                                    $link = get_sub_field('link');
                                                ?>
                                                <div class="my-1">
                                                    <a class="uppercase fw-bold text-xs text-dark text-deep-purple-hover text-underline-hover:hover" href="<?php echo $link['url']; ?>">
                                                        <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.80376 4.30949C6.18944 4.69916 6.18944 5.32672 5.80376 5.71639L2.21074 9.34665C1.58228 9.98162 0.499999 9.53659 0.5 8.64319L0.5 1.38268C0.5 0.489291 1.58228 0.0442605 2.21074 0.679232L5.80376 4.30949Z" fill="#211747"/>
                                                        </svg>
                                                        <span class="ml-1"><?php echo $link['title']; ?></span>
                                                    </a>
                                                </div>
                                            <?php }
                                                echo '</div>';
                                            }?>
                                        </div>

                                    <?php }}?>
                                </div>
                            </div>
                            
                            <?php if( get_sub_field('cta_message') || get_sub_field('cta_button')):?>
                                <div class="bg-purple text-white py-4 px-6 d-md-flex flex-column flex-md-row flex-items-center flex-justify-between ">

                                    <?php if( get_sub_field('cta_message')):?>
                                        <?php echo get_sub_field('cta_message');?>
                                    <?php endif;?>

                                    <?php if(get_sub_field('cta_button')):?>
                                    <?php $cta_button = get_sub_field('cta_button');?>
                                    <a style="min-width:128px;" href="<?php echo $cta_button['url'] ;?>" class="mt-2 mt-md-0 transition opacity-1 opacity-075-hover d-block border border-white uppercase bg-white text-purple py-2 px-4 fw-bold text-xs ml-md-4">
                                        <span class="mr-1"><?php echo $cta_button['title'] ;?></span>
                                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.46648 4.29655C5.85216 4.68622 5.85216 5.31378 5.46648 5.70345L1.87346 9.33371C1.245 9.96868 0.162719 9.52365 0.162719 8.63025L0.16272 1.36974C0.16272 0.476352 1.245 0.0313211 1.87346 0.666293L5.46648 4.29655Z" fill="#72246c"/>
                                        </svg>
                                    </a>
                                    <?php endif;?>
                                </div>
                            <?php endif;?>
                        </div>
                    
                    <?php $count++;}}?>

                </div>
            </div>


        </div>
    </div>
</section>


<script type="text/javascript">
  function openTab(evt, panelName) {
    var i, tabcontent, tablinks;
  
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    document.getElementById(panelName).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script>