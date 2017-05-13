'use strict';

let Survey = (function() {
    let _step = JSON.parse(localStorage._survey || "null") || "step_1",
        _data = JSON.parse(localStorage._survey_data || "{}"),

        goToStep = (step) => {
            localStorage._survey_step = JSON.stringify(step);
            $("div.content-block").hide();
            $("div#" + step).show();
        },

        init = () => {
            $("button.step_control").click(() => {
                let target = event.target.getAttribute("data-target");

                if (target) {
                    goToStep(target);
                } else {
                    alert("Well done.");
                }
            });

            goToStep(_step);
        };

    return {
        init: init
    };
})();

(function(window, jQuery) {
    Survey.init();
})(window, $);