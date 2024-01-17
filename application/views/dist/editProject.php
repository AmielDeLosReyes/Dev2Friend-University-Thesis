<?php $this->load->view('dist/header'); ?>

<div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
    <div class="container">
        <div class="az-content-left az-content-left-contacts">

            <div class="az-content-breadcrumb lh-1 mg-b-10">
                <span>Main Menu</span>
                <span>Projects</span>
                <span>Edit Project</span>
            </div>
            <h2 class="az-content-title tx-24 mg-b-30">Projects</h2>

            <nav class="nav az-nav-line az-nav-line-chat">
                <a href="<?php echo base_url(); ?>Project" class="nav-link active">All Projects</a>
                <a href="<?php echo base_url(); ?>Members" class="nav-link">Members</a>
                

            </nav>

            <div id="azContactList" class="az-contacts-list">

                <!-- php code to print the information of the church members -->
                <?php
                $newLetter = ($projects[0]->ABBREVIATION)[0];
                $previousLetter = "";

                foreach ($projects as $project):

                    if ($previousLetter != ($project->ABBREVIATION)[0]) {
                        $newLetter = ($project->ABBREVIATION)[0];
                        $previousLetter = $newLetter;
                        echo '<div class="az-contact-label">' . $newLetter . '</div>';
                    }
                    ?>
                    <div class="az-contact-item <?php if ($selectedId == $project->PROJECT_ID) echo 'selected'; ?>" onclick="location.href = '<?php echo base_url(); ?>Project/View/<?php echo $project->PROJECT_ID ?>'">
                        <div class="az-avatar bg-gray-700 online">
                            <!--<img src="../img/faces/face20.jpg" alt="">-->
                            <?php echo $newLetter . ($project->ABBREVIATION)[0]; ?>
                        </div>
                        <div class="az-contact-body">
                            <h6><?php echo $project->ABBREVIATION ?> </h6>
                            <span class="phone"><?php echo $project->DESCRIPTION; ?></span>
                        </div><!-- az-contact-body -->
                        <a href="" class="az-contact-star active"><i class="typcn typcn-star"></i></a>
                    </div><!-- az-contact-item -->

                <?php endforeach; ?>  

            </div><!-- az-contacts-list -->

        </div><!-- az-content-left -->


        <div class="az-content-body pd-lg-l-40 d-flex flex-column">

            <h2 class="az-content-title">Edit Project</h2>

            <!-- START OF THE INPUTS -->


            <!-- FORM FOR INPUTS -->
            <form method="POST" action="<?php echo base_url(); ?>Project/save/<?php echo $selectedProject->PROJECT_ID; ?>" data-parsley-validate>

                <!-- Start of inputs -->
                <div class="az-content-label mg-b-5">Project Name <span class="tx-danger">*</span></div>

                <div class="row row-sm">
                    <div class="col-lg">
                        <input class="form-control" placeholder="Project Name" type="text" value="<?php echo $selectedProject->DESCRIPTION; ?>" name="projectName" required>
                    </div><!-- col -->
                  
                </div><!-- row -->

                <hr class="mg-y-30">

                <div class="az-content-label mg-b-5">Abbreviation</div>

                <div class="row row-sm wd-400">
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <input class="form-control" placeholder="Abbreviation Of Project" type="ABBREVIATION" value="<?php echo $selectedProject->ABBREVIATION; ?>" name="projectAbb">
                    </div><!-- col -->
                </div><!-- row -->

                <hr class="mg-y-30">

                <div class="az-content-label mg-b-5">Project Description</div>

                <div class="row row-sm mg-t-20">
                    <div class="col-lg">
                        <textarea rows="10" cols="20" class="form-control" type="text" placeholder="Project Description" name="projectDesc"><?php echo $selectedProject->PROJECT_DESCRIPTION; ?></textarea>
                    </div>
                </div>

                <hr class="mg-y-30">

                <div class="col-lg-4">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-az-secondary pd-x-25 active">Submit</button>
                        <a href="<?php echo base_url(); ?>Project" class="btn btn-outline-light pd-x-25">Cancel</a>
                    </div>
                </div><!-- col-4 -->

                <div class="ht-40"></div>
            </form>


            <?php $this->load->view('dist/footer'); ?>

            <script>
                // Additional code for adding placeholder in search box of select2
                (function ($) {
                    var Defaults = $.fn.select2.amd.require('select2/defaults');

                    $.extend(Defaults.defaults, {
                        searchInputPlaceholder: ''
                    });

                    var SearchDropdown = $.fn.select2.amd.require('select2/dropdown/search');

                    var _renderSearchDropdown = SearchDropdown.prototype.render;

                    SearchDropdown.prototype.render = function (decorated) {

                        // invoke parent method
                        var $rendered = _renderSearchDropdown.apply(this, Array.prototype.slice.apply(arguments));

                        this.$search.attr('placeholder', this.options.get('searchInputPlaceholder'));

                        return $rendered;
                    };

                })(window.jQuery);
            </script>
            <script>
                $(function () {
                    'use strict'

                    // Toggle Switches
                    $('.az-toggle').on('click', function () {
                        $(this).toggleClass('on');
                    })

                    // Input Masks
                    $('#dateMask').mask('99/99/9999');
                    $('#phoneMask').mask('(999) 999-9999');
                    $('#phoneExtMask').mask('(999) 999-9999? ext 99999');
                    $('#ssnMask').mask('999-99-9999');

                    // Color picker
                    $('#colorpicker').spectrum({
                        color: '#17A2B8'
                    });

                    $('#showAlpha').spectrum({
                        color: 'rgba(23,162,184,0.5)',
                        showAlpha: true
                    });

                    $('#showPaletteOnly').spectrum({
                        showPaletteOnly: true,
                        showPalette: true,
                        color: '#DC3545',
                        palette: [
                            ['#1D2939', '#fff', '#0866C6', '#23BF08', '#F49917'],
                            ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
                        ]
                    });

                    // Datepicker
                    $('.fc-datepicker').datepicker({
                        showOtherMonths: true,
                        selectOtherMonths: true
                    });

                    $('#datepickerNoOfMonths').datepicker({
                        showOtherMonths: true,
                        selectOtherMonths: true,
                        numberOfMonths: 2
                    });

                    $(document).ready(function () {
                        $('.select2').select2({
                            placeholder: 'Choose one',
                            searchInputPlaceholder: 'Search'
                        });

                        $('.select2-no-search').select2({
                            minimumResultsForSearch: Infinity,
                            placeholder: 'Choose one'
                        });
                    });

                });
            </script>


