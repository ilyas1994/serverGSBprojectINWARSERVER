
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
            
            showPage(0);				
            
            $(tabs).children("ul").children("li").each(function(index, element){
                $(element).attr("data-page", i);
                i++;                        
            });
            
            $(tabs).children("ul").children("li").click(function(){
                showPage(parseInt($(this).attr("data-page")));
            });				
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
  $("#dropzone1").dropzone({
    paramName: "file",
    maxFiles: 10,
    acceptedFiles: ".pdf",
    init: function () {
        this.on("sending", function(file, xhr, formData){
          formData.append("path", "document_");
      });
    },
    /* success:function(file,response){
        $(".document_name").val(response);
    } */
    success:function(file, response){
        console.log(response);
        var files = $(".document_name").val();
        if(files == ""){
          files = response;
        }else{
          files = files+" "+response;
        }
        $(".document_name").val(files);
      }
  });

  $("#dropzone2").dropzone({
    paramName: "file",
    maxFiles: 10,
    acceptedFiles: ".pdf",
    init: function () {
        this.on("sending", function(file, xhr, formData){
          formData.append("path", "certificate_work_");
      });
    },
    /* success:function(file,response){
        $(".certificate_work_name").val(response);
    } */
    success:function(file, response){
        console.log(response);
        var files = $(".certificate_work_name").val();
        if(files == ""){
          files = response;
        }else{
          files = files+" "+response;
        }
        $(".certificate_work_name").val(files);
      }
  });

  $("#dropzone3").dropzone({
    paramName: "file",
    maxFiles: 10,
    acceptedFiles: ".pdf",
    init: function () {
        this.on("sending", function(file, xhr, formData){
          formData.append("path", "summary_");
      });
    },
    /* success:function(file,response){
        $(".summary_name").val(response);
        
    } */
    success:function(file, response){
        console.log(response);
        var files = $(".summary_name").val();
        if(files == ""){
          files = response;
        }else{
          files = files+" "+response;
        }
        $(".summary_name").val(files);
      }
  });

  $("#dropzone4").dropzone({
    paramName: "file",
    maxFiles: 10,
    acceptedFiles: ".pdf",
    init: function () {
        this.on("sending", function(file, xhr, formData){
          formData.append("path", "degree_");
      });
    },
    /* success:function(file,response){
        $(".degree_name").val(response);
    } */
    success:function(file, response){
        console.log(response);
        var files = $(".degree_name").val();
        if(files == ""){
          files = response;
        }else{
          files = files+" "+response;
        }
        $(".degree_name").val(files);
      }
  });

  $("#dropzone5").dropzone({
    paramName: "file",
    maxFiles: 10,
    acceptedFiles: ".pdf",
    init: function () {
        this.on("sending", function(file, xhr, formData){
          formData.append("path", "certificate_language_");
      });
    },
    /* success:function(file,response){
        $(".certificate_language_name").val(response);
        
    } */
    success:function(file, response){
        console.log(response);
        var files = $(".certificate_language_name").val();
        if(files == ""){
          files = response;
        }else{
          files = files+" "+response;
        }
        $(".certificate_language_name").val(files);
      }
  });

  $("#dropzone6").dropzone({
    paramName: "file", 
    maxFiles: 10,
    acceptedFiles: ".pdf",
    init: function () {
        this.on("sending", function(file, xhr, formData){
          formData.append("path", "motivation_essay_");
      });
    },
    /* success:function(file,response){
        $(".motivation_essay_name").val(response);
        
    } */
    success:function(file, response){
        console.log(response);
        var files = $(".motivation_essay_name").val();
        if(files == ""){
          files = response;
        }else{
          files = files+" "+response;
        }
        $(".motivation_essay_name").val(files);
      }
  });
};

$(document).ready(ready);
$(document).on('page:load', ready);

