<template>
    <div class="site">
        <section class="about">
            <h1 class="about__title mb42">MANUFACTURING</h1>
            <img class="lazy" src="/images/manufacturing-1.png" alt="" />
        </section>

        <section class="in-nets">
            <div class="in-nets__wrap center">
                <div class="in-nets__title mb30">RAW MATERIAL DISTRIBUTION</div>
                <div class="in-nets__text or16">
                    In addition to designing and repairing tarps and nets for industries and
                    businesses in Quebec, Canada and the United States, Mégatex is also a major
                    distributor of raw products in rolls or cut to size. In fact, most of our
                    materials are offered to you this way.
                </div>
            </div>
        </section>

        <section class="manufacturing-slide">
            <Slick class="manufacturing-slide__wrap" :options="slickOptions">
                <div class="manufacturing-slide__image">
                    <div class="manufacturing-slide__image-center">
                        <img class="lazy" src="/images/about-3.png" alt="" />
                    </div>
                </div>
                <div class="manufacturing-slide__image">
                    <div class="manufacturing-slide__image-center">
                        <img class="lazy" src="/images/about-4.png" alt="" />
                    </div>
                </div>
                <div class="manufacturing-slide__image">
                    <div class="manufacturing-slide__image-center">
                        <img class="lazy" src="/images/about-11.png" alt="" />
                    </div>
                </div>
                <div class="manufacturing-slide__image">
                    <div class="manufacturing-slide__image-center">
                        <img class="lazy" src="/images/about-5.png" alt="" />
                    </div>
                </div>
                <div class="manufacturing-slide__image">
                    <div class="manufacturing-slide__image-center">
                        <img class="lazy" src="/images/about-8.png" alt="" />
                    </div>
                </div>
                <div class="manufacturing-slide__image">
                    <div class="manufacturing-slide__image-center">
                        <img class="lazy" src="/images/about-9.png" alt="" />
                    </div>
                </div>
                <div class="manufacturing-slide__image">
                    <div class="manufacturing-slide__image-center">
                        <img class="lazy" src="/images/about-10.png" alt="" />
                    </div>
                </div>
            </Slick>
        </section>

        <section class="distinguished">
            <div class="distinguished__wrap center">
                <div class="distinguished__items ob20">
                    <div id="tab-1" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:
                    </div>
                    <div id="tab-2" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-12
                    </div>
                    <div id="tab-3" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-13
                    </div>
                    <div id="tab-4" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-1
                    </div>
                    <div id="tab-5" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-2
                    </div>
                    <div id="tab-6" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-3
                    </div>
                    <div id="tab-7" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-4
                    </div>
                    <div id="tab-8" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-5
                    </div>
                    <div id="tab-9" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-6
                    </div>
                    <div id="tab-10" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-7
                    </div>
                    <div id="tab-11" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-8
                    </div>
                    <div id="tab-12" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-9
                    </div>
                    <div id="tab-13" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-10
                    </div>
                    <div id="tab-14" class="distinguished__item tab-pane">
                        Here are the various industries in which our professionals have
                        distinguished themselves by their innovative spirit:-11
                    </div>
                </div>
                <ul class="distinguished__tabs or16">
                    <li class="active">
                        <a href="#tab-1"> Aeronautics </a>
                    </li>
                    <li class="">
                        <a href="#tab-2"> Agriculture </a>
                    </li>
                    <li class="">
                        <a href="#tab-3"> Aluminum smelting </a>
                    </li>
                    <li class="">
                        <a href="#tab-4"> Car wash </a>
                    </li>
                    <li class="">
                        <a href="#tab-5"> Convention centres </a>
                    </li>
                    <li class="">
                        <a href="#tab-6"> Civil engineering </a>
                    </li>
                    <li class="">
                        <a href="#tab-7"> Construction (commercial and industrial) </a>
                    </li>
                    <li class="">
                        <a href="#tab-8"> Aeronautics </a>
                    </li>
                    <li class="">
                        <a href="#tab-9"> Agriculture </a>
                    </li>
                    <li class="">
                        <a href="#tab-10"> Aluminum smelting </a>
                    </li>
                    <li class="">
                        <a href="#tab-11"> Car wash </a>
                    </li>
                    <li class="">
                        <a href="#tab-12"> Convention centres </a>
                    </li>
                    <li class="">
                        <a href="#tab-13"> Civil engineering </a>
                    </li>
                    <li class="">
                        <a href="#tab-14"> Construction (commercial and industrial) </a>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</template>

<script>
import Slick from "vue-slick";

export default {
    name: "Manufacturing",
    components: { Slick },
    data() {
        return {
            slickOptions: {
                slidesToShow: 5,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                fade: false,
                infinite: true,
                variableWidth: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                        },
                    },
                ],
            },
        };
    },
};
</script>

<style src="../../../css/manufacturing.css"></style>
<style>
.slick-current + .slick-active .manufacturing-slide__image img {
    width: 386px;
    height: 462px;
}
.manufacturing-slide .slick-initialized .slick-slide {
    max-width: 304px;
    margin-right: 24px;
}
</style>
