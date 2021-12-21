$(document).ready(function() {
    if ($("#my-card").length) {
        const myCard = $("#my-card");

        const cardNumber = myCard.CardJs("cardNumber");
        const cardType = myCard.CardJs("cardType");
        const name = myCard.CardJs("name");
        const expiryMonth = myCard.CardJs("expiryMonth");
        const expiryYear = myCard.CardJs("expiryYear");
        const cvc = myCard.CardJs("cvc");
    }

    // $(".collections__items").slick({
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     arrows: true,
    //     dots: false,
    //     fade: false,
    //     infinite: true,
    //     responsive: [{
    //             breakpoint: 768,
    //             settings: {
    //                 slidesToShow: 2,
    //             },
    //         },
    //         {
    //             breakpoint: 639,
    //             settings: {
    //                 slidesToShow: 1,
    //             },
    //         },
    //     ],
    // });

    const $cartBlock = $(".sure-modal, .career-success");
    var $html = $("html");
    const $cartBlockIcon = $(
        ".remove-all, .sure-modal__close, .history-remove, .wish-remove, .sure-modal-no, .career-success-no, .career-success__close"
    );
    $cartBlockIcon.on("click", function() {
        const $this = $(this);
        $this.toggleClass("active");
        $cartBlock.toggleClass("active");
    });

    const $addressAdd = $(".address-add");
    const $addressBook = $(".address-book");
    const $newAddress = $(".new-address");
    const $closeAddress = $(".address-close");

    $newAddress.on("click", function() {
        $addressAdd.removeClass("hide");
        $addressBook.addClass("hide");
    });
    $closeAddress.on("click", function() {
        $addressAdd.addClass("hide");
        $addressBook.removeClass("hide");
    });

    // try {
    //     const myLazyLoad = new LazyLoad({
    //         use_native: true,
    //         threshold: 0,
    //     });
    //     myLazyLoad.update();
    // } catch (e) {
    //     console.log(e);
    // }

    // about-page

    // $(".card__thumbs").slick({
    //     slidesToShow: 3,
    //     slidesToScroll: 3,
    //     infinite: false,
    //     dots: false,
    //     arrows: false,
    //     variableWidth: true,
    //     focusOnSelect: true,
    //     asNavFor: ".card__image",
    //     responsive: [{
    //             breakpoint: 1023,
    //             settings: {
    //                 variableWidth: false,
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3,
    //             },
    //         },
    //         {
    //             breakpoint: 768,
    //             settings: {
    //                 variableWidth: false,
    //                 slidesToShow: 3,
    //                 slidesToScroll: 3,
    //             },
    //         },
    //     ],
    // });
    // $(".card__image").slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     dots: false,
    //     arrows: false,
    //     infinite: false,
    //     asNavFor: ".card__thumbs",
    //     fade: true,
    //     responsive: [{
    //         breakpoint: 639,
    //         settings: {
    //             variableWidth: false,
    //         },
    //     }, ],
    // });

    // about-page

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
    const myTabs = document.querySelectorAll("ul.nav-tabs > li ");

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

    if ($("#password").length) {
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function(e) {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            // toggle the eye slash icon
            this.classList.toggle("active");
        });
    }

    if ($("#password-register").length) {
        const togglePasswordReg = document.querySelector("#togglePassword-register");
        const passwordReg = document.querySelector("#password-register");

        togglePasswordReg.addEventListener("click", function(e) {
            // toggle the type attribute
            const type = passwordReg.getAttribute("type") === "password" ? "text" : "password";
            passwordReg.setAttribute("type", type);
            // toggle the eye slash icon
            this.classList.toggle("active");
        });
    }

    if ($("#responsiveTabsDemo").length) {
        $("#responsiveTabsDemo").responsiveTabs({});
    }
    if ($(".distinguished__wrap").length) {
        $(".distinguished__wrap").responsiveTabs({});
    }

    const initPhotoSwipeFromDOM = function(gallerySelector) {
        // parse slide data (url, title, size ...) from DOM elements
        // (children of gallerySelector)
        const parseThumbnailElements = function(el) {
            const thumbElements = el.childNodes;
            const numNodes = thumbElements.length;
            const items = [];
            let figureEl;
            let linkEl;
            let size;
            let item;

            for (let i = 0; i < numNodes; i++) {
                figureEl = thumbElements[i]; // <figure> element

                // include only element nodes
                if (figureEl.nodeType !== 1) {
                    continue;
                }

                linkEl = figureEl.children[0]; // <a> element

                size = linkEl.getAttribute("data-size").split("x");

                // create slide object
                item = {
                    src: linkEl.getAttribute("href"),
                    w: parseInt(size[0], 10),
                    h: parseInt(size[1], 10),
                };

                if (figureEl.children.length > 1) {
                    // <figcaption> content
                    item.title = figureEl.children[1].innerHTML;
                }

                if (linkEl.children.length > 0) {
                    // <img> thumbnail element, retrieving thumbnail url
                    item.msrc = linkEl.children[0].getAttribute("src");
                }

                item.el = figureEl; // save link to element for getThumbBoundsFn
                items.push(item);
            }

            return items;
        };

        // find nearest parent element
        const closest = function closest(el, fn) {
            return el && (fn(el) ? el : closest(el.parentNode, fn));
        };

        // triggers when user clicks on thumbnail
        const onThumbnailsClick = function(e) {
            e = e || window.event;
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);

            const eTarget = e.target || e.srcElement;

            // find root element of slide
            const clickedListItem = closest(eTarget, function(el) {
                return el.tagName && el.tagName.toUpperCase() === "FIGURE";
            });

            if (!clickedListItem) {
                return;
            }

            // find index of clicked item by looping through all child nodes
            // alternatively, you may define index via data- attribute
            const clickedGallery = clickedListItem.parentNode;
            const childNodes = clickedListItem.parentNode.childNodes;
            const numChildNodes = childNodes.length;
            let nodeIndex = 0;
            let index;

            for (let i = 0; i < numChildNodes; i++) {
                if (childNodes[i].nodeType !== 1) {
                    continue;
                }

                if (childNodes[i] === clickedListItem) {
                    index = nodeIndex;
                    break;
                }
                nodeIndex++;
            }

            if (index >= 0) {
                // open PhotoSwipe if valid index found
                openPhotoSwipe(index, clickedGallery);
            }
            return false;
        };

        // parse picture index and gallery index from URL (#&pid=1&gid=2)
        const photoswipeParseHash = function() {
            const hash = window.location.hash.substring(1);
            const params = {};

            if (hash.length < 5) {
                return params;
            }

            const vars = hash.split("&");
            for (let i = 0; i < vars.length; i++) {
                if (!vars[i]) {
                    continue;
                }
                const pair = vars[i].split("=");
                if (pair.length < 2) {
                    continue;
                }
                params[pair[0]] = pair[1];
            }

            if (params.gid) {
                params.gid = parseInt(params.gid, 10);
            }

            return params;
        };

        var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
            const pswpElement = document.querySelectorAll(".pswp")[0];
            let gallery;
            let options;
            let items;

            items = parseThumbnailElements(galleryElement);

            // define options (if needed)
            options = {
                // define gallery index (for URL)
                galleryUID: galleryElement.getAttribute("data-pswp-uid"),

                getThumbBoundsFn: function(index) {
                    // See Options -> getThumbBoundsFn section of documentation for more info
                    const thumbnail = items[index].el.getElementsByTagName("img")[0]; // find thumbnail
                    const pageYScroll = window.pageYOffset || document.documentElement.scrollTop;
                    const rect = thumbnail.getBoundingClientRect();

                    return {
                        x: rect.left,
                        y: rect.top + pageYScroll,
                        w: rect.width,
                    };
                },
            };

            // PhotoSwipe opened from URL
            if (fromURL) {
                if (options.galleryPIDs) {
                    // parse real index when custom PIDs are used
                    // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                    for (let j = 0; j < items.length; j++) {
                        if (items[j].pid == index) {
                            options.index = j;
                            break;
                        }
                    }
                } else {
                    // in URL indexes start from 1
                    options.index = parseInt(index, 10) - 1;
                }
            } else {
                options.index = parseInt(index, 10);
            }

            // exit if index not found
            if (isNaN(options.index)) {
                return;
            }

            if (disableAnimation) {
                options.showAnimationDuration = 0;
            }

            // Pass data to PhotoSwipe and initialize it
            gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.init();
        };

        // loop through all gallery elements and bind events
        const galleryElements = document.querySelectorAll(gallerySelector);

        for (let i = 0, l = galleryElements.length; i < l; i++) {
            galleryElements[i].setAttribute("data-pswp-uid", i + 1);
            galleryElements[i].onclick = onThumbnailsClick;
        }

        // Parse URL and open gallery if it contains #&pid=3&gid=1
        const hashData = photoswipeParseHash();
        if (hashData.pid && hashData.gid) {
            openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true);
        }
    };

    // execute above function
    initPhotoSwipeFromDOM(".corporate__gallery, .card__gallery");
    // initPhotoSwipeFromDOM('.nets__gallery, .corporate__gallery, .card__gallery');
    // realisations-scripts end
});