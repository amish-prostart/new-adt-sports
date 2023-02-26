document.addEventListener('turbo:load', loadEmailConfigureSettingData);

function loadEmailConfigureSettingData () {
    if ($('#sendEmailMethod option:selected').val() == 1) {
        $('.mail-block').addClass('d-none')
    }

    if ($('#sendEmailMethod option:selected').val() == 2) {
        $('.sendgrid-block,.mailjet-block').addClass('d-none')
    }

    if ($('#sendEmailMethod option:selected').val() == 3) {
        $('.smtp-block,.mailjet-block').addClass('d-none')
    }
    
    if ($('#sendEmailMethod option:selected').val() == 4) {
        $('.sendgrid-block,.smtp-block').addClass('d-none')
    }
}

listenChange('#sendEmailMethod', function () {
    let sendEmailMethod = $('#sendEmailMethod option:selected').val();
    
    if (sendEmailMethod == 1) {
        $('.mail-block').addClass('d-none')
    }else {
        $('.mail-block').removeClass('d-none')
    }

    if (sendEmailMethod == 2 ) {
        if ($('.smtp-block').hasClass('d-none')){
            $('.smtp-block').removeClass('d-none')
        }
    }else {
        $('.smtp-block').addClass('d-none')
    }

    if (sendEmailMethod == 3 ) {
        if ($('.sendgrid-block').hasClass('d-none')){
            $('.sendgrid-block').removeClass('d-none')
        }
    }else {
        $('.sendgrid-block').addClass('d-none')
    }

    if (sendEmailMethod == 4 ) {
        if ($('.mailjet-block').hasClass('d-none')){
            $('.mailjet-block').removeClass('d-none')
        }
    }else {
        $('.mailjet-block').addClass('d-none')
    }
})
