 $('body').tooltip({
     selector: '[rel="tooltip"]'
 });

 $('body').popover({
     selector: '[rel="popover"]',
     html: true
 });

 $(document).ready(function () {
     $('.bxslider').bxSlider({
         slideWidth: 150,
         infiniteLoop: false,
         minSlides: 8,
         maxSlides: 8,
         pager: false,
         hideControlOnEnd: true,
         responsive: true,
         moveSlides: 1,
         mode: 'horizontal'
     });

     var objDiv = document.getElementById
     objDiv.scrollTop = objDiv.scrollHeight;
     $(".myscroll-y").scrollTop($(".myscroll-y").prop('scrollHeight'));
 });


 $(document).ready(function () {
     $('#rooms_table').dataTable();

     var object = $("#rooms-buttons").clone();
     object.removeClass('hidden');
     $('#rooms_table_wrapper .dataTables_filter').prepend(object);

 });




 jQuery('#rooms_table .group-checkable').change(function () {
     var set = jQuery(this).attr("data-set");
     var checked = jQuery(this).is(":checked");
     jQuery(set).each(function () {
         if (checked) {
             $(this).attr("checked", true);
         } else {
             $(this).attr("checked", false);
         }
     });
     jQuery.uniform.update(set);
 });


 $(document).ready(function () {
     $('#users_table').dataTable();

     var object = $("#users-buttons").clone();
     object.removeClass('hidden');
     $('#users_table_wrapper .dataTables_filter').prepend(object);

 });




 jQuery('#users_table .group-checkable').change(function () {
     var set = jQuery(this).attr("data-set");
     var checked = jQuery(this).is(":checked");
     jQuery(set).each(function () {
         if (checked) {
             $(this).attr("checked", true);
         } else {
             $(this).attr("checked", false);
         }
     });
     jQuery.uniform.update(set);
 });



 $(document).ready(function () {
     $('#groups_table').dataTable();

     var object = $("#groups-buttons").clone();
     object.removeClass('hidden');
     $('#groups_table_wrapper .dataTables_filter').prepend(object);

 });




 jQuery('#groups_table .group-checkable').change(function () {
     var set = jQuery(this).attr("data-set");
     var checked = jQuery(this).is(":checked");
     jQuery(set).each(function () {
         if (checked) {
             $(this).attr("checked", true);
         } else {
             $(this).attr("checked", false);
         }
     });
     jQuery.uniform.update(set);
 });



 $(document).ready(function () {
    $("[name='my-checkbox']").bootstrapSwitch();
    $('#editwizard').bootstrapWizard({'tabClass': 'nav nav-tabs'});
     $('#rootwizard').bootstrapWizard({
         onTabShow: function (tab, navigation, index) {
             var $total = navigation.find('li').length;
             var $current = index + 1;
             var $percent = ($current / $total) * 100;
             $('#rootwizard').find('.progress-bar').css({
                 width: $percent + '%'
             });
         }
     });
     $('#blocking_table').dataTable();

     var object = $("#blocking-buttons").clone();
     object.removeClass('hidden');
     $('#blocking_table_wrapper .dataTables_filter').prepend(object);

 });




 jQuery('#blocking_table .group-checkable').change(function () {
     var set = jQuery(this).attr("data-set");
     var checked = jQuery(this).is(":checked");
     jQuery(set).each(function () {
         if (checked) {
             $(this).attr("checked", true);
         } else {
             $(this).attr("checked", false);
         }
     });
     jQuery.uniform.update(set);
 });

 $('#rss-close-button').click(function () {
     $('.rss').css('display', 'none');
     //$('.banner').css('top','50px');

     if ($('.banner').css('display') == 'none') {
         $('.mybody.myrow').css('top', '50px');
     } else {
         $('.banner').css('top', '50px');
         $('.mybody.myrow').css('top', '110px');
     }
     //$('.mybody.myrow').css('top','110px');

 });

 $('#banner-close-button').click(function () {
     $('.banner').css('display', 'none');

     if ($('.rss').css('display') == 'none') {
         $('.mybody.myrow').css('top', '50px');
     } else {
         $('.mybody.myrow').css('top', '80px');
     }

 });

 $(document).on('click', '#rooms_add', function () {
     $('#rooms_display').css('display', 'none');

     $('#rooms_add_tab').css('display', 'block');
 });

  $(document).on('click', '.room-edit', function () {
     $('#rooms_display').css('display', 'none');

     $('#rooms_add_tab').css('display', 'none');

     $('#rooms_edit_tab').css('display', 'block');
 });

    