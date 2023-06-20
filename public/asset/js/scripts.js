/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);

/** File Manage script */
function FileChanged(e){
    let file = e.target.value.replace(/.*(\/|\\)/,'');
    let fileType = file.split('.')

    e.target.previousElementSibling.innerHTML=`${fileType[0].substring(0,5)}...${fileType[fileType.length-1]}`
}
function RemoveElement(e){
    let form = document.querySelector('.file-form-new')
    let el = e.target.parentNode.parentNode.parentNode.parentNode
    
    if(el.nextElementSibling.getAttribute('type') == 'hidden' && el.previousElementSibling == null){
        el.nextElementSibling.nextElementSibling.classList.add('d-none')
        form.removeChild(el)
    }else{
        form.removeChild(el)
    }
}

/**Visa application page script */

$(document).ready(function () {
    let len=$('#leng'),num=$('#num'),lwc=$('#lwc'),cap=$('#cap'),chr=$('#chr')
        
    function isEmpty( el ){
        return !$.trim(el.val())
    }

    function InputRequired(btn){
        let filled=false

        if(!filled){
            btn.closest('form').find('select').each(function(){
                filled = !$.trim($(this).val());
                // return filled
                if(filled==true){return filled}
            })
            btn.closest('form').find('input').each(function(){
                if($(this).attr('type') != 'submit'){
                    filled = !$.trim($(this).val());
                    // return filled
                    if(filled==true){return filled}
                }
            })
        }else{
            return false
        }
        
    }
    function PassValidation(theVal){
        if(theVal.length >= 8){
            len.addClass('pass')
        }else{len.removeClass('pass')}
        if(theVal.match(/[a-z]/)){
            lwc.addClass('pass')
        }else{lwc.removeClass('pass')}
        if(theVal.match(/[A-Z]/)){
            cap.addClass('pass')
        }else{cap.removeClass('pass')}
        if(theVal.match(/[0-9]/)){
            num.addClass('pass')
        }else{num.removeClass('pass')}
        if(theVal.match(/[.*,!,@,#,$,%,^,&,*,_]/)){
            chr.addClass('pass')
        }else{chr.removeClass('pass')}
    }
    $('#newpassInput').bind('paste',function(e){
        let theVal = $(this).val()
        PassValidation(theVal)
    })
    $('#newpassInput').on('keyup',function(e){
        let theVal = $(this).val()
        PassValidation(theVal)
    })
    //loading
    function loadAction() {
        $('body').find('.loader-load-container').removeClass('d-none')
        $('body').find('.loader-load-container').addClass('d-flex')
    }

    $('').on('change',function(){
        $(this).find()
    })
    
    $("[type='submit']").on("click", function(e){
        
        if(InputRequired($(this))){
            loadAction()
        }
        // window.alert = function() {
        //     $('body').find('.loader-load-container').addClass('d-none')
        // };
    })
    $(".nav-link:not(.bookBtn)").on("click", function(e){
        loadAction()
    })
    $(".tab-link").on("click", function(e){
        loadAction()
    })
    $('body').find(".more-link").on("click", function(e){
        loadAction()
    })
    
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });

    $('body').find('#alterChanges').on('click',function(e){
        e.preventDefault()
        let status = false;
        if($('body').find('#change_pass').hasClass('active')){
            $('body').find('#change_pass').siblings('.pass-change-form').find('input').each(function(){
                if($(this).val() == ''){
                    status = true
                }
            })
        }
        if(status){
            alert('Password fields are empty!')
        }else{
            $(this).parent().submit()
        }
    })
    
    $('body').find('#change_pass').on('click',function(e){
        if($(this).hasClass('active')){
            $(this).removeClass('active')
            $(this).siblings('#is_change_active').val(false)
            $(this).siblings('.pass-change-form').find('input').attr('disabled',true)
            $(this).siblings('.pass-change-form').find('input').val('')
            $(this).siblings('.pass-change-form').find('.pass-message-display').removeClass('active')
            $(this).text('Change Password')
            $(this).siblings('.pass-change-form').find('.pass-message-display').find('li').css({color:"rgba(60,60,60,.4)",textDecoration: 'none'})
        }else{
            $(this).addClass('active')
            $(this).siblings('#is_change_active').val(true)
            $(this).siblings('.pass-change-form').find('input').attr('disabled',false)
            $(this).siblings('.pass-change-form').find('.pass-message-display').addClass('active')
            $(this).text('Discard Change')
        }
    })

    $('.file-upload-label').find('input').on('change',function(){
        let filename = $(this).val().replace(/.*(\/|\\)/,'')
        let fileType = filename.split('.')
        let name = `${fileType[0].substring(0,fileType[0].length /2 + 5)}...${fileType[fileType.length-1]}`

        $(this).siblings('span').html(name)
    })
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

//VISA EXT SCRIPTS//

var uploadentryV = document.getElementById("entryV");

                 uploadentryV.onchange = function() {
                    const oFile = document.getElementById("entryV").files[0];                    
                    if (oFile.size > 2097152) // 2 MiB for bytes.
                        {
                            alert("The entry Visa File must be below 2MB!");
                        this.value = "";
                        }
                };


