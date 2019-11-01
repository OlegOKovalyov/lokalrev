jQuery(document).ready(function ($) {

    // Контейнер с контентом
    let $mainBox = $('.card-block');

    // Отправка ajax запроса при клике по ссылке на рубрику в виджете "Рубрики"
    $('.cats-btns a').click(function (e) {
        e.preventDefault();

        var linkCat = $(this).attr('href'); console.log(linkCat);

        ajaxCat(linkCat);
    });

    /**
     * Ajax запрос постов из категории по переданной ссылке на неё
     *
     * @param linkCat ссылка на категогию
     */
    function ajaxCat(linkCat) {
        $mainBox.animate({opacity: 0.5}, 300);

        jQuery.post(
            localizeScriptObject.ajaxurl,
            {
                action: 'get_cat',
                link: linkCat
            },
            function (response) {

                $mainBox
                    .html(response)
                    .animate({opacity: 1}, 300);
            });
    }

});