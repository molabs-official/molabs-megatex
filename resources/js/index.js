$(document).ready(function() {
    // const controller = new ScrollMagic.Controller();
    // const tl = new TimelineMax();
    // tl.staggerFrom(".nets figure", 1.25, {
    //     scale: 0,
    //     cycle: {
    //         y: [-10, 10],
    //     },
    //     ease: Elastic.easeOut,
    //     stagger: {
    //         from: "center",
    //         amount: 0.25,
    //     },
    // });

    // const scene = new ScrollMagic.Scene({
    //         triggerElement: ".nets",
    //         triggerHook: 0,
    //     })
    //     .setTween(tl)
    //     .addTo(controller);

    // try {
    //     const myLazyLoad = new LazyLoad({
    //         use_native: true,
    //         threshold: 0,
    //     });
    //     myLazyLoad.update();
    // } catch (e) {
    //     console.log(e);
    // }


    function initTab(elem) {
        document.addEventListener("click", function(e) {
            if (!e.target.matches(elem + " .t-btn")) return;
            else {
                if (!e.target.classList.contains("active")) {
                    findActiveElementAndRemoveIt(elem + " .t-btn");
                    findActiveElementAndRemoveIt(elem + " .t-panel");
                    e.target.classList.add("active");
                    setTimeout(function() {
                        const panel = document.querySelectorAll(
                            elem + " .t-panel." + e.target.dataset.name
                        );
                        Array.prototype.forEach.call(panel, function(el) {
                            el.classList.add("active");
                        });
                    }, 200);
                }
            }
        });
    }

    function findActiveElementAndRemoveIt(elem) {
        const elementList = document.querySelectorAll(elem);
        Array.prototype.forEach.call(elementList, function(e) {
            e.classList.remove("active");
        });
    }

    initTab(".catalog-page-tabs");

    // store tabs variable
    const myTabs = document.querySelectorAll("ul.nav-tabs > li");

    function myTabClicks(tabClickEvent) {
        for (var i = 0; i < myTabs.length; i++) {
            myTabs[i].classList.remove("active");
        }
        const clickedTab = tabClickEvent.currentTarget;
        clickedTab.classList.add("active");
        tabClickEvent.preventDefault();
        const myContentPanes = document.querySelectorAll(".tab-pane");
        for (i = 0; i < myContentPanes.length; i++) {
            myContentPanes[i].classList.remove("active");
        }
        const anchorReference = tabClickEvent.target;
        const activePaneId = anchorReference.getAttribute("href");
        const activePane = document.querySelector(activePaneId);
        activePane.classList.add("active");
    }
    for (i = 0; i < myTabs.length; i++) {
        myTabs[i].addEventListener("click", myTabClicks);
    }
});