
(function($){
    jQuery.fn.lightTabs = function(options){

        var createTabs = function(){
            tabs = this;
            i = 0;

            showPage = function(i){
                $(tabs).children("div").children("div").hide();
                $(tabs).children("div").children("div").eq(i).show();
                $(tabs).children("ul").children("li").removeClass("active");
                $(tabs).children("ul").children("li").eq(i).addClass("active");
            }
        };
        return this.each(createTabs);
    };
})(jQuery);

Dropzone.autoDiscover = false;
var ready;
ready = function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
};

$(document).ready(ready);
$(document).on('page:load', ready);

$(document).ready(function () {

    $(".tabs").lightTabs();
    $('select').selectpicker();
    // var phoneMask = new IMask(document.getElementById('mobile'), {mask: '+{7}(000)000-00-00'});



    $(".field_of_activity_in").hide();

    $('input[name="trips"]').click(function() {
        if($('.trips1').is(':checked')) {
            $(".howlongtrips").show(600);
        }
        if($('.trips0').is(':checked')) {
            $(".howlongtrips").hide(600);
        }
    });

    $('input[name="learnaboutmba"]').click(function() {
        if($('input[name=learnaboutmba]:checked').val() == 5){
            $(".learnaboutmba").show(600);
        }else{
            $(".learnaboutmba").hide(600);
        }
    });

    $('input[name="source_financing"]').click(function() {
        if($('input[name=source_financing]:checked').val() == 2 || $('input[name=source_financing]:checked').val() == 3){
            $(".source_financing_company").show(600);
        }else{
            $(".source_financing_company").hide(600);
        }
    });


    $(".user-language_of_training_plus").on("click",function(){
        if($(".language_of_training_added").length > 0){
            var id = parseInt($(".language_of_training_added").attr("data-key"));
            if(id!=""){
                $(".language_of_training_added").attr("data-key",id+1);
                $(".language_of_training_added").append('<input type="text" class="label_language_of_training_added_'+id+'">');
            }
        }

    });

    $(".user-language_plus").on("click",function(){
        if($(".language_added").length > 0){
            var id = parseInt($(".language_added").attr("data-key"));
            if(id!=""){
                $(".language_added").attr("data-key",id+1);
                $(".language_added").append('<input type="text" class="col-lg-4 label_language_'+id+'">\n<select class="col-lg-7 select_language_' + id + '"><option value="0">???? ??????????????</option><option value="A1">A1</option><option value="A2">A2</option><option value="B1">B1</option><option value="B2">B2</option><option value="C1">C1</option><option value="C2">C2</option></select>');
            }
        }

    });


    $(".field_of_activity").on("click", function(){
        if($( ".field_of_activity option:selected" ).val() == 1){
            $(".field_of_activity_in").show(600);
        }else if($( ".field_of_activity option:selected" ).val() == 'another'){
            $(".field_of_activity_in").hide(600);
            $(".field_of_activity_another").show(600);
        }else{
            $(".field_of_activity_in").hide(600);
        }
    });




    $("input[name='informationsite[]']").on("click",function(){
        if(!$('.informationsite_another').is(':checked')){
            $(".informationsite_another_input").val("");
        }
    });

    $(".informationsite_another_input").on("click",function(){
        $('.informationsite_another').prop('checked', true);
    });

    $("input[name='mbareasons[]']").on("click",function(){
        if(!$('.mbareasons_another').is(':checked')){
            $(".mbareasons_another_input").val("");
        }
    });

    $(".mbareasons_another_input").on("click",function(){
        $('.mbareasons_another').prop('checked', true);
    });


    $("input[name=advertisingmedia]").click(function(){
        if($("input[name=advertisingmedia]:checked").val() == 'another'){
            $(".advertisingmedia_another").show(600);
        }else{
            $(".advertisingmedia_another").hide();
        }
    });

    $("input[name=learnaboutmba]").click(function(){
        if($("input[name=learnaboutmba]:checked").val() != 5){
            $("input[name=advertisingmedia]").prop('checked',false);
        }
    });

    $("input[name=mba_specialty]").click(function(){
        $("input[name=mba_specialty_in]").prop('checked',false);
        if($("input[name=mba_specialty]:checked").val() == 1){

            $("#label_in_2").hide(600);
            $("#label_in_5").hide(600);
            $("#label_in_6").hide(600);
            $("#label_in_1").show(600);
        }else if($("input[name=mba_specialty]:checked").val() == 2){

            $("#label_in_1").hide(600);
            $("#label_in_6").hide(600);
            $("#label_in_5").hide(600);
            $("#label_in_2").show(600);
        }else if($("input[name=mba_specialty]:checked").val() == 5){

            $("#label_in_1").hide(600);
            $("#label_in_2").hide(600);
            $("#label_in_6").hide(600);
            $("#label_in_5").show(600);
        }else if($("input[name=mba_specialty]:checked").val() == 6){


            $("#label_in_1").hide(600);
            $("#label_in_2").hide(600);
            $("#label_in_5").hide(600);
            $("#label_in_6").show(600);
        }else{
            $("input[name=mba_specialty_in]").prop('checked',false);

            $("#label_in_1").hide(600);
            $("#label_in_2").hide(600);
            $("#label_in_5").hide(600);
            $("#label_in_6").hide(600);
        }
    });

    // $(".next").each(function(){
    //     $(this).on("click",function(){
    //         //console.log($(this).attr("data-key"));
    //         showPage($(this).attr("data-key"));
    //     });
    // });

    $(".check").on("click",function(){
        var errors = "";

        var surname = $(".user-surname").val();
        var name = $(".user-name").val();
        var patronymic = $(".user-patronymic").val();

        var full_name = "s:"+surname+"|n:"+name+"|p:"+patronymic;


        var gender = $(".user-gender option:selected").val();
        var status = $(".user-status").val();
        var children = $(".user-children").val();


        var family = "g:"+gender + "|s:"+status+"|ch:"+children;

        var nationality = $(".user-nationality").val();
        var date_of_birth = $(".user-dateofbirth").val();

        var card_iin = $(".user-cardiin").val();
        var card_number = $(".user-cardnumber").val();
        var card_issued_company = $(".user-cardissuedcompany option:selected").val();
        var card_issued_date = $(".user-cardissueddate").val();

        var card = "i:"+card_iin+"|n:"+card_number+"|c:"+card_issued_company+"|d:"+card_issued_date;

        var document = $(".document_name").val();

        var city = $(".user-city").val();
        var home_adress = $(".user-homeadress").val();
        var mobile = $(".user-mobile").val();
        var email = $(".user-email").val();


        var position = $(".user-position").val();
        var organization_name = $(".user-organization_name").val();
        var legal_address = $(".user-legal_address").val();

        var certificate_work_name = $(".certificate_work_name").val();


        var organization = "p:"+position+"|n:"+organization_name+"|a:"+legal_address+"|c:"+certificate_work_name;


        var experience_since_graduation = $(".user-experience_since_graduation").val();
        var managerial_experience = $(".user-managerial_experience").val();

        var field_of_activity = $(".field_of_activity option:selected").val();

        if(field_of_activity == 1){
            field_of_activity += "|"+$(".field_of_activity_in option:selected").val();
        }else if(field_of_activity == 'another'){
            field_of_activity += "|"+$(".field_of_activity_another").val();
        }

        var experience = "g:"+experience_since_graduation+"|m:"+managerial_experience+"|a:"+field_of_activity;


        var trips = $("input[name=trips]:checked").val();

        if(trips == 1){
            trips += "|many:" + $(".user-how_many_trips").val()+"|longs:"+$(".user-how_long_trips").val();
        }else if(trips === undefined){
            trips = '';
        }

        var summary_name = $(".summary_name").val();


        var begin_training = $(".user-begin_of_training").val();
        var end_training = $(".user-end_of_training").val();
        var university = $(".user-full_name_university").val();
        var academic_degree = $(".user-academic_degree").val();
        var specialty = $(".user-specialty").val();
        var training_language = $(".user-language_of_training").val();

        var language_of_training_added_count = $(".language_of_training_added").attr("data-key");

        if(language_of_training_added_count > 2){
            for (i = 2; i < language_of_training_added_count; i++) {
                training_language  += ","+$(".label_language_of_training_added_"+i).val();
            }
        }

        var degree_name = $(".degree_name").val();

        var education = "b:"+begin_training+"|e:"+end_training + "|u:"+university+"|d:"+academic_degree+"|s:"+specialty+"|l:"+training_language+"|f:"+degree_name;

        var languages = "";

        var language_kaz = $(".user-language_kaz option:selected").val();
        var language_eng = $(".user-language_eng option:selected").val();
        var language_fr = $(".user-language_fr option:selected").val();
        var language_ger = $(".user-language_ger option:selected").val();
        var language_chi = $(".user-language_chi option:selected").val();

        languages = "kz:"+language_kaz+
            "|en:"+language_eng+
            "|fr:"+language_fr+
            "|gr:"+language_ger+
            "|chi:"+language_chi;


        var language_count = 5 + $(".language_added>select").length;

        for (i = 6; i <= language_count; i++) {
            languages += "|"+$(".label_language_"+i).val()+":"+$(".select_language_"+i+" option:selected").val();

        }

        var certificate_language = $(".user-language_certificate option:selected").val();
        var certificate_language_date = $(".user-language_certificate_date").val();

        var certificate_language_scan = $(".certificate_language_name").val();

        var c_language = "c:"+certificate_language+"|d:"+certificate_language_date+"|s:"+certificate_language_scan;


        var text_mba = $(".user-text_mba").val();
        var motivation_essay = $(".motivation_essay_name").val();

        var information_site = "";
        $("input:checkbox[name='informationsite[]']:checked").each(function() {
            if($(this).val() == "another"){
                information_site +="|a:"+$(".informationsite_another_input").val();
            }else{
                information_site += "|"+$(this).val();
            }
        });

        var messengers = "";
        $("input:checkbox[name='messengers[]']:checked").each(function() {
            messengers +="|"+$(this).val();
        });

        var learnaboutmba = $("input[name=learnaboutmba]:checked").val();
        //var advertisingmedia = ""; UNDEFINED
        if(learnaboutmba == 5){
            learnaboutmba = $("input[name=advertisingmedia]:checked").val();
            if(learnaboutmba == "another"){
                learnaboutmba = "|a:"+$(".advertisingmedia_another").val();
            }
        }else if(learnaboutmba === undefined){
            learnaboutmba = '';
        }

        var mba_reasons = "";
        $("input[name='mbareasons[]']:checked").each(function(){

            if($(this).val() == "another"){
                mba_reasons +="|a:"+$(".mbareasons_another_input").val();
            }else{
                mba_reasons += "|"+$(this).val();
            }
        });

        var quality_education = $("input[name=qualityeducation]:checked").val();
        if(quality_education === undefined){
            quality_education = '';
        }
        var training_cost = $("input[name=trainingcost]:checked").val();
        if(training_cost === undefined){
            training_cost = '';
        }
        var large_selection_programs = $("input[name=largeselectionprograms]:checked").val();
        if(large_selection_programs === undefined){
            large_selection_programs = '';
        }
        var university_reputation = $("input[name=universityreputation]:checked").val();
        if(university_reputation === undefined){
            university_reputation = '';
        }
        var university_location = $("input[name=universitylocation]:checked").val();
        if(university_location === undefined){
            university_location = '';
        }
        var flexible_payment_systems = $("input[name=flexiblepaymentsystems]:checked").val();
        if(flexible_payment_systems === undefined){
            flexible_payment_systems = '';
        }
        var availability_discounts = $("input[name=availabilitydiscounts]:checked").val();
        if(availability_discounts === undefined){
            availability_discounts = '';
        }
        var education_form = $("input[name=educationform]:checked").val();
        if(education_form === undefined){
            education_form = '';
        }
        var training_duration = $("input[name=trainingduration]:checked").val();
        if(training_duration === undefined){
            training_duration = '';
        }
        var teachers_composition = $("input[name=teacherscomposition]:checked").val();
        if(teachers_composition === undefined){
            teachers_composition = '';
        }

        var another_characteristics = $("input[name=another_characteristics]").val();
        if(another_characteristics === undefined){
            another_characteristics= '';
        }

        var rating = "qe:"+quality_education+
            "|tc:"+training_cost+
            "|lsp:"+large_selection_programs+
            "|ur:"+university_reputation+
            "|ul:"+university_location+
            "|fps:"+flexible_payment_systems+
            "|ad:"+availability_discounts+
            "|ef:"+education_form+
            "|td:"+training_duration+
            "|tc:"+teachers_composition+
            "|ac:"+another_characteristics;

        var source_financing = $("input[name=source_financing]:checked").val();

        var source_financing_company = "";

        if(source_financing == 2 || source_financing == 3){
            source_financing_company = "requisites:"+$("input[name=source_financing_company_requisites]").val()+
                "|name:"+$("input[name=source_financing_company_name]").val()+
                "|bin:"+$("input[name=source_financing_company_bin]").val()+
                "|rnn:"+$("input[name=source_financing_company_rnn]").val()+
                "|legal_adress:"+$("input[name=source_financing_company_legal_adress]").val()+
                "|phone:"+$("input[name=source_financing_company_phone]").val()+
                "|bank:"+$("input[name=source_financing_company_bank]").val()+
                "|iik:"+$("input[name=source_financing_company_iik]").val()+
                "|email:"+$("input[name=source_financing_company_email]").val()+
                "|site:"+$("input[name=source_financing_company_site]").val()+
                "|head_fio:"+$("input[name=source_financing_company_head_fio]").val()+
                "|head_position:"+$("input[name=source_financing_company_head_position]").val();
        }

        var source_all = "sf:"+source_financing+"|sfc:"+source_financing_company;

        var mba_specialty = $("input[name=mba_specialty]:checked").val();
        var mba_specialty_in = "";
        if(mba_specialty == 1 || mba_specialty == 5 || mba_specialty == 6){
            mba_specialty_in = '';
            mba_specialty_in = $("input[name=mba_specialty_in]:checked").val();
        }

        var mba_all = "ms:"+mba_specialty+"|msi:"+mba_specialty_in;
        console.log(mba_all);
        /* console.log(source_all+"-sa");
        console.log(mba_all+"-ma"); */
        if(surname == ''){
            errors = '??????????????';
        }else if(name == ''){
            errors = '??????';
        }else if(status == ''){
            errors = '???????????????? ?????????????????? ';
        }else if(children == ''){
            errors = '??????-???? ??????????';
        }else if(nationality == ''){
            errors = '??????????????????????';
        }else if(date_of_birth == ''){
            errors = '???????? ????????????????';
        }else if(card_iin == ''){
            errors = '??????';
        }else if(card_number == ''){
            errors = '????. ???????????????? ?????? ?????? ???? ???????????????????? ???';
        }else if(card_issued_date == ''){
            errors = '?????? ?? ?????????? ??????????';
        }else if(city == ''){
            errors = '?????????? ????????????????????';
        }else if(home_adress == ''){
            errors = '???????????????? ??????????';
        }else if(mobile == ''){
            errors = '?????????????????? ??????????????';
        }else if(email == ''){
            errors = '?????????????????????? ??????????';
        }else if(position == ''){
            errors = '???????????????????? ??????????????????';
        }else if(organization_name == ''){
            errors = '???????????????? (???????????? ????????????????????????)';
        }else if(legal_address == ''){
            errors = '?????????????????????? ??????????';
        }else if(experience_since_graduation == ''){
            errors = '?????????? ???????????????? ???????? ???? ?????? ?????????????????? ???????? (???????????? ???????????? ??????????????????????)';
        }else if(managerial_experience == ''){
            errors = '???????????????????????????? ????????';
        }else if(field_of_activity == ''){
            errors = '?????????? ????????????????????????';
        }else if(trips == ''){
            errors = '?????????????? ????????????????????????';
        }else if(begin_training == ''){
            errors = '???????????? ????????????????';
        }else if(end_training == ''){
            errors = '?????????? ????????????????';
        }else if(university == ''){
            errors = '???????????? ???????????????????????? ???????????????? ??????????????????';
        }else if(academic_degree == ''){
            errors = '?????????????????????????? ??????????????/????????????????????????';
        }else if(specialty == ''){
            errors = '??????????????????????????';
        }else if(training_language == ''){
            errors = '???????? ????????????????';
        }else if(certificate_language != 0 && certificate_language_date == ''){
            errors = '???????? ???????????? ??????????????????????';
        }else if(information_site == ''){
            errors = '?????????? ???????????????????????????? ?????????? ???? ???????????????';
        }else if(messengers == ''){
            errors = '???????????? ?????????????????????? ????????????/???????????????????????? ???? ???????????????????????';
        }else if(learnaboutmba == ''){
            errors = '?????? ???? ???????????? ?? ???????????????????? ?????? ???????????? ?????????? ?????????????? AlmaU';
        }else if(mba_reasons == ''){
            errors = '??????????????, ???? ?????????????? ???? ?????????????? ?????? ???????????? ?????????? ?????????????? AlmaU';
        }else if(quality_education == ''){
            errors = '???????????????? ??????????????????????';
        }else if(training_cost == ''){
            errors = '?????????????????? ????????????????';
        }else if(large_selection_programs == ''){
            errors = '?????????????? ?????????? ????????????????';
        }else if(university_reputation == ''){
            errors = '?????????????????? ????????????-?????????? /????????????????????????';
        }else if(university_location == ''){
            errors = '?????????????????????????????????? ????????????-??????????';
        }else if(flexible_payment_systems == ''){
            errors = '?????????????? ???????????? ?????????????? ????????????';
        }else if(availability_discounts == ''){
            errors = '?????????????? ????????????';
        }else if(education_form == ''){
            errors = '?????????? ????????????????';
        }else if(training_duration == ''){
            errors = '?????????????????????????????????? ????????????????';
        }else if(teachers_composition == ''){
            errors = '???????????? ????????????????????????????';
        }else if(source_financing == ''){
            errors = '???????????????? ???????????????????????????? ???????????? ????????????????';
        }else if(mba_specialty == ''){
            errors = '???????????????? ?????????????????? ??????';
        }/* else if(another_characteristics == ''){
            errors = 'another_characteristics';
        } */else{
            errors = '';
        }

        if(!$("input[name=mba_specialty]:checked").val()){
            errors = '???????????????? ?????????????????? ??????';
        }

        if(errors != '' ){
            $("#message").fadeIn("slow").html("<p class='alert alert-danger'>????????????????????, ?????????????????? ???????? :"+errors+"</p>").delay(2000).fadeOut();
        } else {
            $("#message").fadeIn("slow").html("<p class='alert alert-danger' style = 'background: #46c765;color: white;'>???????????????? ???????????? ??????????????</p>").delay(2000).fadeOut();
        }

    });

})