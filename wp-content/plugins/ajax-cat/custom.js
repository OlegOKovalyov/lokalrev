jQuery(document).ready(function ($) {

    // Контейнер с контентом
    let $mainBox = $('.card-block');

    // Отправка ajax запроса при клике по ссылке на рубрику в виджете "Рубрики"
    $('.checkbox-select').change(function (e) {
        e.preventDefault();

        checkboxValues = [];
        $('.checkbox-select').each(function () {
            $('.checkbox-select').empty();
            if (this.checked) {
                checkboxValues.push($(this).val());
            }
        });

        ajaxCat(checkboxValues);

    });

    /**
     * Ajax запрос постов из категории по переданной ссылке на неё
     *
     * @param linkCat ссылка на категогию
     */
    function ajaxCat(linkCat) {
        $mainBox.animate({opacity: 0.7}, 100);

        jQuery.post(
            localizeScriptObject.ajaxurl,
            {
                action: 'get_cat',
                link: linkCat
            },
            function (response) {

                $mainBox
                    .html(response)
                    .animate({opacity: 1}, 100);
            });
    }

});