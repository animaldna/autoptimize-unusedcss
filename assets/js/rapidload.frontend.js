(function () {

    var RapidLoad = function () {

        var fired = false

        var load_css = function (uucss) {
            var files = document.querySelectorAll('link[uucss]')

            if (!files.length || fired) {
                return;
            }

            for (var i = 0; i < files.length; i++) {

                var file = files[i];

                var original = uucss.find(function (i) {
                    return file.href.includes(i.uucss)
                })

                if (!original) {
                    return;
                }

                let link = file.cloneNode()
                link.href = original.original
                link.removeAttribute('uucss')
                link.setAttribute('uucss-reverted', '')
                link.prev = file

                link.onload = function (e) {
                    if (link.prev) link.prev.remove();
                };

                file.parentNode.insertBefore(link, file.nextSibling);

                fired = true
            }
        }

        this.add_events = function () {

            if (!window.rapidload || !window.rapidload.length) {
                return;
            }

            ['mousemove', 'touchstart', 'keydown'].forEach(function (event) {

                var listener = function () {
                    load_css(window.rapidload)
                    removeEventListener(event, listener);
                }
                addEventListener(event, listener);

            });

        }

        this.add_events()
    };

    document.addEventListener("DOMContentLoaded", function (event) {
        console.log('RapidLoad 🔥 1.0');
        new RapidLoad();
    });

}());