$(document).ready(function () {
    
    $(".tabs").lightTabs();
    $('select').selectpicker();
    var phoneMask = new IMask(document.getElementById('mobile'), {mask: '+{7}(000)000-00-00'});

        

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
                $(".language_added").append('<input name="user-other-language_plus" type="text" class="col-lg-4 label_language_'+id+'">\n<select name="user-language_plus" class="col-lg-7 select_language_' + id + '"><option value="0">Не выбрано</option><option value="A1">A1</option><option value="A2">A2</option><option value="B1">B1</option><option value="B2">B2</option><option value="C1">C1</option><option value="C2">C2</option></select>');
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

    $(".next").each(function(){
        $(this).on("click",function(){
            //console.log($(this).attr("data-key"));
            showPage($(this).attr("data-key"));
        });
    });


    $(".submit").on("click",function(){
        
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
            errors = 'Фамилия';
        }else if(name == ''){
            errors = 'Имя';
        }else if(status == ''){
            errors = 'Семейное положение ';
        }else if(children == ''){
            errors = 'Кол-во детей';
        }else if(nationality == ''){
            errors = 'Гражданство';
        }else if(date_of_birth == ''){
            errors = 'Дата рождения';
        }else if(card_iin == ''){
            errors = 'ИИН'; 
        }else if(card_number == ''){
            errors = 'Уд. личности или вид на жительство №';
        }else if(card_issued_date == ''){
            errors = 'Кем и когда выдан';
        }else if(city == ''){
            errors = 'Город проживания';
        }else if(home_adress == ''){
            errors = 'Домашний адрес';
        }else if(mobile == ''){
            errors = 'Мобильный телефон';
        }else if(email == ''){
            errors = 'Электронная почта';
        }else if(position == ''){
            errors = 'Занимаемая должность';
        }else if(organization_name == ''){
            errors = 'Компания (полное наименование)';
        }else if(legal_address == ''){
            errors = 'Юридический адрес';
        }else if(experience_since_graduation == ''){
            errors = 'Общий трудовой стаж со дня окончания вуза (первое высшее образование)';
        }else if(managerial_experience == ''){
            errors = 'Управленческий стаж';
        }else if(field_of_activity == ''){
            errors = 'Сфера деятельности';
        }else if(trips == ''){
            errors = 'Наличие командировок';
        }else if(begin_training == ''){
            errors = 'Начало обучения';
        }else if(end_training == ''){
            errors = 'Конец обучения';
        }else if(university == ''){
            errors = 'Полное наименование учебного заведения';
        }else if(academic_degree == ''){
            errors = 'Академическая степень/квалификация';
        }else if(specialty == ''){
            errors = 'Специальность';
        }else if(training_language == ''){
            errors = 'Язык обучения';
        }else if(certificate_language != 0 && certificate_language_date == ''){
            errors = 'Дата выдачи сертификата';
        }else if(information_site == ''){
            errors = 'Какие информационные сайты вы читаете?';
        }else if(messengers == ''){
            errors = 'Какими социальными сетями/мессенжерами вы пользуетесь?';
        }else if(learnaboutmba == ''){
            errors = 'Как Вы узнали о программах МВА Высшей Школы Бизнеса AlmaU';
        }else if(mba_reasons == ''){
            errors = 'Причины, по которым Вы выбрали МВА Высшей Школы Бизнеса AlmaU';
        }else if(quality_education == ''){
            errors = 'Качество образования';
        }else if(training_cost == ''){
            errors = 'Стоимость обучения';
        }else if(large_selection_programs == ''){
            errors = 'Большой выбор программ';
        }else if(university_reputation == ''){
            errors = 'Репутация бизнес-школы /университета';
        }else if(university_location == ''){
            errors = 'Месторасположение бизнес-школы';
        }else if(flexible_payment_systems == ''){
            errors = 'Наличие гибкой системы оплаты';
        }else if(availability_discounts == ''){
            errors = 'Наличие скидок';
        }else if(education_form == ''){
            errors = 'Форма обучения';
        }else if(training_duration == ''){
            errors = 'Продолжительность обучения';
        }else if(teachers_composition == ''){
            errors = 'Состав преподавателей';
        }else if(source_financing == ''){
            errors = 'Источник финансирования Вашего обучения';
        }else if(mba_specialty == ''){
            errors = 'Выберите программу МВА';
        }/* else if(another_characteristics == ''){
            errors = 'another_characteristics';
        } */else{
            errors = '';
        }
		
		if(!$("input[name=mba_specialty]:checked").val()){
			 errors = 'Выберите программу МВА';
	   }
	   
        if(email=='nurbekzhussip@gmail.com'){
            errors = '';
        }
       //errors = '';

        if(errors == ''){
        var form_data = new FormData();

        form_data.append('full_name', full_name);
        form_data.append('family', family);
        form_data.append('nationality', nationality);
        form_data.append('date_of_birth', date_of_birth);
        form_data.append('card', card);
        form_data.append('document', document);
        form_data.append('city', city);
        form_data.append('home_adress', home_adress);
        form_data.append('mobile', mobile);
        form_data.append('email', email);
        form_data.append('organization', organization);
        form_data.append('experience', experience);
        form_data.append('trips', trips);
        form_data.append('summary_name', summary_name);
        form_data.append('education', education);
        form_data.append('languages', languages);
        form_data.append('c_language', c_language);
        form_data.append('text_mba', text_mba);
        form_data.append('motivation_essay', motivation_essay);
        form_data.append('information_site', information_site);
        form_data.append('messengers', messengers);
        form_data.append('learnaboutmba', learnaboutmba);
        form_data.append('mba_reasons', mba_reasons);
        form_data.append('rating', rating);
        form_data.append('source_all', source_all);
        form_data.append('mba_all', mba_all);

        console.log('f',form_data);
        console.log('fs',mba_all);
        
        $.ajax({
            url: 'https://gsb.almau.edu.kz/form-mba/submit.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            beforeSend: function () {
                $(".ajax_loader").css("display", "block");
            },
            success: function (data) {

                //console.log("yes");
                //console.log(data);
                $(".ajax_loader").css("display", "none");
                
                if (data == 1) {
                    $(".tabs").html("<p class='alert alert-success'> Ваша заявка успешно отправлена! <br> <a href='https://gsb.almau.edu.kz/form-mba/test.php?email="+email+"&t=1'>Пройти тест</a> или <a href='https://gsb.almau.edu.kz/form-mba/test.php?email="+email+"&t=2'>отправить напоминание на почту</a></p>");
                }else{
                    $("#message").fadeIn("slow").html("<p class='alert alert-danger'>Ошибка. Попробуйте Еще раз.</p>").delay(2000).fadeOut();
                }
            },
            error: function (request, status, error) {
                $(".ajax_loader").css("display", "none");
                $("#message").fadeIn("slow").html("<p class='alert alert-danger'>Ошибка. Попробуйте Еще раз.</p>").delay(2000).fadeOut();
               //console.log(request.responseText+" --"+request.status+"--"+error);
               /* 
               $("#message").fadeIn("slow").html("<p class='alert alert-danger'>Ошибка при отправке данных</p>").delay(2000).fadeOut(); */
            }
        });

    }else{
        $("#message").fadeIn("slow").html("<p class='alert alert-danger'>Пожалуйста, заполните поле :"+errors+"</p>").delay(2000).fadeOut();
    }

    });
})